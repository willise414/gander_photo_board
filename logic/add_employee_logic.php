<?php

session_start();
require "dbconnect.php";
//create form data

var_dump($_POST);
if (isset($_POST['submit'])) {

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $_lastName = mysqli_real_escape_string($conn, $lastName); //needed to allow for apostrophe in last names.
    $isManager = $_POST['is_manager'];
    $location = $_POST['location'];
    $organization = $_POST['organization'];
    $role =   $_POST['role'];
    $specialty = $_POST['specialty'];
    $isSupervisor = $_POST['is_supervisor'];

    // photo

    $photo = $_FILES['employee_photo'];

    $photoName = $_FILES['employee_photo']['name'];
    $photoTmp = $_FILES['employee_photo']['tmp_name'];
    $photoSize = $_FILES['employee_photo']['size'];
    $photoError = $_FILES['employee_photo']['error'];
    $photoType = $_FILES['employee_photo']['type'];

    $photoExt = explode('.', $photoName);
    $photoActualExt = strtolower(end($photoExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($photoActualExt, $allowed)) {
        if ($photoError === 0) {
            if ($photoSize < 1000000) {
                $photoNameNew = uniqid('', true) . "." . $photoActualExt;

                $photoDestination = '../employee-photos/' . $photoNameNew;
                move_uploaded_file($photoTmp, $photoDestination);
            } else {
                echo "<script>console.log('Debug Objects: photo size too big' );</script>";
            }
        }
    }

    //employee has to insert before the specialty



    $insertEmployee = "INSERT
    INTO
    employees 
    (
        first_name,
        last_name,
        is_manager,
        location_id,
        organization_id,
        roles_id,
        specialty_id,
        employee_photo,
        is_supervisor
       
    )
    VALUES
    (
        '$firstName',
        '$_lastName',
        '$isManager',
        '$location',
        '$organization',
        '$role',
        '$specialty',
        '$photoNameNew',
        '$isSupervisor'
        
    )";


    //insert the employee here
    mysqli_query($conn, $insertEmployee);


    $get_employee_id = "SELECT MAX(id) FROM employees";
    $result = mysqli_query($conn, $get_employee_id);

    $result = mysqli_fetch_assoc($result)['MAX(id)'];

    var_dump($result);

    $update_specialty = "INSERT INTO employee_to_specialty (emp_id, specialty_id) VALUES ($result, $specialty)";
    mysqli_query($conn, $update_specialty);

    if ($result) {
        echo '<script>console.log("Your stuff here")</script>';
        $_SESSION['message'] = "Employee updated successfully";
        $_SESSION['query'] = $query;
        header("location:../admin/view-employees.php");
        exit(0);
    } else {
        echo '<script>console.log("Your stuff here")</script>';
        $_SESSION['message'] = "Failed to update employee";
        $_SESSION['query'] = $query;
        header("location:../admin/edit-employees.php");
        exit(0);
    }
}
