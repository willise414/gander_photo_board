<?php
session_start();

require('../logic/dbconnect.php');


if (isset($_POST['organization_delete'])) {
    $id = $_POST['organization_delete'];
    $query = "DELETE FROM organization WHERE organization_id = $id";
    $result = mysqli_query($conn, $query);




    if ($result) {

        $_SESSION['message'] = "Employee updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-organizations.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Failed to update employee";
        $_SESSION['query'] = $query;
        header("location:../admin/view-organizations.php");
        exit(0);
    }
}
