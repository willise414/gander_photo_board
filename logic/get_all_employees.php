<?php
require "dbconnect.php";

$all_employees_query = "SELECT id, first_name, last_name, roles_title, organization_title, employee_photo
FROM employees 
INNER JOIN roles ON employees.roles_id = roles.roles_id
INNER JOIN organization ON employees.organization_id = organization.organization_id
ORDER BY last_name ASC";
$all_employees = mysqli_query($conn, $all_employees_query);

// while ($employee = mysqli_fetch_assoc($all_employees)) {

//     echo "<a name='id' id='" . $employee['id'] . "' class='employee_profile'>";
//     echo "<div class='employee_card'>";
//     echo "<img src='employee-photos/" . $employee['employee_photo'] . "' alt='employee image'>";
//     echo "<h2>" . $employee['first_name'] . " " . $employee['last_name'] . "</h2>";

//     echo "<h3>" . $employee['organization_title'] . "</h3>";
//     echo "</div>";

//     // modal

//     // echo "<div id= 'show_employee_details' class='employee_modal hidden' data-id='" . $employee['id'] . "'>";
//     // echo '<div>' . $employee['first_name'] . '</div>';


//     // echo '<div class="employee_image">';
//     // echo '<img src="employee-photos/' . $employee['employee_photo'] . '" alt="employee image">';
//     // echo '</div>';

//     // echo '<div class="employee_details">';

//     // echo "<h2>" . $employee['first_name'] . " " . $employee['last_name'] . "</h2>";
//     // echo "<h3>" . $employee['roles_title'] . "</h3>";
//     // echo "<h3>" . $employee['organization_title'] . "</h3>";
//     // echo '</div>';
//     // echo "</div>";
// }
