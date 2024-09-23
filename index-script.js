const username = document.getElementById("us");
const password = document.getElementById("pswd");
const loginform = document.getElementById("login-form");
const captchatxt = document.getElementById("captcha-txt");
const captchainp = document.getElementById("captcha-inp");
const mode = document.getElementById("cmode");
const body = document.body;
const defaultstyles = body.style.cssText;
const timage = document.getElementById("t-image");
const error = document.getElementById("err");
const errcpt = document.getElementById("errcpt");

(function() {
  const fonts = ["cursive", "sans-serif", "mono-space"];
  let captchavalue = "";

  function generatecaptcha() {
    let value = btoa(Math.random() * 1000000000);
    value = value.substr(0, 5 + Math.random() * 5);
    captchavalue = value;
  }

  function setCaptcha() {
    let html = captchavalue
      .split("")
      .map((char) => {
        const rotate = -20 + Math.trunc(Math.random() * 30);
        const font = Math.trunc(Math.random() * fonts.length);
        return `<span style = "transform:rotate(${rotate}deg);
            font-family:${fonts[font]}" >${char}</span>`;
      })
      .join("");
    document.querySelector(".captcha-preview").innerHTML = html;
  }

  function inintCaptcha() {
    const refreshBtn = document.querySelector(".captcha-refresh");
    refreshBtn.addEventListener("click", function(event) {
      event.preventDefault(); // prevent page refresh
      generatecaptcha();
      setCaptcha();
    });
    generatecaptcha();
    setCaptcha();
  }

  inintCaptcha();
})();

function valid(event) {
  event.preventDefault();
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "login_handling.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if (xhr.responseText === "success") {
          // Login success
          if (captchatxt.textContent === captchainp.value) {
            errcpt.innerHTML = "";
            if (username.value.startsWith("23uni")) {
              // Redirect to student interface
              window.location.href = "student-interface.php";
            } else {
              // Redirect to teacher interface
              window.location.href = "teacher-interface.php";
            }
          } else {
            errcpt.innerHTML = "Invalid Captcha";
          }
        } else {
          // Login failed
          error.innerHTML = "Invalid username or password";
        }
      } else {
        console.log("Error: " + xhr.status);
      }
    }
  };

  const data =
    "username=" + encodeURIComponent(username.value) +
    "&password=" + encodeURIComponent(password.value);
  xhr.send(data);
}


function changemode(){
    if(mode.textContent=="Light Mode"){
        mode.textContent = "Dark Mode"
        body.style.backgroundColor = "white"
        logdiv.style.border = "none"
        logdiv.style.boxShadow = "2px 8px 20px black"
        captchatxt.style.borderColor = "black"
        captchatxt.style.color = "black"
        timage.src = "https://www.linkpicture.com/q/pngegg_42.png"
        
    }else{
        mode.textContent = "Light Mode"
        body.style = defaultstyles
        logdiv.style.boxShadow = "2px 8px 20px white"
        captchatxt.style.borderColor = "white"
        captchatxt.style.color = "#F2F2F2"
        timage.src = "https://www.linkpicture.com/q/mPngtreemmoon_5646241_1.png"    
    }
}
