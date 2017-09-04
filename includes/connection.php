<?php

$server     = "localhost";
$username   = "root";
$password   = "1010sarah";
$db         = "clients";

// Create a connection
$conn = mysqli_connect( $server, $username, $password, $db );

// Check connection
if (!$conn) {
    die( "Connection failed: " . mysqli_connect_error() );
} else {
    echo "";
}


