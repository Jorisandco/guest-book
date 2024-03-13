

function changetext(x) {
    if (x.matches) { // If media query matches
      document.getElementById(text1).style.opacity = "1";
      document.getElementById(text2).style.opacity = "0";
    } else {
        document.getElementById(text1).style.opacity = "0";
        document.getElementById(text2).style.opacity = "1";
    }
  }
  

  var x = window.matchMedia("(max-width: 480px)")
  changetext(x) // Call listener function at run time
  x.addListener(changetext) // Attach listener function on state changes