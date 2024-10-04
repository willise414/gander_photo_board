<?php

require('../logic/dbconnect.php');
include('includes/header.php');



?>



<div class="container-fluid px-4 mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Employee</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT id,    
                                        first_name, 
                                        last_name, 
                                        employees.roles_id, 
                                        roles_title, 
                                        employees.organization_id, 
                                        organization_title, 
                                        emp_id, 
                                        specialty_title, 
                                        location_title, 
                                        employees.location_id, 
                                        employee_to_specialty.specialty_id, 
                                        is_manager,
                                        is_supervisor,
                                        employee_photo
                                        
                                    FROM employees 
                                    INNER JOIN roles ON employees.roles_id = roles.roles_id
                                    INNER JOIN location ON employees.location_id = location.location_id
                                    INNER JOIN organization ON employees.organization_id = organization.organization_id
                                    INNER JOIN employee_to_specialty ON employees.id = employee_to_specialty.emp_id
                                    INNER JOIN specialty ON employee_to_specialty.specialty_id = specialty.specialty_id
                                    WHERE id = $id
                                    ";
                        $result = mysqli_query($conn, $query);


                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $employee) {

                    ?>



                                <form action="../logic/delete_employee_logic.php" method="POST" enctype="multipart/form-data">
                                    <!-- Not the right way to get the ID if connected to internet. Security concern -->
                                    <input type="hidden" name="id" value="<?= $employee['id']; ?>">

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <img src='../employee-photos/<?= $employee['employee_photo'] ?>' class="img-edit-employee" alt="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $employee['first_name']; ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $employee['last_name']; ?>">
                                        </div>
                                        <div class="col-md-6 mb-3 custom-file">
                                            <label for="">Employee Photo</label>
                                            <input type="file" name="employee_photo" id="employee_photo" class="form-control custom-file-input">
                                        </div>
                                        <div class=" col-md-6 mb-3">
                                            <label for="">Location</label>


                                            <select name="location" class="form-control" id="">


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
                                        <div class="col-md-6 mb-3">
                                            <label for="">Organization</label>
                                            <select name="organization" class="form-control" id="">

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
                                        <div class="col-md-6 mb-3">
                                            <label for="startDate">Retirement Date (if applicable)</label>
                                            <input id="retirement_date" name="retirement_date" class="form-control" type="date" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Role</label>
                                            <select name="role" class="form-control" id="">

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
                                        <div class="col-md-6 mb-3">
                                            <label for="">Specialty</label>
                                            <select name="specialty" class="form-control" id="">

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
                                        <div class="col-md-6 mb-3">
                                            <label for="">Supervisor</label>
                                            <select name="is_supervisor" class="form-control" id="">

                                                <?php
                                                if ($employee['is_supervisor'] == 1) {
                                                    echo "<option value=\"1\">Yes</option>";
                                                    echo "<option value=\"0\">No</option>";
                                                } else {
                                                    echo "<option value=\"0\">No</option>";
                                                    echo "<option value=\"1\">Yes</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                        <!-- <div class="col-md-6 mb-3">
                                            <label for="">Manager</label>
                                            <select name="is_manager" class="form-control" id="">

                                                <?php
                                                // if ($employee['is_manager'] == 1) {
                                                //     echo "<option value=\"1\">Yes</option>";
                                                //     echo "<option value=\"0\">No</option>";
                                                // } else {
                                                //     echo "<option value=\"0\">No</option>";
                                                //     echo "<option value=\"1\">Yes</option>";
                                                // }
                                                echo "<option value=\"{$employee['organization_id']}\">{$employee['organization_title']}</option>";

                                                ?>

                                            </select>
                                        </div> -->
                                        <div class="col-md-6 mb-3">
                                            <label for="">Manager</label>
                                            <select name="is_manager" class="form-control" id="">
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
                                        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                                        <a href="view-employees.php" class="btn btn-primary">Cancel</a>
                                    </div>
                                </form>
                </div>


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


<?php include('includes/footer.php');
include('includes/scripts.php');
?>