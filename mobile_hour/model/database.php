<?php

//database connection details
$servername = "localhost";
// $username = "root";
// $password = "";
$username = "mobile_hour";
$password = "mobile_hour";
$database = "mobile_hour";

//connect to the database
try {
	//connect to the database
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username,	$password);
	//set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>