<?php
require_once('/var/www/html/php/serverConn.php');

$ipQuery = "SELECT * FROM ServiceHistory";

$result = $DB->query($ipQuery);

while($row = $result->fetch_assoc())
{
    var_dump($row);
}