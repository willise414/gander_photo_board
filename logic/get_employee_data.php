<!-- Get employee details to display in modal -->

<?php

require "dbconnect.php";

$id = $_POST['id'];
// echo "<script>console.log($id)</script>";
$sql = "SELECT id, first_name, last_name, roles_title, organization_title, employee_photo, retirement_date, location_title
        FROM employees 
        INNER JOIN roles ON employees.roles_id = roles.roles_id
        INNER JOIN location ON employees.location_id = location.location_id
        INNER JOIN organization ON employees.organization_id = organization.organization_id where id = $id";
$result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//     $row = mysqli_fetch_assoc($result);
while ($row = mysqli_fetch_assoc($result)) {

    // echo "<script> console.log('clicked'); </script>";
    // echo "div id = 'show_employee_details' class='employee_modal hidden' data-id='" . $row['id'] . "'>";

    echo '<div class="employee_image">';
    echo '<img src="employee-photos/' . $row['employee_photo'] . '" alt="employee image">';
    echo "</div>";



    echo '<div class="employee_details">';

    echo "<h2>" . $row['first_name'] . " " . $row['last_name'] . "</h2>";
    echo "<h3>" . $row['roles_title'] . "</h3>";
    echo "<h3>" . $row['location_title'] . "</h3>";
    if ($row['organization_title'] == 'Retired') {
        echo " ";
    } else {
        echo "<h3>" . $row['organization_title'] . "</h3>";
    }

    if ($row['organization_title'] == 'Retired') {
        echo "<h3>Retired: " . $row['retirement_date'] . "</h3>";
    }
    echo "</div>";
    echo '</div>';
}
