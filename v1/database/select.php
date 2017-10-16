<?php

include 'connect.php';

$wherestr = '';

if (! empty($where)) {
    for ($i = 0; $i < count($where); $i++) {
        if ($i == 0) {
            $wherestr = 'WHERE '.$where[$i];
        } else {
            $wherestr = $wherestr.', '.$where[$i];
        }
    }
}

$stmt = $conn->prepare('SELECT '.implode(', ', $what).' FROM '.$table.' '.$wherestr);

$stmt->execute();

$rows = [];

foreach ($stmt->fetchAll() as $row) {
    $rows[] = $row;
}
