<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Headers: Content-Type");
session_start();
if($_SERVER["REQUEST_METHOD"]== 'POST'){
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

    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query database
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $sql1 = "SELECT * from info where username ='$username'";
    $result = mysqli_query($conn, $sql);
    $s_info = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) > 0) {
        // Login success
        echo "success";
        $_SESSION['username'] = $username;
        $row = mysqli_fetch_assoc($result);
        $info = mysqli_fetch_assoc($s_info);
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['pswd'] = $row['password'];
        $_SESSION['gender'] = $info['gender'];
        $_SESSION['branch'] = $info['branch'];
        $_SESSION['prog'] = $info['program'];
        $_SESSION['dob'] = $info['dob'];
    } else {
        // Login failed
        echo "failure";
    }
}
?>