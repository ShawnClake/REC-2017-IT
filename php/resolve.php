<?php

include 'serverConn.php';

$id = $_GET["id"];

$sql = "UPDATE `Issues` SET `Resolved` = 1 WHERE `ServiceId` =".$id;
mysqli_query($DB, $sql);

header('Location: http://shawnclake.ca/dashboard.html');