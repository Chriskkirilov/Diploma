<?php 
include 'php-config.php';
session_start();


$user_id = $_SESSION["id"];
if(isset($_POST['button1'])) { 
            $sqlInsert = mysqli_query($link, "INSERT INTO garden.users_gardens (user_id) VALUES ('$user_id')"); 
			header("Location: index.php"); 
			exit();
        }
?>