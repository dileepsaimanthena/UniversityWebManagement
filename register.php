<?php
session_start();
$course_code = $_POST['course_code'];
$slot = $_POST['slot'];

$host = "localhost";
$user = "root";
$password = "";
$database = "students";
$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get the credit value for the selected course
$query = "SELECT credit,course_name FROM courses WHERE code = '$course_code'";
$result = $connection->query($query);
$row = $result->fetch_assoc();
$credit = $row['credit'];
$course_name = $row['course_name'];

// Check if the user has already registered for the selected course
$username = $_SESSION['username'];
$query = "SELECT * FROM registered_courses WHERE username = '$username' AND course_code = '$course_code'";
$result = $connection->query($query);
if ($result->num_rows > 0) {
    echo "You have already registered for this course.";
} else {
    // Check if the user has already reached the maximum credit limit
    $query = "SELECT SUM(course_credits) AS total_credits FROM registered_courses WHERE username = '$username'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    $total_credits = $row['total_credits'] + $credit;
    if ($total_credits > 22) {
        echo "You have reached the maximum credit limit.";
    } else {
        // Check if the slot is already taken
            $query = "SELECT * FROM registered_courses WHERE course_slot = '$slot' and username = '$username'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                echo "This slot is already taken.";
            } else {
                // Insert the registration details into the registered_courses table
                $query = "INSERT INTO registered_courses (username, course_code, course_name, course_credits, course_slot) VALUES ('$username', '$course_code', '$course_name', $credit, '$slot')";
                if ($connection->query($query) === TRUE) {
                    echo "You have successfully registered for the course.";
                } else {
                    echo "Error: " . $query . "<br>" . $connection->error;
                }

                // Update or insert the credits value into the registered_credits table
                $query = "SELECT * FROM registered_credits WHERE username = '$username'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $current_credits = $row['credits'];
                    $updated_credits = $current_credits + $credit;
                    $query = "UPDATE registered_credits SET credits = $updated_credits WHERE username = '$username'";
                    if ($connection->query($query) !== TRUE) {
                        echo "Error: " . $query . "<br>" . $connection->error;
                    }
                } else {
                    $query = "INSERT INTO registered_credits (username, credits) VALUES ('$username', $credit)";
                    if ($connection->query($query) !== TRUE) {
                        echo "Error: " . $query . "<br>" . $connection->error;
                    }
                }
                
            }
      }  }
?>