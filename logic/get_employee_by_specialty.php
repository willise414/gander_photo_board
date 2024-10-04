<?php

require "dbconnect.php";

// This is ID of organization
$id = $_POST['id'];


$sql = "SELECT id, first_name, last_name, roles_title, organization_title, employee_photo, is_manager, employees.organization_id, specialty_title, location_title
        FROM employees 
        INNER JOIN roles ON employees.roles_id = roles.roles_id
        INNER JOIN organization ON employees.organization_id = organization.organization_id
        INNER JOIN employee_to_specialty ON employees.id = employee_to_specialty.emp_id
        INNER JOIN specialty ON employee_to_specialty.specialty_id = specialty.specialty_id
        INNER JOIN location ON employees.location_id = location.location_id
        where specialty.specialty_id = $id
        ORDER BY last_name ASC";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id      = $row['id'];
    // echo "<script>console.log('$id' );</script>";
    // echo "<div id='" . $row['id'] . "' class='employee_profile'>";
    echo "<a class='employee_profile'  name='id' id='" . $row['id'] . "' >";
    echo "<div class='employee_card'>";
    echo "<img src='employee-photos/" . $row['employee_photo'] . "' alt='employee image'>";
    echo "<h2>" . $row['first_name'] . " " . $row['last_name'] . "</h2>";
    echo "<h2>" . $row['specialty_title'] . "</h2>";


    // echo "<h3>" . $row['organization_title'] . "</h3>";
    echo "</div>";
    echo "</a>";
    // echo "</div>";


}
