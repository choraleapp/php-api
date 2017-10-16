<?php

include '../settings/variables.php';

$post = ['X-API-KEY', 'X-API-SECRET'];

$where = [];
for ($i = 0; $i < count($post); $i++) {
    if (! empty($_SERVER[$post[$i]])) {
        $where[] = $post[$i]."='".$_SERVER[$post[$i]]."'";
    }
}

if (empty($where)) {
    $notEnoughInfo = ['errorCode' => $errorCodes['notEnoughApiInfo'], 'error' => ''];

    for ($i = 0; $i < count($post); $i++) {
        if (empty($_SERVER[$post[$i]])) {
            $notEnoughInfo['error'][] = $post[$i];
        }
    }

    $errormsg = '';

    for ($i = 0; $i < count($notEnoughInfo['error']); $i++) {
        if ($i == 0) {
            $errormsg = $errormsg."'".$notEnoughInfo['error'][$i]."'";
        } elseif ($i == count($notEnoughInfo['error']) - 1) {
            $errormsg = $errormsg." and '".$notEnoughInfo['error'][$i]."'";
        } else {
            $errormsg = $errormsg.", '".$notEnoughInfo['error'][$i]."'";
        }
    }

    if (! empty($notEnoughInfo)) {
        $count = count($notEnoughInfo['error']);
        $notEnoughInfo['error'] = 'Not enough info! '.$errormsg.(($count == 1) ? ' is empty!' : ' are empty!');
        echo json_encode($notEnoughInfo);
        die;
    }
}

$post = ['email'];

$where = [];
for ($i = 0; $i < count($post); $i++) {
    if (! empty($_POST[$post[$i]])) {
        $where[] = $post[$i]."='".$_POST[$post[$i]]."'";
    }
}

if (empty($where)) {
    $notEnoughInfo = ['errorCode' => $errorCodes['notEnoughInfo'], 'error' => ''];

    for ($i = 0; $i < count($post); $i++) {
        if (empty($_POST[$post[$i]])) {
            $notEnoughInfo['error'][] = $post[$i];
        }
    }

    $errormsg = '';

    for ($i = 0; $i < count($notEnoughInfo['error']); $i++) {
        if ($i == 0) {
            $errormsg = $errormsg."'".$notEnoughInfo['error'][$i]."'";
        } elseif ($i == count($notEnoughInfo['error']) - 1) {
            $errormsg = $errormsg." and '".$notEnoughInfo['error'][$i]."'";
        } else {
            $errormsg = $errormsg.", '".$notEnoughInfo['error'][$i]."'";
        }
    }

    if (! empty($notEnoughInfo)) {
        $count = count($notEnoughInfo['error']);
        $notEnoughInfo['error'] = 'Not enough info! '.$errormsg.(($count == 1) ? ' is empty!' : ' are empty!');
        echo json_encode($notEnoughInfo);
        die;
    }
}
