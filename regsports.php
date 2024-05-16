<?php

include("connection.php");
session_start();
if(!isset($_SESSION['username']))
 {
   $url='home.html';
   header('location:' . $url);
 }
if(isset($_POST['submit']))
{
    $userid=$_SESSION['username'];
    $sql = "SELECT * FROM student_details WHERE userid='$userid'";
    $result=mysqli_query($conn,$sql);
    
    $row = $result->fetch_assoc();
    $fname=$row['fname'];
	$lname=$row['lname'];
    $userid=$row['userid'];
    $email=$row['email'];
	$phone=$row['phone'];
    $dept=$row['dept'];
    $sem=$row['sem'];
    $house=$row['house'];


    $sql = "SELECT * FROM regsports WHERE userid='$userid'";
    $result=mysqli_query($conn,$sql);
    $num = mysqli_num_rows ( $result );

    if($num > 0)
    {
          $sql = " UPDATE regsports
          SET fname = '$fname', lname = '$lname', userid = '$userid' , email = '$email' , ph ='$phone' , dept = '$dept' , sem= '$sem' , house = '$house' WHERE  userid='$userid'" ;
          $result=mysqli_query($conn,$sql);
          $sql = "SELECT itemname FROM eventlist WHERE eventday='sd'";
          $all_categories = mysqli_query($conn,$sql);
         while ($category = mysqli_fetch_array(
                                     $all_categories,MYSQLI_ASSOC)):;
              $e=$category['itemname'];
  

              $events = (isset($_POST['events'])) ? $_POST['events'] : array();
              if(in_array( $e, $events))
               {
                $sql= " UPDATE regarts SET $e ='yes' WHERE userid='$userid'";
                $result=mysqli_query($conn,$sql);
               }
          
       
    
   else
    {
        $sql= "UPDATE regsports SET $e ='no' WHERE userid='$userid'";
        $result=mysqli_query($conn,$sql);
    }
endwhile;
echo "<script>alert('Entry updated');document.location='home.html'</script>";
    
}
else
{
    $sql = "INSERT INTO regsports ( fname, 
  lname, userid ,email,ph,dept,sem,house) VALUES ('$fname', 
  '$lname', '$userid','$email','$phone','$dept','$sem','$house')";
  $result=mysqli_query($conn,$sql);
  $sql = "SELECT itemname FROM eventlist WHERE eventday='sd'";
  $all_categories = mysqli_query($conn,$sql);

   

   while ($category = mysqli_fetch_array(
    $all_categories,MYSQLI_ASSOC)):;
$e=$category['itemname'];


$events = (isset($_POST['events'])) ? $_POST['events'] : array();
if(in_array( $e, $events))
{
$sql= " UPDATE regsports SET $e ='yes' WHERE userid='$userid'";
$result=mysqli_query($conn,$sql);
}



else
{
$sql= "UPDATE regsports SET $e ='no' WHERE userid='$userid'";
$result=mysqli_query($conn,$sql);
}
endwhile;
echo "<script>alert('registration complete');document.location='home.html'</script>";



}
}

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> SPORTSDAY Registration Form </title>--->
    <link rel="stylesheet" href="css/regsports.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
    <form method="POST">
        <div class="user-details">
          
        
         
          
        
        
        </div>
        <div class="event-details">
          <span class="event-title">Events</span><br><br>
          <?php

               $sql = "SELECT itemname FROM eventlist WHERE eventday='sd'";
               $all_categories = mysqli_query($conn,$sql);
               
               ?> 
          <form action="" method="POST">
          <label>events :</label>
          <br>
          <?php
          while ($category = mysqli_fetch_array(
            $all_categories,MYSQLI_ASSOC)):;
            ?>
            <input type="checkbox" name="events[]"
                        value=<?php echo $category['itemname'];?>> <?php echo $category['itemname'];?>
                        <br>
              <?php
              
                endwhile;
                // While loop must be terminated
            ?>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
