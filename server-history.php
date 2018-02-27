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
                    <a class="nav-link" href="https://shawnclake.ca">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>


    <div style="margin-top:25px;
" class="row">
        <div class="col-sm-12">
            <h1>Service Status</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $serviceId = $_GET["id"];

                        $ipQuery = "SELECT * FROM ServiceHistory WHERE ServiceID=$serviceId ORDER BY Time DESC LIMIT 50;";

                        $result = $DB->query($ipQuery);

                        while($row = $result->fetch_assoc())
                        {
                            $state = $row["State"];
                            $time = $row["Time"];

                            if($state == 1)
                                $state = "<span class='text-success'>OK</span>";
                            else
                                $state = "<span class='text-danger'>Fault Detected</span>";

                            echo "<tr>";
                            echo "<td>" . $state . "</td>";
                            echo "<td>" . $time . "</td>";
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