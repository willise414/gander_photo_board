<?php

ini_set("display_errors", 1);

require "dbconnect.php";

// if (isset($_POST['submit'])) {
//     // get data from form to verify user
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // get user
//     $fetch_user = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
//     $result = mysqli_query($conn, $fetch_user);
//     $user = mysqli_fetch_assoc($result);
//     $count = mysqli_num_rows($result);
//     if ($count == 1) {
//         session_start();
//         $_SESSION['admin'] = $user;
//         header("location: ../admin/index.php");
//     } else {
//         $_SESSION['message'] = "Incorrect username or password";
//         header("location: ../login.php");
//         die();
//     }
// }

if (isset($_POST['submit'])) {

    // get data from form to verify user
    $username = $_POST['username'];
    $password = $_POST['password'];

    // get user
    $fetch_user = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $fetch_user);
    $user = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        session_start();
        $_SESSION['admin'] = $user;
        header("location: ../admin/view-employees.php");
    } else {
        $_SESSION['message'] = "Incorrect username or password";
        header("location: ../login.php");
        die();
    }
}
