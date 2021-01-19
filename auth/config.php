<?php

// Create db Connection
$server_name = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "signinandsignup";

// Create connection
$conn = new mysqli($server_name, $server_username, $server_password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>