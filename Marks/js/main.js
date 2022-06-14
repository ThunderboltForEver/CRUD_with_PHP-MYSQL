let selectUser = document.getElementById("studentSelectId");
let selectOption = selectUser.value;
let selectAll = document.querySelector("#studentSelectAllId");
let selectOptionAll = selectAll.value;
let btn = document.getElementById("btn");
let errorMessage = document.querySelector("span");
let successSelect = document.getElementById("studentSuccess");

btn.onclick = (e) => {
    if(selectOption === "n") {
        e.preventDefault();
        errorMessage.innerText = "Enter a valid option";
        errorMessage.style.color = "red";
    } 
    if(selectOption === "a") {
        if( selectOptionAll === "n") {
            e.preventDefault();
            errorMessage.innerText = "Enter a valid option";
            errorMessage.style.color = "red";
        }
    }
}
selectUser.onchange = () => {
    errorMessage.innerText = "";
    selectOption = selectUser.value;
    if( selectOption === "a") {
    selectAll.setAttribute("style","display:inline"); 
    } else {
    selectAll.setAttribute("style","display:none");
    }
}

selectAll.onchange = () => {
    errorMessage.innerText = "";
    selectOptionAll = selectAll.value;
    if( selectOptionAll === "n") {
        successSelect.setAttribute("style","display:none;");
    } else {
        successSelect.setAttribute("style","display:inline;");
    }
}
 