<?php
ob_start();
include("connection.php");


if(isset($_POST['submit']))

{
	$user=$_POST['text'];
	$password=$_POST['password'];
	
	$sql = "SELECT * FROM staff_log WHERE uname ='$user' and pword='$password'";
	echo $sql;
    $result=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);
	if($num > 0)
	{
		header("location:homestaff.html");
		ob_end_flush();

	}	
	else
	{
		echo'<script>alert("error username or password is incorrect")</script>';

	}
	

}

?>



<!DOCTYPE html>

<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" a href="css\logstaff.css">
	
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