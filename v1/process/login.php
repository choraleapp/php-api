<?php

$what = array("userID", "name", "type", "username", "passwordHash", "email", "enabled2FA", "phoneNumber");
$table = "users";

$post = array("username", "password");

$where = array();
for($i = 0; $i < count($post); $i++) {
	if(!empty($_POST[$post[$i]])) {
		$where[] = $post[$i] . "='" . $_POST[$post[$i]] . "'";
	}
}

if (empty($where)) {
	$notEnoughInfo = array("errorCode" => "4201", "error" => "");

	for ($i = 0; $i < count($post); $i++) {
		if(empty($_POST[$post[$i]])) { $notEnoughInfo['error'][] = $post[$i]; }
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

$where = array($where[0]);

include '../database/select.php';

if (!password_verify($_POST['password'], $rows[0]['passwordHash'])) {
	$wrongPassword = array("errorCode" => "4202", "error" => "Wrong password supplied!");
	echo json_encode($wrongPassword);
	die;
}

if ($rows[0]['enabled2FA']) {
	$fadetails = array("DataURI" => "GET IMG DATA URI", "code" => "GET CODE");
	echo json_encode($fadetails);
	die;
}

echo json_encode($rows[0]);

?>