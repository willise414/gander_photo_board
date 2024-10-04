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
                    <h4>All Specialties</h4>
                    <a href="add-specialty.php" class="btn btn-primary">Add Specialty</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Specialty</td>
                                <td>Organization</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT specialty_id, specialty_title, specialty_organization, organization_id, organization_title
                                    FROM specialty inner join organization on specialty.specialty_organization = organization.organization_id
                                    
                                    ORDER BY specialty_title ASC
                                    ";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {

                            ?>
                                    <tr>


                                        <td><?php echo $row['specialty_title']; ?></td>
                                        <td><?php echo $row['organization_title']; ?></td>

                                        <td><a href=" edit-specialty.php?id=<?= $row['specialty_id']; ?>" class="btn btn-success">Edit</a></td>
                                        <form action="../logic/delete_specialty_logic.php" method="POST">
                                            <td><button type="submit" value="<?= $row['specialty_id']; ?>" name="specialty_delete" class=" btn btn-danger">Delete</button></td>
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