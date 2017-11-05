<?php
include 'serverConn.php';

$usr = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT * FROM `ITStaff` WHERE `Username`=\"" . $usr . "\" and `Password`=\"" . $pass ."\"";

$result = $DB->query($sql);

if($result->num_rows > 0)
{
	header('Location: http://shawnclake.ca/dashboard.html');
} else {
	header('Location: http://shawnclake.ca/index.html');
}