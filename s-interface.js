
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


var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 5000);

// Example course data

$.ajax({
  type: "GET",
  url: "course_handling.php",
  success: function(data) {
    const courses = data;
    const tbody = document.getElementById('crs');
    for (const course of courses) {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${course.name}</td>
        <td>${course.code}</td>
        <td>${course.branch}</td>
        <td>${course.credit}</td>
      `;
      tbody.appendChild(tr);
    }
    const filterInput = document.getElementById('filter');
  filterInput.addEventListener('input', function() {
    const filterText = this.value.toLowerCase();
    const rows = tbody.querySelectorAll('tr');
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
  },
  error: function(jqXHR, textStatus, errorThrown) {
    console.log("Error: " + errorThrown);
  }
});




