<?php

session_start();

require('../logic/dbconnect.php');


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $location = $_POST['location'];
    $organization = $_POST['organization'];
    $role =   $_POST['role'];
    $specialty = $_POST['specialty'];
    $supervisor = $_POST['is_supervisor'];
    $manager = $_POST['is_manager'];
    $retirement_date = date('Y-m-d', strtotime($_POST['retirement_date']));
    $is_photo_empty = true;
    // echo ($retirement_date);
    // get current photo from database
    $sql = "SELECT employee_photo from employees where id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $current_photo = $row['employee_photo'];
    }

    // end get current photo


    // employee photo
    if (!empty($_FILES['employee_photo']['name'])) {
        $is_photo_empty = false;
        $photo = $_FILES['employee_photo'];

        $photoName = $_FILES['employee_photo']['name'];
        $photoTmp = $_FILES['employee_photo']['tmp_name'];
        $photoSize = $_FILES['employee_photo']['size'];
        $photoError = $_FILES['employee_photo']['error'];
        $photoType = $_FILES['employee_photo']['type'];

        $photoExt = explode('.', $photoName);
        $photoActualExt = strtolower(end($photoExt));
    } else {
        $is_photo_empty = true;
    }

    $allowed = array('jpg', 'jpeg', 'png');

    if ($is_photo_empty === false) {
        if (in_array($photoActualExt, $allowed)) {
            if ($photoError === 0) {
                if ($photoSize < 1000000) {
                    $photoNameNew = uniqid('', true) . "." . $photoActualExt;
                    // test for current image

                    // end test
                    $photoDestination = '../employee-photos/' . $photoNameNew;

                    move_uploaded_file($photoTmp, $photoDestination);
                }
            }
        }
    }
    // else {

    // $photoNameNew = $current_photo;
    // unlink('../employee-photos/' . $current_photo);
    // }

    if ($is_photo_empty === false) {


        $query = "UPDATE employees, employee_to_specialty
    SET employees.first_name = '$firstName', 
        employees.last_name = '$lastName',
        employees.location_id = '$location',    
        employees.organization_id = '$organization',
        employees.roles_id = '$role',
        employee_to_specialty.specialty_id = '$specialty',
        employees.is_supervisor = '$supervisor',
        employees.is_manager = '$manager',
        employees.retirement_date = '$retirement_date',
        employees.employee_photo = '$photoNameNew'
       
      
        
    WHERE employees.id = $id and employee_to_specialty.emp_id = $id
    ";




        $result = mysqli_query($conn, $query);
        unlink('../employee-photos/' . $current_photo);
    } else {
        $query = "UPDATE employees, employee_to_specialty
    SET employees.first_name = '$firstName', 
        employees.last_name = '$lastName',
        employees.location_id = '$location',    
        employees.organization_id = '$organization',
        employees.roles_id = '$role',
        employee_to_specialty.specialty_id = '$specialty',
        employees.is_supervisor = '$supervisor',
        employees.is_manager = '$manager',
        employees.retirement_date = '$retirement_date'
        
       
      
        
    WHERE employees.id = $id and employee_to_specialty.emp_id = $id
    ";

        var_dump($query);


        $result = mysqli_query($conn, $query);
    }

    // var_dump($result);
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
