<?php

require_once('/var/www/html/php/serverConn.php');

$ipQuery = "SELECT * FROM Services";

$result = $DB->query($ipQuery);

while($row = $result->fetch_assoc())
{
$command = "bash /var/www/html/cron/ping.sh " . $row["IP"];
$returned = exec($command);

$serviceID = $row['ServiceID'];

if($returned)
{
    $issue = "SELECT * FROM Issues WHERE ServiceID=" . $serviceID . " AND Resolved=0";
    $issueResult = $DB->query($issue);
    if(isset($issueResult) && $issueResult->num_rows < 1)
    {
        $createIssue = "INSERT INTO Issues (ServiceID, IssueDescription, Resolved, AssignedStaffID) VALUES ($serviceID, \"Ping Failed\" 0, 1)";
        mysqli_query($DB, $createIssue);
    }

    $createHistory = "INSERT INTO ServiceHistory (ServiceID, State) VALUES ($serviceID, 0)";
    mysqli_query($DB, $createHistory);
}
else
{
    $createHistory = "INSERT INTO ServiceHistory (ServiceID, State) VALUES ($serviceID, 1)";
    mysqli_query($DB, $createHistory);
}
}