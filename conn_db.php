<?php

	//Database connection parameters
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinica";

	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	//Check connection
	if ($conn->connect_error) {
	  die("Connessione fallita: " . $conn->connect_error);
	}

	mysqli_set_charset($conn, "utf8");
?>