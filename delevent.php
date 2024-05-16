<?php
include("connection.php");
$sql = "SELECT * FROM eventlist WHERE eventday='ad'";
$result=mysqli_query($conn,$sql);
$num1=mysqli_num_rows($result);


$all_categories = mysqli_query($conn,$sql);

$sql="SELECT * FROM eventday WHERE eid='ad'";
    $result=mysqli_query($conn,$sql);
    $number=mysqli_num_rows($result);




if(isset($_POST['delete']))

{
    if($number>0)
    {
      echo "<script>alert('Cant delete registration has already begun');document.location='ads.php'</script>";


    }
    else
    {

    
    $item = $_POST['Category'];
    $sql = "ALTER TABLE regarts DROP COLUMN IF EXISTS $item;";
    $result=mysqli_query($conn,$sql);
    $sql = "DELETE FROM eventlist WHERE itemname='$item'" ;
    $result=mysqli_query($conn,$sql);
    $sql = "DELETE FROM eventrules WHERE itemname='$item'" ;
    $result=mysqli_query($conn,$sql);
    
    echo "<script>alert('event deleted');document.location='ads.php'</script>";
    }

}

if(isset($_POST['goback']))
{  

    $url="ads.php";
    header("Location: $url"); 

}
    

?>




<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> jhalak event deletion </title>--->
    <link rel="stylesheet" href="css/regarts.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">DELETE AN EVENT</div>
    <div class="content">
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
         <div class="button">
          <input type="submit" name="delete" value="delete" disabled>

        </div>
        <div class="button">
          <input type="submit" name="goback" value="goback">
        </div>
          <?php
        }
        else
        {
          ?>
          <div class="button">
          <input type="submit" name="delete" value="delete">

        </div>
        <div class="button">
          <input type="submit" name="goback" value="goback">
        </div>
          <?php
        }
        ?>
        
    </form>
    </div>
  </div>

</body>
</html>