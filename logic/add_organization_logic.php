<?php

session_start();
require "dbconnect.php";
//create form data


if (isset($_POST['submit'])) {

    $organization = $_POST['organization'];








    $addOrganization = "INSERT INTO `organization`( `organization_title`) VALUES ('$organization')";


    mysqli_query($conn, $addOrganization);





    if ($result) {
        echo '<script>console.log("Your stuff here")</script>';
        $_SESSION['message'] = "Employee updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-organizations.php");
        exit(0);
    } else {
        echo '<script>console.log("Your stuff here")</script>';
        $_SESSION['message'] = "Failed to update employee";
        $_SESSION['query'] = $query;
        header("location:../admin/view-organizations.php");
        exit(0);
    }
}
