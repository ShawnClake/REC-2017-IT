<?php
include 'serverConn.php';

$usr = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT * FROM `ITStaff` WHERE `Username`=\"" . $usr . "\" and `Password`=\"" . $pass ."\"";
echo $sql;
echo "doing query";
$result = $DB->query($sql);
echo "queried";
echo "queried";
echo $result;
if($result->num_rows > 0)
{
	echo "User found";
} else {
	echo "No User";
}