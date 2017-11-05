<?php

require_once('../php/serverConn.php');

$ipQuery = "SELECT FROM IP";

$result = $DB->query($ipQuery);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
var_dump($row);
}

$ips = ['8.8.4.4', '8.8.4.5'];

foreach($ips as $ip)
{
    $command = "bash ping.sh " . $ip;
    //echo $command;
    $returned = exec($command);
    //echo $returned;
}