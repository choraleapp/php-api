<?php

include 'connect.php';

$statement = $link->prepare("INSERT INTO $table($keys) VALUES(".array_keys($what).')');
$statement->execute($what);
