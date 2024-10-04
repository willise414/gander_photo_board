<?php


require('../logic/dbconnect.php');
include('includes/header.php');



?>



<div class="container-fluid px-4 mt-4">






    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Employee</h4>

                </div>
                <div class="card-body">



                    <form action="../logic/add_employee_logic.php" method="POST" enctype="multipart/form-data">


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 custom-file">
                                <label for="">Employee Photo</label>
                                <input type="file" name="employee_photo" id="employee_photo" class="form-control custom-file-input">




                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="">Location</label>


                                <select name="location" class="form-control" id="" required>

                                    <option value=""> -- Select Location --</option>


                                    <?php
                                    $sql = "SELECT location_id, location_title FROM location";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=\"{$row['location_id']}\">{$row['location_title']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Organization</label>
                                <select name="organization" class="form-control" id="" required>
                                    <option value=""> -- Select Organization -- </option>


                                    <?php
                                    $sql = "SELECT organization_id, organization_title FROM organization";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=\"{$row['organization_id']}\">{$row['organization_title']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="">Role</label>
                                <select name="role" class="form-control" id="" required>

                                    <option value=""> -- Select Role -- </option>

                                    <?php
                                    $sql = "SELECT roles_id, roles_title FROM roles ORDER BY roles_title ASC";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=\"{$row['roles_id']}\">{$row['roles_title']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Specialty</label>
                                <select name="specialty" class="form-control" id="" required>

                                    <option value=""> -- Select Specialty -- </option>

                                    <?php
                                    $sql = "SELECT specialty_id, specialty_title FROM specialty order by specialty_title ASC";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=\"{$row['specialty_id']}\">{$row['specialty_title']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Supervisor</label>
                                <select name="is_supervisor" class="form-control" id="">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>


                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manager</label>
                                <select name="is_manager" class="form-control" id="" required>
                                    <option value=""> -- Select Option --</option>
                                    <!-- <?php
                                            // echo "<option value=\"{$employee['organization_id']}\">{$employee['organization_title']}</option>";
                                            ?> -->

                                    <?php
                                    $sql = "SELECT organization_id, organization_title FROM organization where organization_title = 'Management'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=\"{$row['organization_id']}\">Yes</option>";
                                    }
                                    ?>
                                    <option value="0">No</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Add Employee</button>
                        </div>
                </div>
                </form>



            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php');
include('includes/scripts.php');
?>