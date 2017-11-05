<?php
$servername = "144.217.7.184";
$username = "root";
$password = "zdmKdsXE3mvMcNJtrh93bjjtBtNQ8sYep76spKf2XYHQNSK7rWAWpTeYGzYjywHS";

// Create connection
$DB = new mysqli($servername, $username, $password);

// Check connection
if ($DB->connect_error) {
    die("Connection failed: " . $DB->connect_error);
} 
echo "Connected successfully";
