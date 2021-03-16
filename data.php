<?php
include 'php-config.php';
session_start();


$user_id = $_SESSION["id"];

$result = mysqli_query($link,"SELECT * FROM readings INNER JOIN users_gardens ON readings.garden_id = users_gardens.garden_id AND users_gardens.user_id = '$user_id'");


$last_record = mysqli_query($link, "SELECT * FROM readings INNER JOIN users_gardens ON readings.garden_id = users_gardens.garden_id WHERE user_id = '$user_id' ORDER BY ts DESC LIMIT 1 ");
$row = mysqli_fetch_array($last_record);

$index_garden_id = $row['garden_id'];

echo "garden id: " .$index_garden_id;

$file = "config2.txt";
file_put_contents($file,$index_garden_id);

$Select = mysqli_query($link, "SELECT garden_id FROM garden.users_gardens WHERE user_id = '$user_id'");
    $index_num_gardens = mysqli_num_rows($Select);



$resultTable = mysqli_query($link, "SELECT * FROM readings WHERE garden_id = '$index_garden_id'");
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
	    
    echo "</table>";
    mysqli_free_result($resultTable);
	

?>