<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "photo_board";

// Create connection
$conn = new mysqli($dbhost, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// $sql = "SELECT * from organization order by title ASC";
// $result = mysqli_query($conn, $sql);


// echo mysqli_num_rows($result);

// Close connection
//$conn->close();
