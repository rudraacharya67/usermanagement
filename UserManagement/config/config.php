<?php
define('DB_SERVER','localhost:3306');
define('DB_NAME','user_management');
define('DB_USER','root');
define('DB_PASSWORD','');

$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);  
if ($connection == false) { 
    die("ERROR: Could not connect. "
                .mysqli_connect_error()); 
}