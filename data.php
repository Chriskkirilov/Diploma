<?php
include 'php-config.php';
session_start();


$user_id = $_SESSION["id"];

#$sql = "SELECT COUNT(users_gardens.garden_id) WHERE users_gardens.user_id = '$user_id'");
$garden_id = file_get_contents("config.txt"); 
$sqlInsert = mysqli_query($link, "INSERT INTO garden.users_gardens (user_id, garden_id) VALUES ('$user_id', '$garden_id')");

$result = mysqli_query($link,"SELECT * FROM readings INNER JOIN users_gardens ON readings.garden_id = users_gardens.garden_id AND users_gardens.user_id = '$user_id'");

$Select = mysqli_query($link, "SELECT garden_id FROM users_gardens WHERE user_id = '$user_id'");
	echo "num of gardens: " .(mysqli_num_rows($Select));
$gardenList = mysqli_fetch_array($Select);
foreach($gardenList as $garden) {
	$resultTable = mysqli_query($link, "SELECT * FROM readings WHERE garden_id = '$garden'");
		echo "<table>";
    echo "<tr>";
        echo "<th>ID </th>";
        echo "<th>Temperature </th>";	
        echo "<th>Light  </th>";
        echo "<th>Humidity </th>";
        echo "<th>Time </th>";
        echo "<th>garden-id </th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($resultTable)) {
    echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['temperature'] . "</td>";
        echo "<td>" . $row['light'] . "</td>";
        echo "<td>" . $row['humidity'] . "</td>";
        echo "<td>" . $row['ts'] . "</td>";
        echo "<td>" . $row['garden_id'] . "</td>";
    echo "</tr>";

}


	        
}
	    
    echo "</table>";
    mysqli_free_result($result);
	

?>