<?php

//header("Content-type:application/json");

$id = "";

function generateID() {

	$what = array("*");
	$table = "users";
	$where = array("userID=$id");
	
	include '../database/select.php';
	
	echo $rows;

	if ($rows > 0) {
		generateID();
	} else {
		echo json_encode($id);		
	}
}

?>