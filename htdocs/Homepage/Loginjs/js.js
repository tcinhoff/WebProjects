
//Log In Funktion
function login() {
    var un = document.getElementById('unId').value;
    var pw = document.getElementById('pwId').value;
    var pwtest = false;
      if ((un == "admin") && (pw == "admin")) {
        pwtest = true;
      }
    if (pwtest === true) {
      alert("Login successful");
      return true;

    } else {
    alert("Login failed, please try again");
    return false;
    }
  }
