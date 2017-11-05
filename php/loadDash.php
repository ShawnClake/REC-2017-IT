<?php

include 'serverConn.php';

$sql = "SELECT * FROM `Services`";

$result = $DB->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$obj->ServiceID = $row["ServiceID"];
		$obj->IP = $row["IP"];
		$obj->Name = $row["Name"];
		$json = json_encode($obj);
	}
	echo $json;
} else {
	return;
}