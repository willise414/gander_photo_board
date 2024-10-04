<?php
session_start();

require('../logic/dbconnect.php');


if (isset($_POST['location_delete'])) {
    $id = $_POST['location_delete'];
    $query = "DELETE FROM location WHERE location_id = $id";
    $result = mysqli_query($conn, $query);




    if ($result) {

        $_SESSION['message'] = "Employee updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-locations.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Failed to update employee";
        $_SESSION['query'] = $query;
        header("location:../admin/view-locations.php");
        exit(0);
    }
}
