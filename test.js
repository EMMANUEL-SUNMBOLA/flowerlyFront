function validateEmail(){
    let email = document.getElementById("email").value; // Get the value of the input
    let reg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (reg.test(email)) {
        email.classList.remove("err");
        email.classList.add("valid");
    } else {
        email.classList.remove("valid");
        email.classList.add("err");
    }
}
