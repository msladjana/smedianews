<?php
$host = 'localhost';
$user = 'username';
$pass = 'password';
$db_name = 'database_name';

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}
