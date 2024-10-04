<?php


require('../logic/dbconnect.php');
include('includes/header.php');



?>



<div class="container-fluid px-4 mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Specialty</h4>
                </div>
                <div class="card-body">
                    <form action="../logic/add_specialty_logic.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Specialty</label>
                                <input type="text" name="specialty" id="specialty" class="form-control">
                                <label>Organization</label>
                                <select name="organization" class="form-control" id="">
                                    <?php

                                    $query = "SELECT * FROM organization";
                                    $result = mysqli_query($conn, $query);

                                    while ($organization = mysqli_fetch_assoc($result)) {


                                        echo "<option value=\"{$organization['organization_id']}\">{$organization['organization_title']}</option>";
                                    }

                                    ?>

                                </select>
                            </div>

                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Add Specialty</button>
                        </div>
                    </form>
                </div>




            </div>

        </div>
    </div>
</div>


<?php include('includes/footer.php');
include('includes/scripts.php');
?>