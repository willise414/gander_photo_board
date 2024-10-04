<?php

session_start();

require('../logic/dbconnect.php');


if (isset($_POST['submit'])) {
    $id = $_POST['roles_id'];

    $title = $_POST['roles_title'];


    $query = "UPDATE roles
            SET roles_title = '$title'
            WHERE roles_id = $id
    ";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = "Organization updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-roles.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Failed to update organization";
        $_SESSION['query'] = $query;
        header("location:../admin/edit-roles.php");
        exit(0);
    }
}
