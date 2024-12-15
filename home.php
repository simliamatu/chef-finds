<?php
session_start();
// if (!isset($_SESSION["user"])){
//     header("Location: index.php");
// }
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- BASIC PAGE NEEDS -->
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Chef-Finds</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?
    family=Gabarito&family=Poppins:wght@400;500&display=swap" 
    rel="stylesheet">


</head>
<body>
    <div class="hero">
        <nav>
            <img src="Color logo - no background.png" width="300pxs">

            <div class="button-container">
                <a href="login.php" class="btn">Login</a>
                <a href="registration.php" class="btn">Sign Up</a>
            </div>
        </nav>

        <div class="container">
            
            <h1 class="anim">Welcome to Chef-Finds</h1>

            <h2>
                <p class="anim">"The world of vast immersive world of<br>recipes,
                    with a sense of Exploration and <br> Discovery,
                    Creativity and Excitement"<br>
                </p>
            </h2>
            <br>
            
    
        </div>



    </div>
    

    <script src="script.js"></script>
</body>
</html>