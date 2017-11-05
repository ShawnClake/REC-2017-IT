<?php
$servername = "144.217.7.184";
$username = "root";
$password = "zdmKdsXE3mvMcNJtrh93bjjtBtNQ8sYep76spKf2XYHQNSK7rWAWpTeYGzYjywHS";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>