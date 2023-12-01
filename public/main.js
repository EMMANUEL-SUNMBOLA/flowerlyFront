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

  function themeToggle(elem){
    const themeIcon = document.getElementById("themeIcon");
    const body  = document.body
    if(themeIcon.classList.contains("fa-sun")){
      body.classList.replace("light", "dark");
      themeIcon.classList.replace("fa-sun", "fa-moon");
    }else{
      body.classList.replace("dark", "light");
      themeIcon.classList.replace("fa-moon", "fa-sun")
    }
  }
  const themeBut = document.getElementById("themeBut");
  themeBut.addEventListener("click", ()=>{themeToggle(themeBut)});
  
  function displayCart(event) {
    var cart = document.getElementById("shopcart");
    if (cart.style.display === "none" || cart.style.display === "") {
      cart.style.display = "block";
    } else {
      cart.style.display = "none";
    }
    event.preventDefault();
  }
  const shop = document.querySelector('#shop');
  shop.addEventListener("click", displayCart);

  function addToCart(product){
    $.ajax({
      type: 'POST',
      url: 'index.php',
      data: {cart: product},
      success: function(response) {
        alert(response + " added to cart");
      },
      error: function(error) {
          console.error('Error adding product to cart:', error);
      }
    });
  }

  
  function togglePassVisibility(input){
    if((input.getAttribute('type') === "text")){
      input.setAttribute("type", "password");
    }else{
      input.setAttribute("type", "text");
    }
  }

 document.addEventListener("click", (event) => {

  if (event.target.classList.contains('addBtn')) {
      let cont = event.target.closest('.product').cloneNode(true);
      document.querySelector(".cartcont").appendChild(cont);
  }
});
