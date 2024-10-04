<!-- <?php

// include('../logic/dbconnect.php');

// if (isset($_POST['search'])) {
//     $search = $_POST['search'];

//     $stmt = $conn->prepare("SELECT id, first_name, last_name, roles_title, organization_title, employee_photo
//                                     FROM employees 
//                                     INNER JOIN roles ON employees.roles_id = roles.roles_id
//                                     INNER JOIN organization ON employees.organization_id = organization.organization_id
//                                     WHERE first_name LIKE CONCAT'%$search%' OR last_name LIKE CONCAT('%', '$search', '%')");
//     $stmt->bind_param("ss", $search, $search);
//     // $sql = "SELECT * FROM employees WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";

// } else {
//     $stmt = $conn->prepare("select * from employees");
// }
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows) {
//     $output = "
    
//     <thead>
//                             <tr>
//                                 <td>Photo</td>
//                                 <td>Last Name</td>
//                                 <td>First Name</td>
//                                 <td>Organization</td>
//                                 <td>Role</td>
//                                 <td>Edit</td>
//                                 <td>Delete</td>
//                             </tr>
//                         </thead>
//                         <tbody>
//     ";
//     while ($row = $result->fetch_assoc()) {
//         $output .= "
//         <tr>
//             <td><img src='employee-photos/" . $row['employee_photo'] . "' alt='employee image'></td>
//             <td>" . $row['last_name'] . "</td>
//             <td>" . $row['first_name'] . "</td>
//             <td>" . $row['organization_title'] . "</td>
//             <td>" . $row['roles_title'] . "</td>
//             <td><a href='update_employee.php?id=" . $row['id'] . "'>Edit</a></td>
//             <td><a href='delete_employee.php?id=" . $row['id'] . "'>Delete</a></td>
//         </tr>
//         </tbody>
//         ";
//     }
// } -->
