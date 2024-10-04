<?php

session_start();

require('../logic/dbconnect.php');


if (isset($_POST['submit'])) {
    $id = $_POST['location_id'];

    $title = $_POST['location_title'];


    $query = "UPDATE location
            SET location_title = '$title'
            WHERE location_id = $id
    ";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = "Organization updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-locations.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Failed to update organization";
        $_SESSION['query'] = $query;
        header("location:../admin/edit-locations.php");
        exit(0);
    }
}
