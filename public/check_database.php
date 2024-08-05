<?php

$host = 'localhost';
$db_name = 'mvc';
$user = "root";
$password = "mysql";

$conn = new mysqli($host,  $user, $password, $db_name);


if ($conn->connect_error)
    echo "connection failed. " . $conn->connect_error;
else
    echo "connection succeeded";
