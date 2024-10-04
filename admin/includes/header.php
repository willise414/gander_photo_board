<?php
include('../logic/search_employee.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Photo Board Admin Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="assets/datatables.min.css" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/custom.css">
    <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->
    <script src="assets/font-awesome-v6.3.0.js"></script>
    <script defer src="js/bootstrap.bundle.min.js"></script>

</head>

<body class="sb-nav-fixed">

    <?php include('includes/navbar-top.php'); ?>

    <div id="layoutSidenav">

        <?php include('includes/sidebar.php'); ?>

        <div id="layoutSidenav_content">
            <main>