<?php
session_start(); // Start the session to access session variables
// if (!isset($_SESSION["user"])) {
//     header("Location: index.php"); // Redirect to login if user is not logged in
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST["submit"])){
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors =array();

            if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
                array_push($errors, "All Fields Are Required");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not VALID");
            }
            if(strlen($password <8)){
                array_push($errors, "Password must be at least 8 characters");
            }
            if($password!==$passwordRepeat) {
                array_push($errors, "Password does not match");
            }

            //i will insert the data into the database
            require_once "database.php";

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
                array_push($errors,"Email already exists");
            }
            if(count($errors)>0) {
                foreach ($errors as $error){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            else{
                
                $sql = "INSERT INTO users (full_name, email, password) VALUES( ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                // var_dump($prepareStmt);
                // exit();

                if($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"sss",$fullName,$email,$passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo"<div class= 'alert alert-success'>You are Registered SUCCESSFULLY.</div>";
                }
                else{
                    die("Something Went Wrong!");
                }
            }
        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Confirm Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register"name="submit">
            </div>
        </form>
        <div><p>Already Registered? <a href="login.php">login Here</a></p></div>
    </div>
    
</body>
</html>