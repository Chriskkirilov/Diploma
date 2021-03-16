<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false){
    header("location: login.php");
    exit;

	$query=mysql_query("SELECT id FROM users WHERE username = '$username'");
	$row=mysql_fetch_assoc($query);
	$num=mysql_num_rows();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Garden</title>
	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="CSS/index.css"/>

	<style>
		<?php
			include 'CSS/index.css';
			include 'php-config.php';
			include'data.php';
		?>
	</style>

	
</head>

<body>

<div class="form-group">
                

                <ul>
				  
				  	
        			<li style="float:right"><a class="button-download" href="config2.txt"><i class="fa fa-download"></i> Download</a></li>
        			<form method="post" action="add-garden.php"> 
        				<li>
        			<input type="submit" name="button1" class="button-add" value="Add garden"/></form></li>
        		
        		<li><a href="logout.php" class="button-login">Logout</a></li>
				  <li><a href="reset-password.php" class="button-login">Reset password</a></li>
        			<!--
        			<li> 
        				<form class="form-group" action="export.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                                <input type="submit" name="Export" class="button-add" value="export to excel"/>           
            </form> 
  					</li>
  					-->
				</ul>
    </form> 

    <div class="page-header">
    <p>Hi, <b>
        	<?php

        		echo ($_SESSION["username"]);
        		echo "<br>";
        		echo "User ID: loggedin", ($_SESSION["id"]);	
        		echo "<br>";
        		echo "Your current garden ID: " .$index_garden_id;
        		echo "<br>";
    			echo "Your gardens in total: " .$index_num_gardens;
        		;	
        	?>
        	<br>
        	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    	</p>
                     
 </div>

	<div id="show"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show').load('data.php')
			}, 5000);
		});
	</script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	 
</body>
</html>