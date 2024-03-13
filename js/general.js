// const submit = document.getElementById('submit');
// let cookieallowed = true;

// submit.addEventListener('click', function (event) {
//     const name = document.getElementById('name').value;
//     const message = document.getElementById('message').value;
//     if (name.length > 1 && getCookie('Username') === ""){
//         if (cookieallowed) {
//             document.cookie = `Username=${name} ; expires=${new Date(Date.now() + 12 * 24 * 60 * 60 * 1000)}; path=/`;
//             console.log("cookie set");
//         }
//         else {
//             event.preventDefault();
//             alert("Please allow cookies, to use this feature");
//         }
//     }
//     else if (getCookie('Username') !== "") {
//         event.preventDefault();
//         alert("You have already posted a message");
//     }

//     if (name === "" && message === "") {
//         alert("Please enter your name and message");
//         event.preventDefault();
//     }
//     else if (name === "") {
//         alert("Please enter your name");
//         event.preventDefault();
//     }
//     else if (message === "") {
//         alert("Please enter your message");
//         event.preventDefault();
//     }

// });
// let textboxref = document.querySelectorAll(".textbox")
// textboxref[textboxref.length - 1].style.backgroundColor = "rgb(255, 255, 255)";

// function getCookie(name) {
//     const cookies = document.cookie.split(';');
//     for (let i = 0; i < cookies.length; i++) {
//         const cookie = cookies[i].trim();
//         if (cookie.startsWith(name + '=')) {
//             return cookie.substring(name.length + 1);
//         }
//     }
//     return "";
// }

// function setcookieallowed(bool) {
//     cookieallowed = bool;
//     console.log(cookieallowed);
// }

// function setname() {
//     let nameref = document.getElementById('name');
//     nameref.value = getCookie('Username');
//     console.log(nameref.value);
// }

// document.getElementById("name").addEventListener("focus", function () {
//     document.getElementById("name").style.backgroundColor = "rgb(255, 255, 255)";
// })
// document.getElementById("name").addEventListener("blur", function () {
//     document.getElementById("name").style.backgroundColor = "rgb(164, 164, 164)";
// })
// document.getElementById("message").addEventListener("focus", function () {
//     document.getElementById("message").style.backgroundColor = "rgb(255, 255, 255)";
// })
// document.getElementById("message").addEventListener("blur", function () {
//     document.getElementById("message").style.backgroundColor = "rgb(164, 164, 164)";
// })


// console.log(cookieallowed)