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
	<p>Values</p>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css"/>

	<style>
		<?php
			include 'CSS/index.css';
			include 'php-config.php';
		?>
	</style>

	<div class="form-group">
                <a href="logout.php" class="button-login">Logout</a>
                <a href="reset-password.php" class="button-login">Reset password</a>
            </div>
</head>
<body>

	<div class="page-header">
        <p>Hi, <b>
        	<?php
        		echo ($_SESSION["username"]);
        		echo ", id:", ($_SESSION["id"]);
        		;	
        	?>
    	</p>

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