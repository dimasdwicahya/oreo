<?php
//Database credentials
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'db_oreo';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>