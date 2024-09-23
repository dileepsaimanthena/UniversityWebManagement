
function toggleSubmenu(id) {
  var submenu = document.getElementById(id);
  submenu.classList.toggle("active");
}
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});
var slideIndex = 0;
var timer = null;
  const filterInput = document.getElementById('filter');
  filterInput.addEventListener('input', function() {
    const filterText = this.value.toLowerCase();
    const rows = abc.querySelectorAll('tr');
    for (const row of rows) {
      const branch = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
      const credit = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
      if (branch.includes(filterText) || credit.includes(filterText)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }
  });
  
  $.ajax({
    type: "GET",
    url: "course_handling.php",
    success: function(data) {
      const courses = data;
      updateTable(courses, abc);
      window.onload = () => {
        const savedCourses = JSON.parse(localStorage.getItem('courses'));
        const savedRegisteredCourses = JSON.parse(localStorage.getItem('registeredCourses'));
        const savedRegisteredCredits = JSON.parse(localStorage.getItem('registeredCredits'));
  
        if (savedCourses && savedRegisteredCourses && savedRegisteredCredits) {
          courses = savedCourses;
          registeredCourses = savedRegisteredCourses;
          registeredCredits = savedRegisteredCredits;
          updateTable(courses, abc);
          updateRegisteredCoursesTable(registeredCourses);
          updateRegisteredCreditsTable(registeredCredits);
          updateTable(courses, abc);
        } else {
          $.ajax({
            type: "GET",
            url: "course_handling.php",
            success: function(data) {
              const courses = data;
              updateTable(courses, abc);
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log("Error: " + errorThrown);
            }
          });
        }
  

      };
  
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Error: " + errorThrown);
    }
  });
  
  const maxCredits = 22;
  let registeredCourses = [];
  let registeredCredits = 0;
  
  function saveData() {
    localStorage.setItem('courses', JSON.stringify(courses));
    localStorage.setItem('registeredCourses', JSON.stringify(registeredCourses));
    localStorage.setItem('registeredCredits', JSON.stringify(registeredCredits));
  }
  
  function showAlert(message) {
    const modal = document.getElementById("custom-modal");
    const modalMessage = document.getElementById("modal-message");
  
    modalMessage.textContent = message;
    modal.style.display = "block";
  
    function closeModal() {
      modal.style.display = "none";
      location.reload();
    }
  
    window.onclick = (event) => {
      if (event.target === modal) {
        closeModal();
        
      }
    };
  
    const closeBtn = document.querySelector(".close");
    closeBtn.addEventListener("click", closeModal);
  }
  
  function updateTable(courses, abc) {
    abc.innerHTML = '';
  
    for (const [index, course] of courses.entries()) {
      const tr = document.createElement('tr');
      const registerButtonId = `registerButton-${index}`;
      tr.innerHTML = `
        <td>${course.name}</td>
        <td>${course.code}</td>
        <td>${course.branch}</td>
        <td>${course.credit}</td>
        <td>
          <select style="height: 20px; width: 150px; border-radius:5px-;" name="slot">
            <option value="null">Select Slot</option>
            <option value="A1">A1</option>
            <option value="B1">B1</option>
            <option value="C1">C1</option>
            <option value="D1">D1</option>
            <option value="A2">A2</option>
            <option value="B2">B2</option>
            <option value="C2">C2</option>
            <option value="D2">D2</option>
          </select>
        </td>
        <td><input style="height: 20px;" type="radio" name="course" value="${index}"></td>
        <td><button id="${registerButtonId}" style="height: 40px;width: 80px;border: none;background-color: #A5D7E8;border-radius: 10px;cursor: pointer;">Register</button></td>
      `;
      abc.appendChild(tr);
      localStorage.setItem('registeredCredits', registeredCredits);
      const registerButton = document.getElementById(registerButtonId);
      registerButton.addEventListener('click', () => {
        if (!document.querySelector('input[name="course"]:checked')) {
          showAlert('Please select a course before registering.');
          return;
        }
        const selectedCourseIndex = document.querySelector('input[name="course"]:checked').value;
        const selectedCourse = courses[selectedCourseIndex];
        const selectedSlot = tr.querySelector('select[name="slot"]').value;
  
        if (selectedSlot === "null") {
          showAlert('Please select a slot before registering.');
          return;
        }
        registeredCredits = parseInt(localStorage.getItem('registeredCredits'));
        registeredCredits += selectedCourse.credit;
        localStorage.setItem('registeredCredits', registeredCredits);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'register.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            const response = xhr.responseText;
            showAlert(response);
            registeredCourses = JSON.parse(localStorage.getItem('registeredCourses'));
            registeredCourses = registered_courses;
            registeredCredits = 0;
            for (const course of registeredCourses) {
              registeredCredits += course.credit;
            }
            updateRegisteredCoursesTable(registeredCourses);
            updateRegisteredCreditsTable(registeredCredits);
            saveData();
            updateTable(courses, abc);
          }
        };
        xhr.send(`course_code=${selectedCourse.code}&slot=${selectedSlot}`);
      });
    }
  }
  const abc = document.getElementById("rs");  
