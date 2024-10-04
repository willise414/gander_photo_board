<?php

session_start();

require('../logic/dbconnect.php');


if (isset($_POST['submit'])) {
    $id = $_POST['specialty_id'];

    $title = $_POST['specialty_title'];
    $organization = $_POST['organization'];


    $query = "UPDATE specialty
            SET specialty_title = '$title', specialty_organization = '$organization'
            WHERE specialty_id = $id
    ";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = "Organization updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-specialties.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Failed to update organization";
        $_SESSION['query'] = $query;
        header("location:../admin/edit-specialty.php");
        exit(0);
    }
}
