<?php


require('../logic/dbconnect.php');
include('includes/header.php');



?>



<div class="container-fluid px-4 mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Location</h4>
                </div>
                <div class="card-body">
                    <form action="../logic/add_location_logic.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Location</label>
                                <input type="text" name="location" id="location" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Add Location</button>
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