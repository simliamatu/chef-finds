<?php
session_start();
if (!isset($_SESSION["user"])){
    header("Location: home.php");
}

else{

    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- BASIC PAGE NEEDS -->
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

            <ul>
                <li><a href="about.php"><b>About</b></a></li>
                <li><a href="mailto:pineginger6@gmail.com"><b>Contact </b> </a></li>
                <li><button class="logout-btn"><a href="logout.php">Logout</a></button></li>
                
            </ul>
        </nav>

        <div class="container">
            
            <h1 class="anim">Chef-Finds</h1>

            <h2>
                <p class="anim">"Taste the World: Explore Recipes <br> from Every Corner!"
                </p>
            </h2>
            <br>
            
           
            <form>
                <input type="text" id="search" placeholder="Enter Ingredients">
                <button type="button" id="submit" class="btn">Search</button>
            </form>
            <div id="results">
                
            </div>

            <i class="fa-solid fa-magnifying-glass"></i>
    
        </div>



    </div>
    

    <script src="script.js"></script>
</body>
</html>
<?php
}

?>

