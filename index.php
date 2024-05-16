<?php
   if(isset($_SESSION['username']))
   {
    session_destroy();
   }
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Activity Tracker</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Tourney:ital,wght@1,100&display=swap" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <div class="container">
            <a class="logo" href="index.html">ZEITGEST</a>
            
               
                <ul class="list">
                    <li>
                        <a class="contact" href="#">contact</a>
                        <a class="news" href="#">news</a>
                        

                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <section class="hero">
        <div class="container">
           
            <div class="lcol">
           
            <h1 class="head">CCET</h1>

                <p class="sunhead">
                    Beyond the horizon, you’ll find yourself
                </p>
               
            </div>
            <div class="rcol">
           
             <h2 class="login">
                log in for
             </h2 >
             <div class="btn-group">
                <a href='logstaff.php'>
                    <button class="GFG">
                        staff
                    </button>
                </a>
                <a  href='log.php'>
                    <button class="GFG1">
                        Student
                    </button>
                </a>

                    
             
              </div>
            
             
           

        </div>

    </section>

</body>
</html>