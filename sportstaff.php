<?php
session_start();
include("connection.php");

$sql = "SELECT * FROM eventlist WHERE eventday='sd'";
$result=mysqli_query($conn,$sql);
$num1=mysqli_num_rows($result);

if(isset($_POST['submit']))
{
  $sql = "SELECT * FROM eventday WHERE eid='sd'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  $day=$_POST['event-date'];
  $deadline=$_POST['deadline'];
  

  if($num > 0)
  {
    echo "<script>alert('dates are already set please reset them');document.location='sportstaff.php'</script>";
  }
  elseif($day<$deadline)
  {
    echo "<script>alert('deadline must be set before the event day');document.location='sportstaff.php'</script>";
  }
  elseif($num1<=0)
  {
    echo "<script>alert('Publish some events before declaring dates');document.location='sportstaff.php'</script>";
  }
  else
  {
   
    $sql = "INSERT INTO eventday ( eid, 
                day, deadline) VALUES ('sd', 
                '$day', '$deadline')";
       $result=mysqli_query($conn,$sql);         
       echo "<script>alert('dates are published');document.location='sportstaff.php'</script>";


  }
}


if(isset($_POST['reset']))
{
  $sql = "TRUNCATE TABLE eventday;";
  $result=mysqli_query($conn,$sql);
  $sql = "TRUNCATE TABLE regsports;";
  $result=mysqli_query($conn,$sql);
  echo "<script>alert('dates are reset');document.location='sportstaff.php'</script>";

}

$sql="SELECT * FROM regsports WHERE house='green'; ";
$result=mysqli_query($conn,$sql);
$green=mysqli_num_rows($result);

$sql="SELECT * FROM regsports WHERE house='red'; ";
$result=mysqli_query($conn,$sql);
$red=mysqli_num_rows($result);

$sql="SELECT * FROM regarts WHERE house='blue'; ";
$result=mysqli_query($conn,$sql);
$blue=mysqli_num_rows($result);

$sql="SELECT * FROM regsports WHERE house='yellow'; ";
$result=mysqli_query($conn,$sql);
$yellow=mysqli_num_rows($result);

$sql="SELECT * FROM eventlist WHERE eventday='sd' ";
$result=mysqli_query($conn,$sql);
$all_categories = mysqli_query($conn,$sql);
$eventno=mysqli_num_rows($result);


$sql="SELECT day , deadline FROM eventday WHERE eid='sd'";
$result=mysqli_query($conn,$sql);
$number=mysqli_num_rows($result);
if($number>0)
{
  $day = $result->fetch_assoc();
  $date=$day["day"];
  $deadline=$day["deadline"];
}
else{
  $date='not published';
  $deadline='not published';
}


$sql="SELECT * FROM regsports";
$result=mysqli_query($conn,$sql);
$total_entries=mysqli_num_rows($result);
if(isset($_POST['generate']))
{
  $url="printpdf1.php";
  $item=$_POST['Category'];
  $_SESSION['item']=$item;
  header("Location: $url");  }
?>








































<!DOCTYPE html>
<
<html lang="en" dir="ltr">
  <head>
  <style>
    h1 {text-align: center; margin-top: 60px;}
    img{display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top:80px;
  width: 15%;}
    </style>
    <meta charset="UTF-8">
    <title>SPORTS DAY</title>
    <link rel="stylesheet" href="css/ads.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      
      <span class="logo_name">SPORTS DAY</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="addevent1.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Add event</span>
          </a>
        </li>
        <li>
          <a href="delevent1.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Delete event</span>
          </a>
        </li>

       
       
       
        
        <li>
          <a href="index.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      
      <div class="profile-details">
        
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">EVENTS</div>
            <div class="number">no of events :<?php echo $eventno;?></div>
            
          </div>
          
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">HOUSES</div>
            <div class="number">no of houses :<?php echo 4;?></div>
            
          </div>
          
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">participation</div>
            <div class="number">green house :<?php echo $green;?></div>
            <div class="number">red house :<?php echo $red;?></div>
            
          </div>
          
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">participation</div>
            <div class="number">blue house :<?php echo $blue;?></div>
            <div class="number">yellow house :<?php echo $yellow;?></div>
            
            
              
            </div>
          </div>
        </div>
     
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">OVERVIEW</div><br><br>
          <div class="sales-details">
          <div class="num">Date of event : <?php echo $date;?></div>
          <div class="num">Registration open until  : <?php echo $deadline;?></div>
          <div class="num">Total no of events  : <?php echo $num1;?>></div>
          <div class="num">Total no of entries : <?php echo $total_entries;?></div>
          
          </div>
          
        </div>
        <div class="dates">
          <div class="title">DATE Settings</div>
          <form class="dateform" action="" method="post">
                <label for="event date">event date:</label><br>
                <input type="date" id="event-date" name="event-date" required><br>
                <label for="deadline">deadline:</label><br>
                <input type="date" id="deadline" name="deadline" required><br><br>
                <div class="button1">
                    <input type="submit" name="submit" value="submit" ><br>
                </div> 
            </form>  
            <span>RESET all dates</span><br><br>
            <form class="dateform" action="" method="post">
            <div class="button1">
                    <input type="submit" name="reset" value="reset" ><br>
                    </div> 
            </form> 
            <span>GENERATE PARTICIPATION REPORT</span><br><br>
            <h2>SELECT AN EVENT</h2>
    <form method="POST">
    <select name="Category">
            <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                
                while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $category["itemname"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $category["itemname"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php
                endwhile;
                // While loop must be terminated
            ?>
        </select>
        <br>
        <?php
        if($num1<=0)
        {
          ?>
          <input type="submit" value="generate" name="generate" disabled>
          <?php
        }
        else
        {
          ?>
          <input type="submit" value="generate" name="generate">
          <?php
        }
        ?>
        
    </form>
    <br>
  </div>
  <div class="column" style="background-color:#bbb;">
    
        </div>
      </div>
    </div>
    <img src="images/ccetlogo.jpg" alt="">;
    
    
   
  </section>
  
 
</body>
</html>

