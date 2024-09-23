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

if(isset($_POST['delete_course'])) {
    $course_id = $_POST['course_id'];
    $get_credits_query = "SELECT course_credits FROM registered_courses WHERE id=$course_id";
    $credits_result = $connection->query($get_credits_query);
    $credits_row = $credits_result->fetch_assoc();
    $credits = $credits_row['course_credits'];
    
    $delete_query = "DELETE FROM registered_courses WHERE id=$course_id";
    if($connection->query($delete_query) === TRUE) {
        $username = $_SESSION['username']; // Replace with the actual username
        $query = "SELECT * FROM registered_courses WHERE username = '$username'";
        $result = $connection->query($query);
        $registered_courses = array();
        while ($row = $result->fetch_assoc()) {
            $registered_courses[] = array(
                'id' => $row['id'],
                'code' => $row['course_code'],
                'name' => $row['course_name'],
                'credits' => $row['course_credits'],
                'slot' => $row['course_slot']
            );
        }
        $query = "SELECT * FROM registered_credits WHERE username = '$username'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_registered_credits = $row['credits'] - $credits;
            if ($_registered_credits <= 0) {
                $delete_credits_query = "DELETE FROM registered_credits WHERE username='$username'";
                $connection->query($delete_credits_query);
            } else {
                $update_credits_query = "UPDATE registered_credits SET credits=$_registered_credits WHERE username='$username'";
                $connection->query($update_credits_query);
            }
        } else {
            $_registered_credits = 0;
        }
        header("Location: showcourses.php");
        exit();
    } else {
        echo "Error deleting course: " . $connection->error;
    }
} else {
    $username = $_SESSION['username']; // Replace with the actual username
    $query = "SELECT * FROM registered_courses WHERE username = '$username'";
    $result = $connection->query($query);
    $registered_courses = array();
    while ($row = $result->fetch_assoc()) {
        $registered_courses[] = array(
            'id' => $row['id'],
            'code' => $row['course_code'],
            'name' => $row['course_name'],
            'credits' => $row['course_credits'],
            'slot' => $row['course_slot']
        );
    }
    $query = "SELECT * FROM registered_credits WHERE username = '$username'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_registered_credits = $row['credits'];
    } else {
        $_registered_credits = 0;
    }
}
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <title>Profile</title>
    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="index-styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gajraj One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans">
    <link rel="stylesheet" href="s-interface.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="profile.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
       td{
        text-align: center;
       }
     </style>
   </head>
<body>
  <header class="top" style="z-index: 3;">
    <a href="student-interface.php"><img id="unilogo" src="https://i.ibb.co/2YmpQkY/61f7f40eb8ebd50004c60b69.png" alt=""></a>
    <h1 id="header">Student Login</h1>
    <h1 id="header" style="z-index: 0;">UNI WEB</h1>
    <style>
      body{
        overflow: visible;
      }
    </style>
    <div class="logout" >
      <div class="sublgdiv1" onclick="toggleSubmenu('sublgdiv')">
        <span style="font-family: Josefin Sans;">Welcome</span>
        <div style="text-align: center;">
          <span style="font-family: Josefin Sans;">user</span>
        </div>
      </div>
      <div class="sublgdiv" id="sublgdiv">
        <img src="user.png" alt="" class="userimg">
        <div><button class="lgbutton" id="lgbutton">
          <i  class="bi bi-box-arrow-left"></i>
          Sign out
        </button></div>
      </div>
    </div>
  </header>
  
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bx-menu' ></i>
      <span class="logo_name">UNIWEB</span>
    </div>
    <ul class="nav-links">
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bi bi-info-circle"></i>
            <span class="link_name">Info</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Info</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="credentials.php">Credentials</a></li>
          <li><a href="studentBankinfo.php">Student Bank Info</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bi bi-journal"></i>
            <span class="link_name">Courses</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Courses</a></li>
          <li><a href="Catalog.php">Catalog</a></li>
          <li><a href="Registrstion.php">Registration</a></li>
          <li><a href="timetable.php">TimeTable</a></li>
          <li><a href="syllabus.php">Syllabus</a></li>
          <li><a href="materials.php">Materials</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bi bi-calendar-check"></i>
            <span class="link_name">Attendance</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Attendance</a></li>
          <li><a href="Records.php">Records</a></li>
          <li><a href="Attendancepolicy.php">Attendance Policy</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bi bi-file-earmark-bar-graph"></i>
            <span class="link_name">Grades</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Grades</a></li>
          <li><a href="Viewgrades.php">View Grades</a></li>
          <li><a href="Gradedistri.php">Grade Distribution</a></li>
          <li><a href="gradepolicy.php">Grade Policy</a></li>
          <li><a href="GPAcalc.php">GPA Calculator</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bi bi-file-earmark-text"></i>
            <span class="link_name">Exams</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Exams</a></li>
          <li><a href="schedule.php">Schedule</a></li>
          <li><a href="result.php">Result</a></li>
          <li><a href="Exampolicies.php">Exam Policies</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bi bi-book"></i>
            <span class="link_name">Library</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Library</a></li>
          <li><a href="Catalogsearch.php">Catalog Search</a></li>
          <li><a href="BrowsingPolicies.php">Borrowing Policies</a></li>
          <li><a href="Bookrequests.php">Book Requests</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bi bi-credit-card"></i>
            <span class="link_name">Payments</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Payments</a></li>
          <li><a href="invoices.php">Invoices</a></li>
          <li><a href="receipts.php">Receipts</a></li>
          <li><a href="refunds.php">Refunds</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bi bi-person"></i>
            <span class="link_name">My Account</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">My Account</a></li>
          <li><a href="changepass.php">Change Password</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="main" style="top: 80px;height: max-content;padding-top: 20px;width: max-content;">
    <div style="display: flex;justify-content: center;"><h2>Delete Courses</h2></div>
    <div class="sub">
      <div style="display: flex;justify-content: end;margin-bottom: 15px;"><input style="height: 30px;width: max-content;" type="text" id="filter" placeholder="Filter by branch or credit"></div>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Credits</th>
            <th>Slot</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="registeredCoursesTableBody">
          <?php foreach ($registered_courses as $course) { ?>
            <tr>
              <td><?php echo $course['name']; ?></td>
              <td><?php echo $course['code']; ?></td>
              <td><?php echo $course['credits']; ?></td>
              <td><?php echo $course['slot']; ?></td>
              <td>
                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                  <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                  <button type="submit"style="height: 40px;width: 80px;border: none;background-color: #A5D7E8;border-radius: 10px;cursor: pointer;" name="delete_course">Delete</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
