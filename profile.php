<?php session_start()?>
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
   </head>
<body>
  <header class="top">
    <a href="student-interface.php"><img id="unilogo" src="https://i.ibb.co/2YmpQkY/61f7f40eb8ebd50004c60b69.png" alt=""></a>
    <h1 id="header">Student Login</h1>
    <h1 id="header" >UNI WEB</h1>
  </header>
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
  <div class="main">
    <div style="display: flex;justify-content: center;"><img class="userimg" src="user.png" alt=""></div>
    <div class="sub">
      <table>
        <tr>
          <td>Name:</td>
          <td><span><?php echo $_SESSION['name'];?></span></td>
        </tr>
        <tr>
          <td>DOB:</td>
          <td><span><?php echo $_SESSION['dob'];?></span></td>
        </tr>
        <tr>
          <td>Gender:</td>
          <td><span><?php echo $_SESSION['gender'];?></span></td>
        </tr>
        <tr>
          <td>Register number:</td>
          <td><span><?php echo $_SESSION['username'];?></span></td>
        </tr>
        <tr>
          <td>Program:</td>
          <td><span><?php echo $_SESSION['prog'];?></span></td>
        </tr>
        <tr>
          <td>Branch:</td>
          <td><span><?php echo $_SESSION['branch'];?></span></td>
        </tr>
      </table>
    </div>
  </div>
</body>
<script src="s-interface.js"></script>
</html>