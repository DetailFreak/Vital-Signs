<?php
$servername = "localhost";
$username  =  "root";
$password  =  "";

$sqlconn =new mysqli($servername,$username,$password);
echo '<p> Test ongoing... </p>';

if($sqlconn->connect_error){
  echo '<p>Not Connected</p>';
}
else{
echo '<p>Connected</p>';  

$sql = "CREATE database sensorDB;";
echo "<p>Creating Database sensorDB...</p>"; 
if($sqlconn->query($sql))
  {
     echo "<p>Database Created Successfully</p>"; 
    }
else {echo "<p>Error Creating Database: " . $sqlconn->error."</p>";}

$sql = "USE sensorDB;";
echo "<p>Creating Database sensorDB...</p>"; 
if($sqlconn->query($sql))
  {
     echo "<p>Database Created Successfully</p>"; 
    }
else {echo "<p>Error Creating Database: " . $sqlconn->error."</p>";}

$sql = "CREATE TABLE PULSE_DATA(   time    TIMESTAMP default CURRENT_TIMESTAMP PRIMARY KEY,
								   pulse   INT NOT NULL )";
echo '<p>Creating Table PULSE_DATA...</p>';
if($sqlconn->query($sql))
  {
     echo "<p>Table Created Successfully</p>"; 
    }
else {echo "<p>Error Creating Table: " . $sqlconn->error."</p>";}								   

$sql = "CREATE TABLE TEMPERATURE_DATA( 	time    TIMESTAMP default CURRENT_TIMESTAMP PRIMARY KEY,
								        temp   float NOT NULL )";
echo '<p>Creating Table TEMPERATURE_DATA...</p>';
if($sqlconn->query($sql))
  {
     echo "<p>Table Created Successfully</p>"; 
    }
else {echo "<p>Error Creating Table: " . $sqlconn->error."</p>";}								   
								   
								   
}
$sqlconn->close();
?>
