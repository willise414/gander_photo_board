<?php

use function PHPSTORM_META\sql_injection_subst;

require('../logic/dbconnect.php');
include('includes/header.php');

?>



<div class="container-fluid px-4 mt-4">

    <div class="row">
        <div class="col-md-12">
            <!-- <?php include('message.php') ?> -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4>All Organizations</h4>
                    <a href="add-organization.php" class="btn btn-primary">Add Organization</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Organization</td>

                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT organization_title, organization_id
                                    FROM organization 
                                    
                                    ORDER BY organization_title ASC
                                    ";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {

                            ?>
                                    <tr>


                                        <td><?php echo $row['organization_title']; ?></td>


                                        <td><a href=" edit-organizations.php?id=<?= $row['organization_id']; ?>" class="btn btn-success">Edit</a></td>
                                        <form action="../logic/delete_organizations_logic.php" method="POST">
                                            <td><button type="submit" value="<?= $row['organization_id']; ?>" name="organization_delete" class=" btn btn-danger">Delete</button></td>
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