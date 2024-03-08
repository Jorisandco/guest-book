const submit = document.getElementById('submit');
submit.addEventListener('click', function (event) {
    const name = document.getElementById('name').value;
    const message = document.getElementById('message').value;

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
textboxref[textboxref.length - 1].style.backgroundColor = "yellow";

