<?php
include 'serverConn.php';

$usr = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT * FROM `ITStaff` WHERE `Username`=\"" . $usr . "\" and `Password`=\"" . $pass ."\"";

$result = $DB->query($sql);

if($result->num_rows > 0)
{
	header('Location: http://144.217.7.184/dashboard.html'.$newURL);
} else {
	header('Location: http://144.217.7.184/index.html'.$newURL);
}