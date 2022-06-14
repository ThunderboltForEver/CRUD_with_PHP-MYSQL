let textInput = document.querySelector("input[type='text']");
let passInput = document.querySelector(".inputPass");
let btn = document.getElementById("loginbtn");
let textValue ;
let passValue ;
let i ;
let showDivide = document.querySelector(".divide");

window.onload = () => {
btn.onclick = function (e) {
    textValue = textInput.value;
    passValue = passInput.value;
    
    if(!(textValue === "admin" && passValue === "admin")) {
       
        textInput.style.cssText = "border-bottom:1px solid #F00;";
        passInput.style.cssText = "border-bottom:1px solid #F00;";
        e.preventDefault();
    
    } 
}  } 
textInput.onfocus = function () {
    textInput.style.cssText = "border-bottom:1px solid rgba(12, 128, 163, 0.800);";
}
passInput.onfocus = function () {
    passInput.style.cssText = "border-bottom:1px solid rgba(12, 128, 163, 0.800);";
}
function toggle() {
    
    if( i !== 0) {
        showDivide.style.display = "none"; 
        i = 0;
        passInput.setAttribute("type","password");
    } else {
    
    showDivide.style.display = "block";
    passInput.setAttribute("type","text");
    i++;
    }
}
