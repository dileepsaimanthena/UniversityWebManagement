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
    <title>Profile</title>
    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="index-styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gajraj One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans">
    <link rel="stylesheet" href="s-interface.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="profile.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      .modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 20% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 300px;
  text-align: center;
  border-radius: 15px;
}
.modal-content i{
  font-size: 40px;
  color: #A5D7E8;
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
  <div class="main" style="top: 80px;left: 40px; height: max-content;padding-top: 20px;width: max-content;">
    <div style="display: flex;justify-content: center;">
      <h2>Course Registration</h2>
      
    </div>
    <div class="sub">
      <div style="position: relative;left: 60px;width: 200px;background-color: #f2f2f2;padding: 10px;border-radius: 10px; ">
        <Span>Max Credits: <span style="color: red;">22</span></Span> <br> 
        <span>Registered Credits:</span> <span style="color: red;" id="regcredits"></span>
        <script>
          var registeredCreditsCell = document.getElementById('regcredits');

          registeredCreditsCell.textContent = <?php echo $_registered_credits; ?>
        </script>
      </div>
      <div style="display: flex;justify-content: end;margin-bottom: 15px;"><input style="height: 30px;width: max-content;" type="text" id="filter" placeholder="Filter by branch or credit"></div>
      <table>
        <thead>
          <tr>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Branch</th>
            <th>Credit</th>
            <th>Slot</th>
            <th>Select</th>
          </tr>
        </thead>
        <tbody id="rs">
          <!-- Table rows will be generated dynamically with JavaScript -->
        </tbody>
      </table>
    </div>
  </div>
  <div id="custom-modal" class="modal">
    <div class="modal-content">
      <p id="modal-message"></p>
      <i class="bi bi-exclamation-circle"></i>
    </div>
  </div>  
</body>
<script src="courses.js">
  
</script>
</html>
