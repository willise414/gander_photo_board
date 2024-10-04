<?php

session_start();

require('../logic/dbconnect.php');


if (isset($_POST['submit'])) {
    $id = $_POST['organization_id'];

    $title = $_POST['organization_title'];


    $query = "UPDATE organization
            SET organization_title = '$title'
            WHERE organization_id = $id
    ";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = "Organization updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-organizations.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Failed to update organization";
        $_SESSION['query'] = $query;
        header("location:../admin/edit-organizations.php");
        exit(0);
    }
}
