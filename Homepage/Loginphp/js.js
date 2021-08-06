 // Variablen definieren
var username = [];
var passwort = [];
var mail = [];
var i = 0;
//Log In Funktion
function login() {
    var un = document.getElementById('unId').value;
    var pw = document.getElementById('pwId').value;
    var pwtest = false;
    for (var a = 0; a <= window.i; a++) {
      alert(window.username[a] + window.passwort[a]);
      if ((un == window.username[a]) && (pw == window.passwort[a])) {
		alert("twstedswf");
        pwtest = true;
      }
    }
    if (pwtest === true) {
      alert("Login successful");
      return true;

    } else {
    alert("Login failed, please try again");
    return false;
    }
  }

//Registration Funktion
function registration(){
    var newmail = document.getElementById('mail');
    var mailtest = false;

    //überprüfe, ob Mail schon vorhanden
    for (var a = 0; a < window.i; a++) {
      if (newmail == window.mail[a]) {
          mailtest = true;
      }
    }
      //lege neuen Benutzer an, wenn Mailtest erfolgteich
      if (mailtest === true) {
      alert("registration failed, mail-adress already used");
      return false;
    }
    else {
      window.username[window.i] = document.getElementById('unId').value;
      window.passwort[window.i] = document.getElementById('pwId').value;
      window.mail[window.i]     = document.getElementById('mail').value;
      alert(i+" name "+ window.username[window.i]+ " pw  "+window.passwort[window.i]);
      window.i ++;
      return true;
    }
}
