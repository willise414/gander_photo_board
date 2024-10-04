<?php

session_start();
require "dbconnect.php";
//create form data


if (isset($_POST['submit'])) {

    $role = $_POST['role'];

    $addOrganization = "INSERT INTO `roles`( `roles_title`) VALUES ('$role')";

    mysqli_query($conn, $addOrganization);





    if ($result) {

        $_SESSION['message'] = "Employee updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-roles.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Failed to update employee";
        $_SESSION['query'] = $query;
        header("location:../admin/view-roles.php");
        exit(0);
    }
}
