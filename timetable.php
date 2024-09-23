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
      table {
        border-collapse: collapse;
      }
       td{
        text-align: center;
        border:none;
       }
       .timetbl {
      border-collapse: collapse;
    }

    .timetbl th, td {
      border: 1px solid black;
      padding: 8px;
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
    <div style="display: flex;justify-content: center;"><h2>Time Table</h2></div>
    <div class="sub">
      <div>
        Total credits Registered: <span style="color: red;" id="cr"></span>
      </div>
      <div style="display: none;justify-content: end;margin-bottom: 15px;"><input style="height: 30px;width: max-content;" type="text" id="filter" placeholder="Filter by branch or credit"></div>
        <div style="display: flex;flex-direction: column;justify-content: center;align-items: center;gap: 30px;">
          <div style="display: none;">
            <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th>Course Code</th>
                  <th>Credit</th>
                  <th>Slot</th>
                </tr>
              </thead>
              <tbody id="srs">
                <!-- Table rows will be generated dynamically with JavaScript -->
              </tbody>
            </table>
          </div>
          <div  style="background-color: #f2f2f2;padding: 10px;">
            <table class="timetbl">
              <tr>
                <th>Time</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
              </tr>
              <tr>
                <td>9-10</td>
                <td id="tue-slot-1"></td>
                <td id="wed-slot-1"></td>
                <td id="thu-slot-1"></td>
                <td id="fri-slot-1"></td>
                <td id="sat-slot-1"></td>
              </tr>
              <tr>
                <td>10-11</td>
                <td id="tue-slot-2"></td>
                <td id="wed-slot-2"></td>
                <td id="thu-slot-2"></td>
                <td id="fri-slot-2"></td>
                <td id="sat-slot-2"></td>
              </tr>
              <tr>
                <td>11-12</td>
                <td id="tue-slot-3"></td>
                <td id="wed-slot-3"></td>
                <td id="thu-slot-3"></td>
                <td id="fri-slot-3"></td>
                <td id="sat-slot-3"></td>
              </tr>
              <tr>
                <td>12-1</td>
                <td id="tue-slot-4"></td>
                <td id="wed-slot-4"></td>
                <td id="thu-slot-4"></td>
                <td id="fri-slot-4"></td>
                <td id="sat-slot-4"></td>
              </tr>
              <tr>
                <td>2-3</td>
                <td id="tue-slot-5"></td>
                <td id="wed-slot-5"></td>
                <td id="thu-slot-5"></td>
                <td id="fri-slot-5"></td>
                <td id="sat-slot-5"></td>
              </tr>
              <tr>
                <td>3-4</td>
                <td id="tue-slot-6"></td>
                <td id="wed-slot-6"></td>
                <td id="thu-slot-6"></td>
                <td id="fri-slot-6"></td>
                <td id="sat-slot-6"></td>
              </tr>
              <tr>
                <td>4-5</td>
                <td id="tue-slot-7"></td>
                <td id="wed-slot-7"></td>
                <td id="thu-slot-7"></td>
                <td id="fri-slot-7"></td>
                <td id="sat-slot-7"></td>
              </tr>
              <tr>
                <td>5-6</td>
                <td id="tue-slot-8"></td>
                <td id="wed-slot-8"></td>
                <td id="thu-slot-8"></td>
                <td id="fri-slot-8"></td>
                <td id="sat-slot-8"></td>
              </tr>
            </table>
          </div>
        </div>
    </div>
  </div>
</body>
<script>

const registeredCoursesTableBody = document.getElementById('srs');
    const registeredCourses = <?php echo json_encode($registered_courses); ?>;
    const registeredCredits = <?php echo $_registered_credits; ?>;

    // Function to update the registered courses table
    function updateRegisteredCoursesTable() {
      // Clear the existing table rows
      registeredCoursesTableBody.innerHTML = '';

      // Loop through the registered courses array and generate table rows
      for (const course of registeredCourses) {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${course.name}</td>
          <td>${course.code}</td>
          <td>${course.credits}</td>
          <td>${course.slot}</td>
        `;
        registeredCoursesTableBody.appendChild(tr);
      }
    }

    // Function to update the registered credits
    function updateRegisteredCredits() {
      const credits = document.getElementById('cr');
      credits.textContent = registeredCredits;
    }

    // Call the update functions
    updateRegisteredCoursesTable();
    updateRegisteredCredits();


function populateTimetable() {
  const days = ["tue", "wed", "thu", "fri", "sat"];
  const slots = {
    tue: ["A1", "B1", "C1", "D1", "A2", "B2", "C2", "D2"],
    wed: ["B1", "C1", "D1", "A1", "B2", "C2", "D2", "A2"],
    thu: ["C1", "D1", "A1", "B1", "C2", "D2", "A2", "B2"],
    fri: ["D1", "A1", "B1", "C1", "D2", "A2", "B2", "C2"],
    sat: ["A1", "B1", "C1", "D1", "A2", "B2","null","null"],
  };

  // Iterate over the days
  for (let dayIndex = 0; dayIndex < days.length; dayIndex++) {
    const day = days[dayIndex];
    const daySlots = slots[day];

    // Iterate over the slots
    for (let slotIndex = 0; slotIndex < daySlots.length; slotIndex++) {
      const slot = daySlots[slotIndex];
      const cellId = `${day}-slot-${slotIndex + 1}`;
      const cell = document.getElementById(cellId);

      // Check if there is a registered course for the current slot
      const matchingCourse = registeredCourses.find(
        (course) => course.slot === slot
      );

      // Assign course name or "Leisure" to the timetable grid cell
      if (matchingCourse) {
        cell.textContent = `${matchingCourse.name} (${slot})`;
        cell.style.backgroundColor = "#A5D7E8"
      } else {
        cell.textContent = "Leisure";
        cell.style.backgroundColor = "green"
      }
    }
  }
}

// Call the function to populate the timetable grid
populateTimetable();

</script>
</html>
