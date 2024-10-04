<?php

session_start();

require('../logic/dbconnect.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM employees WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $employee = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        $employee_photo = $employee['employee_photo'];
        $employe_path = '../employee-photos/' . $employee_photo;
        if ($employe_path) {
            unlink($employe_path);
        }
    }


    $delete_employee_query = "DELETE FROM employees WHERE id = $id";
    $delete_employee_result = mysqli_query($conn, $delete_employee_query);
}
header("location:../admin/view-employees.php");
