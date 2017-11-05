<?php
$servername = "localhost";
$username = "root";
$password = "zdmKdsXE3mvMcNJtrh93bjjtBtNQ8sYep76spKf2XYHQNSK7rWAWpTeYGzYjywHS";
$dbName = "REC2017";

// Create connection
$DB = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($DB->connect_error) {
    die("Connection failed: " . $DB->connect_error);
} 