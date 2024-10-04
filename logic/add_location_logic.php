<?php

session_start();
require "dbconnect.php";
//create form data


if (isset($_POST['submit'])) {

    $location = $_POST['location'];
    $_location = mysqli_real_escape_string($conn, $location); //needed to allow for apostrophe in St. John's Tower. 








    $addLocation = "INSERT INTO  location (location_title) VALUES ('$_location')";


    mysqli_query($conn, $addLocation);





    if ($result) {
        echo '<script>console.log("Your stuff here")</script>';
        $_SESSION['message'] = "Employee updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-locations.php");
        exit(0);
    } else {
        echo '<script>console.log("Your stuff here")</script>';
        $_SESSION['message'] = "Failed to update employee";
        $_SESSION['query'] = $query;
        header("location:../admin/view-locations.php");
        exit(0);
    }
}
