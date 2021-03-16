<?php
include "php-config.php";

// Check if the user is already logged in, if yes then redirect him to the main page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="//netdna.bootstrapcdn.com/
    bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/home.css"/>
</head>
<body>
    <div class="wrapper">
            <div class="form-group">
                <a href="register.php" class="button-register">Create a profile</a>
                <br>
                <a href="login.php" class="button-login">Login</a>
            </div>
    </div>    
</body>
</html>



