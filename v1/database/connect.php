<?php

$conn;

$servername = "localhost:3307";
$username = "root";
$password = "";

try {
	$conn = new PDO("mysql:host=$servername;dbname=choraleapp", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>