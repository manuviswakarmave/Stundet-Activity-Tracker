<?php
include("connection.php");
 session_start();
 if(!isset($_SESSION['username']))
 {
   $url='home.html';
   header('location:' . $url);
 }


$userid=$_SESSION['username'];
$sql = "SELECT * FROM student_details WHERE userid='$userid'";
$result=mysqli_query($conn,$sql);

$row = $result->fetch_assoc();


?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Portfolio Website | CodingLab </title>
    <link rel="stylesheet" href="css\p1.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <!-- Move to up button -->
  <div class="scroll-button">
    <a href="#home"><i class="fas fa-arrow-up"></i></a>
  </div>
  <!-- navgaition menu -->
  <nav>
    <div class="navbar">
      <div class="logo"><a href="#">My Profile</a></div>
      <ul class="menu">
          <li><a href="home.html">Home</a></li>
          <li><a href="#about">User Info</a></li>
          
          
          <li><a href="#contact">Contact</a></li>
          <li><a href="index.html">Logout</a></li>
          <div class="cancel-btn">
            <i class="fas fa-times"></i>
          </div>
      </ul>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <div class="menu-btn">
      <i class="fas fa-bars"></i>
    </div>
  </nav>

<!-- Home Section Start -->
 <section class="home" id="home">
   <div class="home-content">
     <div class="text">
       <div class="text-one">WELCOME,</div>
       <div class="text-two"><?php echo $row['fname']; ?> </div>
       <div class="text-three">CCET</div>
       <div class="text-four">Punnapra</div>
     </div>
     
   </div>
 </section>

<!-- About Section Start -->
<section class="about" id="about">
  <div class="content">
    <div class="title"><span>About Me</span></div>
  <div class="about-details">
    <div class="left">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['pic']); ?>" /> 
    </div>
    <div class="right">
      <div class="topic">USER INFORMATION</div>
      <h3>user id : <?php echo $row['userid'];?></h3>
      <h3>user name : <?php echo $row['fname'].' '. $row['lname'];?></h3>
      <h3>Department : <?php echo $row['dept'];?></h3>
      <h3>Semester : <?php echo $row['sem'];?></h3>
      <h3>Date of Birth : <?php echo $row['dateofbirth'];?></h3>
      <h3>House : <?php echo $row['house'];?></h3>

      <br>
      <br>

      <div class="topic">COTACT INFORMATION</div>
      <h3>Phone no : <?php echo $row['phone'];?></h3>
      <h3>Address : <?php echo $row['address'];?></h3>
      <h3>Email id : <?php echo $row['email'];?></h3>

      
    </div>
  </div>
  </div>
</section>





<!-- Contact Me section Start -->
<section class="contact" id="contact">
  <div class="content">
    <div class="title"><span>Contact US</span></div>
    <div class="text">
      <div class="topic">Have Any Query?</div>
      <p>Email id :ccet@gmail.com</p>
      <p>phone no :13234556</p>
      
      <div class="button">
        <button>Let's Chat</button>
      </div>
    </div>
  </div>
</section>


</body>
</html>
