<?php
/*if(isset($_POST['add'])){
*/	
    $servername = "localhost";
	$username = "admin";
	$password = "monarchs";
	$dbname = "cars";
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	//Check connection
	if ($conn->connect_error) {
    	die("DB Connection for Patient details failed: " . $conn->connect_error);
	} 
?>