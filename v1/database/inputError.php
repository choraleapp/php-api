<?php

$notEnoughInfo = ['errorCode' => '4201', 'error' => ''];

if (empty($_POST['errorMessage'])) {
    $notEnoughInfo['error'] = ["'errorMessage'"];
}
if (empty($_POST['errorPage'])) {
    $notEnoughInfo['error'][] = "'errorPage'";
}

if (! empty($notEnoughInfo)) {
    $notEnoughInfo['error'] = 'Not enough info! '.implode(' and ', $notEnoughInfo['error']).((count($notEnoughInfo) == 2) ? ' are empty!' : ' is empty!');
    echo json_encode($notEnoughInfo);
    die;
}

$table = 'errors';
$keys = 'errorMessage,errorPage,errorSubmitter';
$what = ['errorMessage' => $_POST['errorMessage'], 'errorPage' => $_POST['errorPage'], 'errorSubmitter' => 'API-Auto'];

include 'insert.php';
