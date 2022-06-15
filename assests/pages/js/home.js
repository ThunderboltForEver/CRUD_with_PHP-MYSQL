let getBarsIcon = document.querySelector(".bars");
let getNav = document.querySelector("nav");
let counter = 0 ;
function toggle() {
    if( counter === 0){
        getNav.setAttribute("style","display:flex");
        counter++;
    } else {
        getNav.setAttribute("style","display:none");
        counter=0;
    }
    
}

