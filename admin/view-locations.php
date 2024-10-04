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
                    <h4>All Locations</h4>
                    <a href="add-location.php" class="btn btn-primary">Add Location</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Location</td>

                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT location_title, location_id
                                    FROM location 
                                    
                                    ORDER BY location_title ASC
                                    ";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {

                            ?>
                                    <tr>


                                        <td><?php echo $row['location_title']; ?></td>


                                        <td><a href=" edit-locations.php?id=<?= $row['location_id']; ?>" class="btn btn-success">Edit</a></td>
                                        <form action="../logic/delete_locations_logic.php" method="POST">
                                            <td><button type="submit" value="<?= $row['location_id']; ?>" name="location_delete" class=" btn btn-danger">Delete</button></td>
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