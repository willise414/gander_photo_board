<?php

session_start();
require "dbconnect.php";
//create form data


if (isset($_POST['submit'])) {

    $specialty = $_POST['specialty'];
    $organization = $_POST['organization'];

    $addSpecialty = "INSERT INTO specialty (specialty_title, specialty_organization) VALUES ('$specialty', '$organization')";

    mysqli_query($conn, $addSpecialty);





    if ($result) {

        $_SESSION['message'] = "Employee updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-specialties.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Failed to update employee";
        $_SESSION['query'] = $query;
        header("location:../admin/view-specialties.php");
        exit(0);
    }
}
