<?php



$sql = "SELECT * from organization ORDER BY organization_title ASC";
$result = mysqli_query($conn, $sql);



//fetch organizations from database



//echo mysqli_num_rows($result);
