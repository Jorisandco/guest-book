const submit = document.getElementById('submit');
let cookieallowed = true;
submit.addEventListener('click', function (event) {
    const name = document.getElementById('name').value;
    const message = document.getElementById('message').value;

    if (name.length > 1) {
        if (cookieallowed) {
            document.cookie = `Username=${name} ; expires=${new Date(Date.now() + 12 * 24 * 60 * 60 * 1000)}; path=/`;
        }
        else{
            event.preventDefault();
            alert("Please allow cookies to use this feature");
        }
    }

    if (name === "" && message === "") {
        alert("Please enter your name and message");
        event.preventDefault();
    }
    else if (name === "") {
        alert("Please enter your name");
        event.preventDefault();
    }
    else if (message === "") {
        alert("Please enter your message");
        event.preventDefault();
    }
});
let textboxref = document.querySelectorAll(".textbox")
textboxref[textboxref.length - 1].style.backgroundColor = "rgb(254, 187, 255)";

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

function setcookieallowed(bool){
    cookieallowed = bool;
    console.log(cookieallowed);
}

function setname(){
    let nameref = document.getElementById('name');
    nameref.value = getCookie('Username');
    console.log(nameref.value);
}

console.log(cookieallowed)