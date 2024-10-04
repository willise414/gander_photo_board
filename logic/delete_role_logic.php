<?php
session_start();

require('../logic/dbconnect.php');


if (isset($_POST['role_delete'])) {
    $id = $_POST['role_delete'];
    $query = "DELETE FROM roles WHERE roles_id = $id";
    $result = mysqli_query($conn, $query);




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
