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

                        $query = "SELECT *                        
                                    FROM specialty
                                    WHERE specialty_id = $id
                                    ";
                        $result = mysqli_query($conn, $query);


                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $specialty) {

                    ?>



                                <form action="../logic/update_specialty_logic.php" method="POST" enctype="multipart/form-data">
                                    <!-- Not the right way to get the ID if connected to internet. Security concern -->
                                    <input type="hidden" name="specialty_id" value="<?= $specialty['specialty_id']; ?>">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Specialty</label>
                                            <input type="text" name="specialty_title" id="specialty_title" class="form-control" value="<?= $specialty['specialty_title']; ?>">
                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label>Organization</label>
                                            <select name="organization" class="form-control" id="">

                                                <?php
                                                echo "<option value=\"{$specialty['specialty_id']}\">{$specialty['specialty_organization']}</option>";
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


                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        <a href="view-specialties.php" class="btn btn-primary">Cancel</a>
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