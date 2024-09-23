<?php

session_start();
$prof_username = $_SESSION['username'];
  $pdo = new PDO('mysql:host=localhost;dbname=students', 'root', '');
  $stmt = $pdo->prepare("
    SELECT tc.username AS prof_username, rc.username AS student_username, rc.course_code, rc.course_name, rc.course_credits, rc.course_slot
    FROM registered_courses rc
    JOIN teacher_courses tc ON (rc.course_code = tc.code1 AND rc.course_slot = tc.slot1) OR (rc.course_code = tc.code2 AND rc.course_slot = tc.slot2)
    WHERE tc.username = :prof_username
    ORDER BY tc.username;
  ");
  $stmt->execute(['prof_username' => $prof_username]);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
  // Start output buffering
  ob_start();

  // Check if the form was submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the current date
    $date = date('Y-m-d');

    // Get the professor username from the session variable
    $prof_username = $_SESSION['username'];

    // Get the course code from the results array
    $course_code = $results[0]['course_code'];

    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=students', 'root', '');

    // Loop through the attendance data and insert into the database
    foreach ($_POST['attendance'] as $username => $attendance_status) {
      $stmt = $pdo->prepare('INSERT INTO attendance_records (username, course_code, attendance_date, attendance_status, prof_username) VALUES (?, ?, ?, ?, ?)');
      $stmt->execute([$username, $course_code, $date, $attendance_status, $prof_username]);
    }

    // Increase the date by a day
    $date = date('Y-m-d', strtotime($date . ' +1 day'));

    // Redirect the user back to the form page
    header('Location: attendance_success.php');
    exit();
  }

  // If the form was not submitted, display the form
  // End output buffering and print the form
  ob_end_flush();
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <title>Teacher Login</title>
    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="index-styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gajraj One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans">
    <link rel="stylesheet" href="s-interface.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="profile.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <header class="top" style="z-index:40;">
    <a href="teacher-interface.php"><img id="unilogo" src="https://i.ibb.co/2YmpQkY/61f7f40eb8ebd50004c60b69.png" alt=""></a>
    <h1 id="header">Teacher Login</h1>
    <h1 id="header">UNI WEB</h1>
    <div class="logout" >
    <div class="sublgdiv1" onclick="toggleSubmenu('sublgdiv')">
      <span style="font-family: Josefin Sans;">Welcome</span>
      <div style="text-align: center;">
        <span style="font-family: Josefin Sans;"><?php echo $_SESSION['username'];?></span>
      </div>
    </div>
    <div class="sublgdiv" id="sublgdiv">
      <img src="user.png" alt="" class="userimg">
      <div><a href="logout.php"><button class="lgbutton" id="lgbutton">
        <i  class="bi bi-box-arrow-left"></i>
        Sign out
      </button></a></div>
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
          <li><a href="teacherprofile.php">Profile</a></li>
          <li><a href="tcredentials.php">Credentials</a></li>
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
          <li><a href="viewstudents.php">Registered students</a></li>
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
          <li><a href="tRecords.php">Give Attendance</a></li>
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
          <li><a href="Viewgrades.php">Upload Grades</a></li>
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
  <div class="main">
    <div class="sub">
      <form method="POST" style="display:flex;flex-direction:column;align-items:center;">
        <table>
          <thead>
            <tr>
              <th>Username</th>
              <th>Attendance</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($results as $student) { ?>
              <tr>
                <td><?php echo $student['student_username']; ?></td>
                <td>
                  <select name="attendance[<?php echo $student['student_username']; ?>]">
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                  </select>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <button type="submit" style="background-color:#A5D7E8;border:none;padding:10px;">Submit Attendance</button>
      </form>

    </div>
  </div>
</body>
<script src="s-interface.js"></script>
</html>
