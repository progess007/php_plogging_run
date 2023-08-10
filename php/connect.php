<?php

// $serverName = 'localhost';
// $user = 'root';
// $password = '123456';
// $dbName = 'test_app';

$serverName = 'sql304.epizy.com';
$user = 'epiz_27168649';
$password = 'a0876887811A';
$dbName = 'epiz_27168649_test';

$conn = mysqli_connect($serverName, $user, $password, $dbName);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');

?>