<?php

include("connection.php");

if(isset($_POST['submit']))

{

    $ename=$_POST['ename'];
	$rule1=$_POST['rule1'];
    $rule2=$_POST['rule2'];
	$rule3=$_POST['rule3'];
    $rule4=$_POST['rule4'];
     
    $ename=str_replace(" ","","$ename");
    $ename=strtolower($ename);
    
    $sql="SELECT * FROM eventlist WHERE itemname='$ename' AND eventday='ad'";
    $result=mysqli_query($conn,$sql);
    $number=mysqli_num_rows($result);
    if($number>0)
    {
      echo "<script>alert('event already exists');document.location='addevent.php'</script>";


    }
    else{

        $sql="SELECT * FROM eventday WHERE eid='ad'";
    $result=mysqli_query($conn,$sql);
    $number=mysqli_num_rows($result);
    if($number>0)
    {
      echo "<script>alert('registration has already begun');document.location='ads.php'</script>";


    }
    else{
        $sql = "INSERT INTO eventlist(eventday,itemname,,rule1,rule2,rule3,rule4) VALUES ('ad','$ename','$rule1',$rule2','$rule3','$rule4')";
        $result=mysqli_query($conn,$sql);
       
        $sql="ALTER TABLE regarts ADD $ename CHAR(3) ;";
        $result=mysqli_query($conn,$sql);
        echo "<script>alert('event added');document.location='ads.php'</script>";

    }
   
}
    
}

    

if(isset($_POST['goback']))

{   $url="ads.php";
    header("Location: $url"); 

}
    
    

?>







































<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> ADD NEW EVENT </title>--->
    <link rel="stylesheet" href="css/regarts.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">ADD NEW EVENT</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Event Name</span>
            <input type="text" name="ename" placeholder="Enter name of event" required>
          </div>
          <div class="input-box">
            <span class="details">Rule 1</span>
            <input type="text" name="rule1" placeholder="Enter rule of event" required>
          </div>
          <div class="input-box">
            <span class="details">Rule 2</span>
            <input type="text" name="rule2" placeholder="Enter rule of event" required>
          </div>
          <div class="input-box">
            <span class="details">Rule 3</span>
            <input type="text" name="rule3" placeholder="Enter rule of event" required>
          </div>
          <div class="input-box">
            <span class="details">Rule 4</span>
            <input type="text" name="rule4" placeholder="Enter rule of event" required>
          </div>
        <div class="button">
          <input type="submit" name="submit" value="submit">

        </div>
        <div class="button">
          <input type="submit" name="goback" value="goback">
        </div>
      </form>
    </div>
  </div>

</body>
</html>