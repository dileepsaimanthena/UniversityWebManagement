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
<body style="overflow: visible;">
  <header class="top" style="z-index: 3;">
    <a href="student-interface.php"><img id="unilogo" src="https://i.ibb.co/2YmpQkY/61f7f40eb8ebd50004c60b69.png" alt=""></a>
    <h1 id="header">Student Login</h1>
    <h1 id="header" >UNI WEB</h1>
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
  <div class="main" style="height: max-content;width: max-content;">
    <div style="display: flex;justify-content: center;"><h2>Catalog Search</h2></div>
    <div class="sub">
      <div style="display: flex;justify-content: space-between;align-items: center;margin-bottom: 20px;">
        <div>
          <label for="search-input">Search books:</label>
          <input style="height: 30px;" type="text" id="search-input" placeholder="Enter keywords...">
          <button style="background-color:  #A5D7E8; border: none;padding: 10px;border-radius: 5px;" id="search-btn">Search</button>
        </div>
        <div>
          <label for="filter-select">Filter by genre:</label>
          <select id="filter-select">
            <option value="">All genres</option>
            <option value="Classic">Classic</option>
            <option value="Science Fiction">Science Fiction</option>
            <option value="Fantasy">Fantasy</option>
          </select>
        </div>
      </div>
      <table >
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Published</th>
          </tr>
        </thead>
        <tbody id="book-table">
          <!-- Books will be dynamically added here with JavaScript -->
        </tbody>
      </table>      
    </div>
  </div>
</body>
<script>
  let books = [
  { title: 'The Great Gatsby', author: 'F. Scott Fitzgerald', genre: 'Classic', published: 1925 },
  { title: 'To Kill a Mockingbird', author: 'Harper Lee', genre: 'Classic', published: 1960 },
  { title: '1984', author: 'George Orwell', genre: 'Science Fiction', published: 1949 },
  { title: 'The Hitchhiker\'s Guide to the Galaxy', author: 'Douglas Adams', genre: 'Science Fiction', published: 1979 },
  { title: 'Harry Potter and the Sorcerer\'s Stone', author: 'J.K. Rowling', genre: 'Fantasy', published: 1997 },
  { title: 'The Lord of the Rings', author: 'J.R.R. Tolkien', genre: 'Fantasy', published: 1954 },
  { title: 'Pride and Prejudice', author: 'Jane Austen', genre: 'Classic', published: 1813 },
  { title: 'The Catcher in the Rye', author: 'J.D. Salinger', genre: 'Classic', published: 1951 },
  { title: 'Wuthering Heights', author: 'Emily Bronte', genre: 'Classic', published: 1847 },
  { title: 'The Picture of Dorian Gray', author: 'Oscar Wilde', genre: 'Classic', published: 1890 },
  { title: 'Brave New World', author: 'Aldous Huxley', genre: 'Science Fiction', published: 1932 },
  { title: 'Frankenstein', author: 'Mary Shelley', genre: 'Science Fiction', published: 1818 },
  { title: 'The Hunger Games', author: 'Suzanne Collins', genre: 'Science Fiction', published: 2008 },
  { title: 'Ender\'s Game', author: 'Orson Scott Card', genre: 'Science Fiction', published: 1985 },
  { title: 'The Girl with the Dragon Tattoo', author: 'Stieg Larsson', genre: 'Mystery', published: 2005 },
  { title: 'The Da Vinci Code', author: 'Dan Brown', genre: 'Mystery', published: 2003 },
  { title: 'Gone Girl', author: 'Gillian Flynn', genre: 'Mystery', published: 2012 },
  { title: 'The Maltese Falcon', author: 'Dashiell Hammett', genre: 'Mystery', published: 1930 },
  { title: 'The Bourne Identity', author: 'Robert Ludlum', genre: 'Thriller', published: 1980 },
  { title: 'Jurassic Park', author: 'Michael Crichton', genre: 'Thriller', published: 1990 },
  { title: 'The Silence of the Lambs', author: 'Thomas Harris', genre: 'Thriller', published: 1988 },
  { title: 'Misery', author: 'Stephen King', genre: 'Thriller', published: 1987 },
  { title: 'The Name of the Wind', author: 'Patrick Rothfuss', genre: 'Fantasy', published: 2007 },
  { title: 'A Song of Ice and Fire', author: 'George R.R. Martin', genre: 'Fantasy', published: 1996 }
];

  const tbody = document.getElementById('book-table');

for (const book of books) {
  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td>${book.title}</td>
    <td>${book.author}</td>
    <td>${book.genre}</td>
    <td>${book.published}</td>
  `;
  tbody.appendChild(tr);
}
const filterSelect = document.getElementById('filter-select');
filterSelect.addEventListener('change', function() {
  const filterValue = this.value.toLowerCase();
  const rows = tbody.querySelectorAll('tr');
  for (const row of rows) {
    const genre = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
    if (genre === filterValue || filterValue === '') {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  }
});
const searchBtn = document.getElementById('search-btn');
searchBtn.addEventListener('click', function() {
  const searchInput = document.getElementById('search-input');
  const searchValue = searchInput.value.toLowerCase();
  const rows = tbody.querySelectorAll('tr');
  for (const row of rows) {
    const title = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
    const author = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
    const genre = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
    const published = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
    if (title.includes(searchValue) || author.includes(searchValue) || genre.includes(searchValue) || published.includes(searchValue)) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  }
});
function toggleSubmenu(id) {
    var submenu = document.getElementById(id);
    submenu.classList.toggle("active");
}
</script>
</html>
