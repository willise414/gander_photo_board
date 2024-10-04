<?php

require('../logic/dbconnect.php');
include('includes/header.php');

?>



<div class="container-fluid px-4 mt-4">

    <div class="row">
        <div class="col-md-12">
            <!-- <?php include('message.php') ?> -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4>All Employees</h4>
                    <a href="add-employee.php" class="btn btn-primary">Add Employee</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Photo</td>
                                <td>Last Name</td>
                                <td>First Name</td>
                                <td>Organization</td>
                                <td>Role</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT id, first_name, last_name, roles_title, organization_title, employee_photo
                                    FROM employees 
                                    INNER JOIN roles ON employees.roles_id = roles.roles_id
                                    INNER JOIN organization ON employees.organization_id = organization.organization_id
                                    ORDER BY last_name ASC
                                    ";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {

                            ?>
                                    <tr>

                                        <td style="text-align: center;"><img src='../employee-photos/<?= $row['employee_photo'] ?>' class="img-thumbnail" alt=""></td>

                                        <td><?php echo $row['last_name']; ?></td>
                                        <td><?php echo $row['first_name']; ?></td>
                                        <td><?php echo $row['organization_title']; ?></td>
                                        <td><?php echo $row['roles_title']; ?></td>

                                        <td><a href=" edit-employee.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a></td>
                                        <td><a href=" delete-employee.php?id=<?= $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                        <!-- <td><button type="button" class=" btn btn-danger">Delete</button></td> -->

                                    </tr>
                                <?php

                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Records Found</td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');
include('includes/scripts.php');
?>