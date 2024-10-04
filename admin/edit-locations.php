<?php

require('../logic/dbconnect.php');
include('includes/header.php');
?>

<div class="container-fluid px-4 mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Location</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT *                        
                                    FROM location
                                    WHERE location_id = $id
                                    ";
                        $result = mysqli_query($conn, $query);


                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $location) {

                    ?>



                                <form action="../logic/update_location_logic.php" method="POST">
                                    <!-- Not the right way to get the ID if connected to internet. Security concern -->
                                    <input type="hidden" name="location_id" value="<?= $location['location_id']; ?>">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Location</label>
                                            <input type="text" name="location_title" id="location_title" class="form-control" value="<?= $location['location_title']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        <a href="view-locations.php" class="btn btn-primary">Cancel</a>
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