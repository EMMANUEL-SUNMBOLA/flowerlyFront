const invalidName = () => {
    let nameInpt = document.getElementById("name");
    if (nameInpt.value.length < 5) {
        nameInpt.classList.add("err");
        nameInpt.classList.remove("cor"); // Remove 'cor' class
    } else {
        nameInpt.classList.remove("err"); // Remove 'err' class
        nameInpt.classList.add("cor");
    }
}

function validateFname() {
    const nameInput = document.getElementById("fname");
    const nameValue = nameInput.value.trim();
    if (nameValue.length <= 2) {
      nameInput.classList.add("invalid");
    } else {
      nameInput.classList.replace("invalid", "valid");
    }
  }
  function validateLname() {
    const nameInput = document.getElementById("lname");
    const nameValue = nameInput.value.trim();
    if (nameValue.length < 3) {
      nameInput.classList.add("invalid");
    } else {
      nameInput.classList.replace("invalid", "valid");
    }
  }
  
  function validateEmail(){
    let email = document.getElementById("email");
    let reg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
    if(reg.test(email)){
        email.classList.remove("err");
        email.classList.add("cor");
    }else{
        email.classList.remove("cor");
        email.classList.add("err");
    }
  }

  
  function validateEmail() {
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("emailError");
    const emailValue = emailInput.value.trim();
  
    if (!emailValue.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
      emailInput.classList.add("invalid");
    } else {
      emailError.textContent = "";
      emailInput.classList.replace("invalid", "valid");
    }
  }
  
  function validatePass(){
      const passInput = document.getElementById("passw");
      const passValue = passInput.value.trim();
  
      if(passValue.length < 8){
          passInput.classList.add("invalid");
      } else{
          passInput.classList.replace("invalid", "valid");
      }
  }

const darkSide = () =>{
    // alert("darkSide")
    let themeBut = document.getElementById("themeBut");
    let themeIcon = document.getElementById("themeIcon");
    let body = document.getElementById("body");
    themeIcon.classList.replace("fa-moon", "fa-sun");
    body.classList.add("dark");
    themeBut.setAttribute("onClick", 'lightSide()');
}

const lightSide = () =>{
    // alert("lightSide");
    let themeBut = document.getElementById("themeBut");
    let themeIcon = document.getElementById("themeIcon");
    let body = document.getElementById("body");
    themeIcon.classList.replace("fa-sun", "fa-moon");
    body.classList.remove("dark");
    themeBut.setAttribute("onClick", "darkSide()");
}