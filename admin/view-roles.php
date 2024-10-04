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
                    <h4>All Roles</h4>
                    <a href="add-role.php" class="btn btn-primary">Add Role</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Role</td>

                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT roles_title, roles_id
                                    FROM roles
                                    
                                    ORDER BY roles_title ASC
                                    ";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {

                            ?>
                                    <tr>


                                        <td><?php echo $row['roles_title']; ?></td>


                                        <td><a href=" edit-roles.php?id=<?= $row['roles_id']; ?>" class="btn btn-success">Edit</a></td>
                                        <form action="../logic/delete_role_logic.php" method="POST">
                                            <td><button type="submit" value="<?= $row['roles_id']; ?>" name="role_delete" class=" btn btn-danger">Delete</button></td>
                                        </form>

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