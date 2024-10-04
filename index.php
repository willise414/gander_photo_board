<?php

require "logic/dbconnect.php";

require "logic/organization.php";
// require "logic/get_all_employees.php";

// require "logic/all_employees.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Gander Photo Directory</title>

    <!-- <link rel="stylesheet" href="bootstrap/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">

    <script src="jquery/jquery-3.7.1.min.js "></script>
    <!-- <script src=bootstrap/bootstrap/min.js></script> -->

</head>

<body>
    <nav>
        <div class="container nav__container">
            <!-- <button id = "home_btn"><i class="fa-solid fa-house fa-3x"></i><a href="index.html"></a></button> -->
            <a href="index.php" id="home_btn"><i class="fa-solid fa-house fa-3x"></i></a>
            <h1>Gander FIR Employee Directory</h1>

            <!-- <button id="open__nav-btn"><i class="fa-solid fa-bars fa-3x"></i></button> -->
            <!-- <button id="close__nav-btn"><i class="fa-solid fa-xmark fa-4x"></i></button> -->
            <!-- <a href=# id="open__nav-btn"><i class="fa-solid fa-bars fa-3x"></i></a>
            <a href=# id="close__nav-btn"><i class="fa-solid fa-xmark fa-3x"></i></a> -->
        </div>
        <div class="container menu__selection ">
            <?php
            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li><a class ='org' id='" . $row["organization_id"] . "'>" . $row["organization_title"] . "</a></li>";
                }
                echo "</ul>";
            } else {
                echo "An error has occurred";
            }
            ?>
        </div>
        <!-- TODO - FIND A WAY TO FILTER SPECIALTY -->

        <!-- <div class="container specialty__selection">
            <ul>
                <li>
                    <h1 style="color: black;">test</h1>
                </li>
            </ul>
        </div> -->
    </nav>

    <section class="container main_section">

        <?php
        $all_employees_query = "SELECT id, first_name, last_name, roles_title, organization_title, employee_photo, specialty_title, specialty.specialty_id
                                FROM employees 
                                INNER JOIN roles ON employees.roles_id = roles.roles_id
                                INNER JOIN organization ON employees.organization_id = organization.organization_id
                                inner join employee_to_specialty on employees.id = employee_to_specialty.emp_id
                                INNER JOIN specialty on specialty.specialty_id = employee_to_specialty.specialty_id
                                where organization_title != 'Retired'
                                ORDER BY last_name ASC";
        $all_employees = mysqli_query($conn, $all_employees_query);
        ?>
        <?php
        while ($employee = mysqli_fetch_assoc($all_employees)) : ?>
            <a name="id" id="<?= $employee['id'] ?>" class="employee_profile">
                <div class="employee_card">
                    <img src='employee-photos/<?= $employee['employee_photo'] ?>' alt="">
                    <h2><?= $employee['first_name'] . ' ' . $employee['last_name'] ?></h2>

                    <!-- <div id="<?= $employee['specialty_id'] ?>" class="specialty">
                <?php if ($employee['specialty_title'] == "N/A") {
                    echo "";
                } else {
                    echo $employee['specialty_title'];
                }
                ?>
            </div> -->
                </div>
            </a>


        <?php endwhile; ?>
        <div id="show_employee_details" class="employee_modal hidden">
        </div>
    </section>






    <script src=" main.js">
    </script>
</body>

</html>