<!-- This file has a working backup of edit-employees.php and update_employee_logic.php -->

<!-- edit-employees.php -->


<?php

require('../logic/dbconnect.php');
include('includes/header.php');

?>



<div class="container-fluid px-4">
    <h3 class="mt-4">Employee Database</h3>
    <ol class="breadcrumb mb-4">

    </ol>




    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Employees</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT id, first_name, last_name, employees.roles_id, roles_title, employees.organization_id, organization_title, emp_id, specialty_title, location_title, employees.location_id
                                    FROM employees 
                                    INNER JOIN roles ON employees.roles_id = roles.roles_id
                                    INNER JOIN location ON employees.location_id = location.location_id
                                    INNER JOIN organization ON employees.organization_id = organization.organization_id
                                    INNER JOIN employee_to_specialty ON employees.id = employee_to_specialty.emp_id
                                    INNER JOIN specialty ON employee_to_specialty.specialty_id = specialty.specialty_id
                                    WHERE id = $id
                                    ";
                        $result = mysqli_query($conn, $query);
                        // var_dump($result);

                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $employee) {

                    ?>



                                <form action="../logic/update_employee_logic.php" method="POST">
                                    <!-- Not the right way to get the ID if connected to internet. Security concern -->
                                    <input type="text" name="id" value="<?= $employee['id']; ?>">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">First Name</label>
                                            <input type="text" name="first_name" class="form-control" value="<?= $employee['first_name']; ?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value="<?= $employee['last_name']; ?>">
                                        </div>
                                        <div class="col-md-12 mb-3 custom-file">
                                            <label for="">Employee Photo</label>
                                            <input type="file" name="employee-photo" class="form-control custom-file-input">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Location</label>


                                            <select name="location" class="form-control" id="">

                                                <!-- <option value="">-- Select Location --</option> -->
                                                <?php
                                                echo "<option value=\"{$employee['location_id']}\">{$employee['location_title']}</option>";
                                                ?>

                                                <?php
                                                $sql = "SELECT location_id, location_title FROM location";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value=\"{$row['location_id']}\">{$row['location_title']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Organization</label>
                                            <select name="organization" class="form-control" id="">
                                                <!-- <option value="">-- Select Organization --</option> -->
                                                <?php
                                                echo "<option value=\"{$employee['organization_id']}\">{$employee['organization_title']}</option>";
                                                ?>

                                                <?php
                                                $sql = "SELECT organization_id, organization_title FROM organization";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value=\"{$row['organization_id']}\">{$row['organization_title']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Role</label>
                                            <select name="role" class="form-control" id="">
                                                <!-- <option value="">-- Select Role --</option> -->
                                                <?php
                                                echo "<option value=\"{$employee['roles_id']}\">{$employee['roles_title']}</option>";
                                                ?>

                                                <?php
                                                $sql = "SELECT roles_id, roles_title FROM roles";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value=\"{$row['roles_id']}\">{$row['roles_title']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Specialty</label>
                                            <select name="specialty" class="form-control" id="">
                                                <!-- <option value="">-- Select Specialty --</option> -->
                                                <?php
                                                echo "<option value=\"{$employee['specialty_id']}\">{$employee['specialty_title']}</option>";
                                                ?>

                                                <?php
                                                $sql = "SELECT specialty_id, specialty_title FROM specialty";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value=\"{$row['specialty_id']}\">{$row['specialty_title']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div>
                </div>
                </form>

            <?php

                            }
                        } else {
            ?>
            <h4>No Employee Found</h4>
    <?php
                        }
                    }



    ?>

            </div>
        </div>
    </div>
</div>
</div>

<?php include('includes/footer.php');
include('includes/scripts.php');
?>

<!-- update_employee_logic.php -->

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

    $query = "UPDATE employees, employee_to_specialty
    SET employees.first_name = '$firstName', 
        employees.last_name = '$lastName', 
        employees.location_id = '$location',
        employees.organization_id = '$organization',
        employees.roles_id = '$role',
        employee_to_specialty.specialty_id = '$specialty'
        
    WHERE employees.id = $id
    AND employee_to_specialty.emp_id = $id";
    $result = mysqli_query($conn, $query);


    if ($result) {
        $_SESSION['message'] = "Employee updated successfully";
        header("location:../admin/view-employees.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Failed to update employee";
        header("location:../admin/view-employees.php");
        exit(0);
    }
}
