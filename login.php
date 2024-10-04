<?php
ini_set("display_errors", 1);
require('logic/dbconnect.php');
require('logic/admin_login_logic.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/styles.css">
    <link rel="stylesheet" href="css/style.css">

    <script defer src="jquery/jquery-3.7.1.min.js"></script>
    <script defer src="admin/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include('message.php'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Photo Board Admin Login</h4>
                        </div>

                        <div class="card-body">
                            <form action="logic/admin_login_logic.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for="Username"></label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Password"></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>