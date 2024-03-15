const submit = document.getElementById('submit');
let cookieallowed = false;

submit.addEventListener('click', function (event) {
    const name = document.getElementById('name').value;
    const message = document.getElementById('message').value;
    let number = 0;
    const namelimit = 256;
    const messagelimit = 1001;
     if(name.length > namelimit || message.length > messagelimit){
         event.preventDefault();
         alert("Name and/or message too long");
         document.getElementById('name').value = "";
         document.getElementById('message').value = "";
         number = 1;
     }
    else if (name === "" && message === "" && number === 0) {
        alert("Please enter your name and message");
        event.preventDefault();
    }
    else if (name === "" && number === 0) {
        alert("Please enter your name");
        event.preventDefault();
    }
    else if (message === "" && number === 0) {
        alert("Please enter your message");
        event.preventDefault();
    }
});

let textboxref = document.querySelectorAll(".textbox")
textboxref[textboxref.length - 1].style.backgroundColor = "rgb(255, 255, 255)";

function getCookie(name) {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.startsWith(name + '=')) {
            return cookie.substring(name.length + 1);
        }
    }
    return "";
}

function setname() {
    let nameref = document.getElementById('name');
    nameref.value = getCookie('Username');
    console.log(nameref.value);
}

document.getElementById("name").addEventListener("focus", function () {
    document.getElementById("name").style.backgroundColor = "rgb(255, 255, 255)";
})
document.getElementById("name").addEventListener("blur", function () {
    document.getElementById("name").style.backgroundColor = "rgb(164, 164, 164)";
})
document.getElementById("message").addEventListener("focus", function () {
    document.getElementById("message").style.backgroundColor = "rgb(255, 255, 255)";
})
document.getElementById("message").addEventListener("blur", function () {
    document.getElementById("message").style.backgroundColor = "rgb(164, 164, 164)";
})