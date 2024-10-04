<?php

//fetch organizations from database
$sql = "SELECT * from specialty where specialty_organization = 'ATS Learning' ORDER BY specialty_title ASC";
$result = mysqli_query($conn, $sql);
//echo mysqli_num_rows($result);

if(isset($_GET['getEmployees'])) {
    getEmployees($conn);
}
function getEmployees ($conn) {
    $sql = "SELECT * from employees where organization_id = 1";
    $result = mysqli_query($conn, $sql);
   if($result->num_rows > 0) {
    echo $result->num_rows;
}
};
