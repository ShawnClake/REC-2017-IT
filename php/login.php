<?
include 'serverConn.php'

$usr = $_POST('Username')
$pass = $_POST('Password')

$sql = "SELECT * FROM ITStaff WHERE Username = $usr and Password = $pass"
if($DB->query($sql) === TRUE)
{
	echo "User found";
} else {
	echo "No User";
}