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