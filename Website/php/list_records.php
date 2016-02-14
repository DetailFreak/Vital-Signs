<!DOCTYPE html>
<html>
<head>
<link href="../css/styles.css" type="text/css" rel="stylesheet" />
<style>
table, th, td {
     border: 1px outset white ;
	 
	 color: white;
	 font-family: courier;
	 background-color :#152f4f;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensorDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT p.time as time, pulse, temp FROM PULSE_DATA P,TEMPERATURE_DATA T WHERE P.time = T.time;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Time</th><th>Pulse</th><th>Temperature</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["time"]. "</td><td>" . $row["pulse"]. "</td><td>" . $row["temp"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  

</body>
</html>
