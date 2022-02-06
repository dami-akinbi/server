<?php

$db_host = 'localhost';
$db_name = 'codingacademy';
// $db_username = "damilola";
// $db_password = "iTdm)5bgqTRZE]e";
$db_username = "root";
$db_password = "";

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    // echo "success";
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
