<?php

include("connection.php");

$sql = "SELECT * FROM eventday WHERE eid='ad'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);


if($num > 0)
{
  $day = $result->fetch_assoc();
  $date=$day["day"];
  $deadline=$day["deadline"];
  
  
}
else
{
  $date='Not Published';
  $deadline='Not Published';
}



if(isset($_POST['submit']))
{




if($num > 0)

{
 


  
  $today = date("Y-m-d");
 
  if($deadline < $today)
  {
    echo "<script>alert('unable to register.. please check the deadline');document.location='artsday.php'</script>";
  }
  else
  {
    header("location:reg1.php");
  }
}
else
{
  echo "<script>alert('unable to register.. dates have not been published');document.location='artsday.php'</script>";
}
}
$sql = "SELECT itemname FROM eventlist  WHERE eventday='ad'";
$all_categories = mysqli_query($conn,$sql);
$numitem=mysqli_num_rows($all_categories);

?>






















<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
  <link rel="stylesheet" href="css/artsday.css">
  <title>JHALAK</title>
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>J</span><span>HALAK</span></h1>
          </a>
        </div>
        <div class="nav-list">
          
          <ul>
            <li><a href="home.html" data-after="Home">Home</a></li>
            <li><a href="#about" data-after="About">About</a></li>
            <li><a href="#services" data-after="Service">Events</a></li>
            <li><a href="#projects" data-after="Projects">Rules</a></li>
            <li><a href="#contact" data-after="Contact">Contact</a></li>
            <li><a href="index.php" data-after="Home">log out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Welcome <span></span></h1>
        <h1>to <span></span></h1>
        <h1>JHALAK <span></span></h1>
        <form action ="" method="post">
          <button class="cta" type="submit" value="Submit" name="submit">REGISTER </button>
           </form>
        


      </div>
    </div>
  </section>
  <!-- End Hero Section  -->


   <!-- About Section -->
   <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="images/poster1.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">About <span>JHALAK</span></h1>
        <h2>Arts Day</h2>
        <h2>Event Date :<?php echo $date?>;</h2>
         <h2>Registration open till :<?php echo $deadline?>;</h2>
           
        <p>JHALAK can encompass a wide range of art forms including music, dance, film, fine art, literature, poetry and isn't solely focused on visual arts. Arts festivals may feature a mixed program that include music, literature, comedy</p>
        
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">EVE<span>N</span>TS</h1>
        <p>JHALAK consists of both group and individual events in which students from each group can participate with admirable passion and exuberance</p>
      </div>
      
      <div class="service-bottom">
      <div class="service-item">
        
        <?php
            $sql1 = "SELECT * FROM eventlist WHERE eventday='ad'";
            $result1=mysqli_query($conn,$sql1);
            $num=mysqli_num_rows($result1);
            if($num<=0)
            {
              ?>
              <h2>no events have been declared</h2>
              <?php 
            }
            $row=array();
            
            
            while($row=$result1->fetch_assoc())
            {

            
            ?>
          
          
          <h2><?php echo $row['itemname'];?></h2>
          <?php
            }

            ?>
        
          
          <br><br>
          
        </div>
        
      </div>
      
    </div>
   
  </section>
  <!-- End Service Section -->

  <!-- Projects Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">General <span>Rules</span></h1>
      </div>
      <div class="all-projects">
        
          <div class="project-img">
         
          </div>
        </div>
        <div class="row">
  <div class="column" style="background-color:#aaa;">
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
        if($numitem>0)
        {
               ?>
            <input type="submit" value="submit" name="submit1">
        <?php    
        }
        else
        {
            ?>
            <input type="submit" value="submit" name="submit1" disabled >
            <?php  
        }
        ?>
    </form>
    <br>
  </div>
  <div class="column" style="background-color:#bbb;">
    
    
    <?php

if(isset($_POST['submit1']))
{
    $item=$_POST['Category'];
    $sql = "SELECT * FROM eventlist Where itemname='$item'";
    
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    ?>
    <ul>
    <li><h2><?php echo $row['itemname'];  ?> </h2></li>
    
    
    <li><h2><?php echo $row['rule1'];  ?> </h3></li>
    <li><h2><?php echo $row['rule2'];  ?> </h3></li>
    <li><h2><?php echo $row['rule3'];  ?> </h3></li>
    <li><h2><?php echo $row['rule4'];  ?> </h3></li>
     
     </ul>
     <?php 
}
else
{
    $sql = "SELECT * FROM eventrules WHERE itemname = 'general rules' ";;
    
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    ?>
    <h2><?php echo $row['itemname'];  ?> </h2>
    
    
    <h3><?php echo $row['rule1'];  ?> </h3>
    <h3><?php echo $row['rule2'];  ?> </h3>
    <h3><?php echo $row['rule3'];  ?> </h3>
    <h3><?php echo $row['rule4'];  ?> </h3>
    
    <?php 
}
?>
  </div>
</div>
  </section>
  <!-- End Projects Section -->

 

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contact <span>info</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+91 2145755</h2>
            <h2>0476 254754</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>JHALAK@gmail.com</h2>
            <h2>abcd@gmail.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>CARMEL COLLEGE OF ENGINNERING AND TECHNOLOGY PUNNAPRA ALAPPUZHA</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1>JHALAK</h1>
      </div>
      <h2>CCET</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/twitter" /></a>
        </div>
        
      </div>
     
    </div>
  </section>
  <!-- End Footer -->
  
</body>

</html>
