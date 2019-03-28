<?php
$servername = "localhost";
$username = "root";
$password = "Vishal@mysqlite";
$dbname = "sensorDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT p.time as time, pulse, temp FROM PULSE_DATA P,TEMPERATURE_DATA T WHERE P.time = T.time;";
$result = $conn->query($sql);
$conn->close();
$table = array();
$table['cols'] = array(
    //Labels for the chart, these represent the column titles
    array('id' => '', 'label' => 'Time', 'type' => 'string'),
	array('id' => '', 'label' => 'Pulse', 'type' => 'number'),
    array('id' => '', 'label' => 'Temp', 'type' => 'number')
    ); 
$rows = array();
$row = array();
foreach($result as $row){
    $temp = array();
    //Values
    $temp[0] = array('v' => date ($row['time']));
    $temp[1] = array('v' => (int) $row['pulse']); 
    $temp[2] = array('v' => (int) $row['temp']); 
    $rows[] = array('c' => $temp);
 	}
	$result->free();
 
$table['rows'] = $rows; 
echo '<pre>';
echo json_encode($table, JSON_PRETTY_PRINT);

echo '</pre>';	
	
?>