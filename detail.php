<!DOCTYPE html>

<?php
require_once('/var/www/html/php/serverConn.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://shawnclake.ca/libs/css/bootstrap.min.css">
    <!---<link rel="stylesheet" href="./styles/dashboard.css">-->
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="https://shawnclake.ca/dashboard">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>


    <div style="margin-top:25px;
" class="row">
        <div class="col-sm-12">
            <h1>Service</h1>
            <?php
            $serviceId = $_GET["id"];
            echo "<a href='https://shawnclake.ca/server-history.php?id=$serviceId'>Polling History</a>";
            ?>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">IssueDescription</th>
                    <th scope="col">StaffComment</th>
                    <th scope="col">Resolved</th>
                    <th scope="col">Assigned Staff Name</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $ipQuery = "SELECT * FROM Issues WHERE ServiceID=$serviceId";

                $result = $DB->query($ipQuery);

                while($row = $result->fetch_assoc())
                {
                    $staffid = $row["AssignedStaffID"];

                    $q2 = "SELECT * FROM ITStaff WHERE EmployeeID=$staffid";

                    $r2 = $DB->query($q2);

                    $stuff2 = $r2->fetch_assoc();


                    $date = $row["Date"];
                    $issuedesc = $row["IssueDescription"];
                    $staffcomment = $row["StaffComment"];
                    $resolved = $row["Resolved"];
                    $staffname = $stuff2["FirstName"] . " " . $stuff2["LastName"];


                    if($resolved == 1)
                        $state = "<span class='text-success'>Resolved</span>";
                    else
                        $state = "<span class='text-danger'>Unresolved</span>";

                    echo "<tr>";
                    echo "<td>" . $date . "</td>";
                    echo "<td>" . $issuedesc . "</td>";
                    echo "<td>" . $staffcomment . "</td>";
                    echo "<td>" . $state . "</td>";
                    echo "<td>" . $staffname . "</td>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>

<script src="https://shawnclake.ca/libs/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://shawnclake.ca/libs/js/bootstrap.min.js"></script>


</html>