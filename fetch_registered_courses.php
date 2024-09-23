<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "students";
$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$username = $_SESSION['username'];

$query = "SELECT * FROM registered_courses WHERE username = '$username'";
$result = $connection->query($query);
$registered_courses = array();
while ($row = $result->fetch_assoc()) {
    $registered_courses[] = array(
        'code' => $row['course_code'],
        'name' => $row['course_name'],
        'branch' => $row['course_branch'],
        'credit' => $row['course_credit'],
        'slot' => $row['course_slot']
    );
}

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode($registered_courses);
?>
