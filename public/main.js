// const Vis = () => {
//     let visBut = document.getElementById("eye");
//     let inp = document.getElementById("pass");
//     inp.setAttribute('type', 'text');
//     visBut.setAttribute('onClick', 'inVis()');
// }

// const inVis = () =>{
//     let visBut = document.getElementById("eye");
//     let inp = document.getElementById("pass");
//     inp.setAttribute('type', 'password');
//     visBut.setAttribute('onClick', 'Vis()');
// }
// alert("js works");
const togglePasswordVisibility = () => {
    let inp = document.getElementById("pass");
    let eyeButton = document.querySelector(".eye");

    if (inp.getAttribute('type') === 'password') {
        inp.setAttribute('type', 'text');
        eyeButton.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    } else {
        inp.setAttribute('type', 'password');
        eyeButton.innerHTML = '<i class="fa-solid fa-eye"></i>';
    }
}

const invalidName = () => {
    let nameInpt = document.getElementById("name");
    let reg = /[0-9]/ig;
    if ((nameInpt.value.length < 5) || (reg.test(nameInpt.value) == true)) {
        nameInpt.classList.add("err");
        nameInpt.classList.remove("valid"); // Remove 'cor' class
    } else {
        nameInpt.classList.remove("err"); // Remove 'err' class
        nameInpt.classList.add("valid");
    }
}

    const invalidNum = () => {
        let phone = document.getElementById("num");
        let num = phone.value;
        let reg = /^(\+\d{1,3})?\d+$/ig;
        if((reg.test(num) == false)|| (num.length < 11)){
            phone.classList.remove("valid");
            phone.classList.add("err");
        }else{
            phone.classList.remove("err");
            phone.classList.add("valid");
        }
    }
  
  function validateEmail(){
    let email = document.getElementById("email");
    let reg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ig;
    if(reg.test(email.value)){
        email.classList.remove("err");
        email.classList.add("valid");
    }else{
        email.classList.remove("valid");
        email.classList.add("err");
    }
  }
  
  function validatePass(){
    let pass = document.getElementById("pass");
    let passVal = pass.value.trim();
    let passlen = passVal.length;
    let reg = /^(?=.*[a-zA-Z])(?=.*[0-9]).+$/ig;
    if((passlen < 6) || (reg.test(passVal) == false)){
        pass.classList.remove("valid");
        pass.classList.add("err");
    }else{
        pass.classList.remove("err");
        pass.classList.add("valid");
    }

  }

  const confirmPass = () => {
    let pass2 = document.getElementById("pass2")
    let pass = document.getElementById("pass")
    let pass2Val  = pass2.value.trim();
    let passVal = pass.value.trim();
    if(passVal !== pass2Val){
        pass2.classList.remove("valid");
        pass2.classList.add("err");
    }else{
        pass2.classList.remove("err");
        pass2.classList.add("valid");
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

function vis(){
    var but = document.getElementById("eye");
    var inp = document.getElementById("pass");
    inp.setAttribute('type','text');
    but.setAttribute('onclick', 'hide()')
  }
  
  function hide(){
    var but = document.getElementById("eye");
    var inp = document.getElementById("pass");
    inp.setAttribute('type','password');
    but.setAttribute('onclick', 'vis()');
  }

  function vis2(){
    var but = document.getElementById("eye2");
    var inp = document.getElementById("pass2");
    inp.setAttribute('type', 'text');
    but.setAttribute('onclick', 'hide2()')
  }
  
  function hide2(){
    var but = document.getElementById("eye2");
    var inp = document.getElementById("pass2");
    inp.setAttribute('type', 'password');
    but.setAttribute('onclick', 'vis2()');
  }

  function displayCart(event) {
    var cart = document.getElementById("shopcart");
    if (cart.style.display === "none" || cart.style.display === "") {
      cart.style.display = "block";
    } else {
      cart.style.display = "none";
    }
    event.preventDefault(); // Prevent the default link action
  }

  function addToCart(product){
    $.ajax({
      type: postMessage,
      url: index.php,
      data: {productId: product},
      success: function(response) {
        alert('Product added to cart!');
      },
      error: function(error) {
          console.error('Error adding product to cart:', error);
      }
    });
  }