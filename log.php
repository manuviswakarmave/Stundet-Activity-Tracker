<?php
ob_start();
include("connection.php");
if(isset($_SESSION['username']))
 {
	session_destroy();
 } 



 


else{
	session_start();
	if(isset($_POST['submit']))

{
	$user=$_POST['text'];
	$password=$_POST['password'];
	
	$sql = "SELECT * FROM login WHERE uname ='$user' and pword='$password'";
	
    $result=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);
	if($num > 0)
	{
		$_SESSION['username']=$user;
		$url="home.html";
   header('location:' . $url);
   ob_end_flush();
	exit();

	}	
	else
	{
		echo'<script>alert("error username or password is incorrect")</script>';

	}
	

}
else
{
	echo "hello";
}
	
}




?>



<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="css\login.css">
	
</head>
<body>
	<div class="container">
	<img src="images/login.png"/>
		<form action ="" method="post">
			<div class="form-input">
				
				
				<input type="text" name="text" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				
				<input type="password" name="password" placeholder="password"/>
			</div>
			<button class="btn-login" type="submit" value="Submit" name="submit">LOGIN </button>
		</form>
	</div>
</body>
</html>