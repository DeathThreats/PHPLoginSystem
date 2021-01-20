<?php

// Create db Connection
$server_name = "";
$server_username = "";
$server_password = "";
$dbname = "";

// Create connection
$conn = new mysqli($server_name, $server_username, $server_password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
