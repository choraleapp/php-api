<?php

//header("Content-type:application/json");

$what = array("userID", "name", "type", "username", "passwordHash", "email", "enabled2FA", "phoneNumber");
$table = "users";

$where = array();
for($i = 0; $i < count($what); $i++) {
	if(!empty($_POST[$what[$i]])) {
		$where[] = $what[$i] . "=" . $_POST[$what[$i]] . "";
	}
}

if (empty($where)) {
	$notEnoughInfo = array("errorCode" => "4201", "error" => "");

	for ($i = 0; $i < count($what); $i++) {
		if(empty($_POST[$what[$i]])) { $notEnoughInfo['error'][] = $what[$i]; }
	}

	$errormsg = "";

	for ($i = 0; $i < count($notEnoughInfo['error']); $i++) {
		if ($i == count($notEnoughInfo['error']) - 1) {
			$errormsg = $errormsg . " and '" . $notEnoughInfo['error'][$i] . "'";
		} else if ($i == 0) {
			$errormsg = $errormsg . "'" . $notEnoughInfo['error'][$i] . "'";
		} else {
			$errormsg = $errormsg . ", '" . $notEnoughInfo['error'][$i] . "'";
		}
	}
	
	if (!empty($notEnoughInfo)) {
		$notEnoughInfo['error'] = "Not enough info! " . $errormsg . ((count($notEnoughInfo['error']) == 1) ? " is empty!" : (count($notEnoughInfo['error']) == 2) ? " are empty!" : " are all empty!");
		echo json_encode($notEnoughInfo);
		die;
	}
}

include '../database/select.php';

echo substr(json_encode($rows), 1, -1);

?>