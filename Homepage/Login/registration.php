<!DOCTYPE = html>
<html>
<head>
    <title> Tc Registration </title>
    <link rel="stylesheet" type="text/css" href="stylereg.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="js.js">    </script>
</head>
    <body>
    <div class="login-box">
    <img src="avatar.png" class="avatar">
        <h1>Registration Here</h1>

          <form action="login.php" method="post" onsubmit="return registration();">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" id="unId" required autofocus />
            <p>E-Mail</p>
            <input type="text" name="E-Mail" placeholder="Enter E-Mail" id="mail" required />
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" required />

      			<div class="g-recaptcha" data-sitekey="your_site_key"></div> <br/>
      			<input type="submit" name="submit" value="Registration" />

			    </form>


        </div>

    </body>
</html>
