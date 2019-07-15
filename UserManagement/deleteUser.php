<?php
require 'include/header.php';
require_once 'config/config.php';
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

$sql = "DELETE FROM users WHERE id = '".$_GET['id']."'";

if ($connection->query($sql) === TRUE) {
    header('Location: /UserManagement');
} else {
    echo "Error updating record: " . $connection->error;
}

$connection->close();