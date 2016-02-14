<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="sensorDB"; // Database name 
$tbl_name="PULSE_DATA"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$pulse = $_GET['p'];
$temp = $_GET['t'];

if( $pulse )
{// update data in mysql database 
$sql="INSERT INTO PULSE_DATA (pulse) values ($pulse)";
$result=mysql_query($sql);
}

if($result){
echo "Successful updation in PULSE_DATA, ";
}
else {
echo "ERROR";
}

$tbl_name="TEMPERATURE_DATA"; // Table name

if( $temp )
{// update data in mysql database 
$sql="INSERT INTO TEMPERATURE_DATA (temp) value ($temp)";
$result=mysql_query($sql);
}

// if successfully updated. 
if($result){
echo "Successful updation in TEMPERATURE_DATA";
}
else {
echo "ERROR";
}

echo "<BR>";
echo "<a href='list_records.php'>View result</a>";


?>
