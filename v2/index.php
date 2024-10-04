<?php

include('logic/dbconnect.php');

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moncton Photobard</title>
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="../admin/js/jquery-3.5.1.min.js"></script>

</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand  align-items-center d-flex justify-content-center  w-100 mb-0 h1">Moncton ACC Employee Directory</span>

        </div>
    </nav>
    <div class="container">
        <div class="row  ">

            <?php
            $sql = "SELECT first_name, last_name, employee_photo from employees, organization where organization.organization_title != 'Retired'";

            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) : ?>

                <div class="col-6">

                    <a href="">

                        <div class="card ">
                            <img src='employee-photos/<?= $row['employee_photo'] ?>' alt="">
                            <div class="card-body">
                                <h3 class="card-text"><?= $row['first_name'] . " " . $row['last_name']; ?></h3>
                            </div>
                        </div>
                    </a>

                </div>
            <?php endwhile ?>

        </div>

    </div>
    <script src="../admin/js/bootstrap.bundle.min.js"></script>
</body>

</html>