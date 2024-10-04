<?php

require('../logic/dbconnect.php');
include('includes/header.php');
?>

<div class="container-fluid px-4 mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Organization</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT *                        
                                    FROM organization
                                    WHERE organization_id = $id
                                    ";
                        $result = mysqli_query($conn, $query);


                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $organization) {

                    ?>



                                <form action="../logic/update_organizations_logic.php" method="POST" enctype="multipart/form-data">
                                    <!-- Not the right way to get the ID if connected to internet. Security concern -->
                                    <input type="hidden" name="organization_id" value="<?= $organization['organization_id']; ?>">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>First Name</label>
                                            <input type="text" name="organization_title" id="organization_title" class="form-control" value="<?= $organization['organization_title']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        <a href="view-organizations.php" class="btn btn-primary">Cancel</a>
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