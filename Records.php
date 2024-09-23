<?php 
session_start();
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "students";
  $connection = new mysqli($host, $user, $password, $database);
  $username = $_SESSION['username'];
  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }
  $query = "SELECT * FROM registered_courses WHERE username = '$username'";
  $result = $connection->query($query);
  $registered_courses = array();
  while ($row = $result->fetch_assoc()) {
      $registered_courses[] = array(
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
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <title>Student Login</title>
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
       body{
        overflow: visible;
       }
     </style>
   </head>
<body>
<header class="top" style="z-index:40;">
    <a href="teacher-interface.php"><img id="unilogo" src="https://i.ibb.co/2YmpQkY/61f7f40eb8ebd50004c60b69.png" alt=""></a>
    <h1 id="header">Student Login</h1>
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
  <?php


// Connect to database
$username = $_SESSION['username'];
  
  // Connect to the database
  $pdo = new PDO('mysql:host=localhost;dbname=students', 'root', '');
  
  // Get the courses registered by the student
  $stmt = $pdo->prepare("SELECT course_code FROM registered_courses WHERE username = :username");
  $stmt->execute(['username' => $username]);
  $registered_courses = $stmt->fetchAll(PDO::FETCH_COLUMN);
  
  // Calculate attendance percentage for each course
  $attendance_percentages = [];
  foreach ($registered_courses as $course_code) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM attendance_records WHERE username = :username AND course_code = :course_code AND attendance_status = 'Present'");
    $stmt->execute(['username' => $username, 'course_code' => $course_code]);
    $present_count = $stmt->fetchColumn();
    
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM attendance_records WHERE username = :username AND course_code = :course_code");
    $stmt->execute(['username' => $username, 'course_code' => $course_code]);
    $total_count = $stmt->fetchColumn();
    
    if ($total_count > 0) {
      $attendance_percentages[$course_code] = round(($present_count / $total_count) * 100, 2);
    } else {
      $attendance_percentages[$course_code] = 0;
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="main"style="padding:10px; height:max-content;">
      <div><h1>Attendance</h1></div>
      <div class="sub" >
      <?php foreach ($attendance_percentages as $course_code => $attendance_percentage): ?>
        <h2><?php echo $course_code; ?></h2>
        <canvas id="<?php echo $course_code; ?>"></canvas>
        <script>
            var ctx = document.getElementById('<?php echo $course_code; ?>').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Attended', 'Missed'],
                    datasets: [{
                        label: 'Attendance Percentage',
                        data: [<?php echo $attendance_percentage; ?>, <?php echo 100 - $attendance_percentage; ?>],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        </script>
    <?php endforeach; ?>
      </div>
      
      
    </div>
</body>
<script src="s-interface.js"></script>
</html>
