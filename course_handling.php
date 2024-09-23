<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Headers: Content-Type");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "students";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query database
    $sql = "SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);

    // Convert query result to JSON array of objects
    $courses = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $course = array(
                "name" => $row["course_name"],
                "code" => $row["code"],
                "branch" => $row["branch"],
                "credit" => $row["credit"]
            );
            array_push($courses, $course);
        }
    }
    
    // Close database connection
    mysqli_close($conn);

    // Return JSON response
    header("Content-Type: application/json");
    echo json_encode($courses);
?>
