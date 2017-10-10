<?php

$notEnoughInfo = array("errorCode" => "4201", "error" => "");

if (empty($_POST['errorMessage'])) { $notEnoughInfo['error'] = array("'errorMessage'"); }
if (empty($_POST['errorPage'])) { $notEnoughInfo['error'][] = "'errorPage'"; }

if (!empty($notEnoughInfo)) {
	$notEnoughInfo['error'] = "Not enough info! " . implode(" and ", $notEnoughInfo['error']) . ((count($notEnoughInfo) == 2) ? " are empty!" : " is empty!");
	echo json_encode($notEnoughInfo);
	die;
}

$table = "errors";
$keys = "errorMessage,errorPage,errorSubmitter";
$what = array("errorMessage" => $_POST['errorMessage'], "errorPage" => $_POST['errorPage'], "errorSubmitter" => "API-Auto");

include 'insert.php';

?>