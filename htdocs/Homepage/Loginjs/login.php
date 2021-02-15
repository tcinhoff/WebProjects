<!DOCTYPE = html>
<html>
<head>
    <title> Tc Login </title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="js.js">    </script>
</head>
    <body>
    <div class="login-box">
    <img src="avatar.png" class="avatar">

        <h1>Login Here</h1>
          <form action="../Blog/Blog.html" method="post" onsubmit="return login();">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" id="unId" required autofocus />
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" required />

      			<div class="g-recaptcha" data-sitekey="your_site_key"></div> <br/>
      			<input type="submit" name="submit" value="Login" />

            <a class="left" href="gehsterben.html">Forget Password</a>
            <a class="right" href="../../index.php">back</a>

          </form>


        </div>

    </body>
</html>
