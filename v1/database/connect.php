<?php

include '../settings/variables.php';

$conn;

try {
	$conn = new PDO("mysql:host=" . $serverInfo['name'] . ((!empty($serverInfo['host'])) ? ":" . $serverInfo['host'] : "") . ";dbname=choraleapp", $usernames['database'], $passwords['database']);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>