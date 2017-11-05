<?php

include 'serverConn.php';

$sql = "SELECT * FROM `ITStaff`";

$result = $DB->query($sql);

if($result->num_rows > 0)
{
	$out = array();
	$out = $result->fetch_all();
	echo json_encode($out);
} else {
	return;
}