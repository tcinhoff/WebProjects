<!DOCTYPE = html>
<html>
<head>
    <title> Tc Login </title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
    <body>
    <div class="login-box">
    <img src="avatar.png" class="avatar">

        <h1>Login Here</h1>
          <form action="" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" id="unId" required autofocus />
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" required />

      			<div class="g-recaptcha" data-sitekey="your_site_key"></div> <br/>
      			<input type="submit" name="submit" value="Login" />

            <a class="left" href="gehsterben.html">Forget Password</a>
            <a class="right" href="../../index.php">back</a>

          </form>

          <?php
          session_start();
          if (!isset($_SESSION['failed'])) {
            $_SESSION['failed'] = 0;
          }

          if ((isset($_SESSION['failed'])) && ($_SESSION['failed'] == 1) && ($_SESSION['logged'] == 0)) {
            echo "<script> alert('Login failed, Username or Password wrong'); </script>";// code...
            $_SESSION['failed'] = 0;
          }

          if(isset($_POST['submit'])){
           $fileContents = file_get_contents('user.txt');

           //Convert the JSON string back into an array.
           $user = json_decode($fileContents, true);

           $i = $user[0][0][0];
           $un = htmlspecialchars($_POST['username']);
           $pw = htmlspecialchars($_POST['password']);

           for ($a=1; $a <= $i; $a++) {
             if ($un == $user[$a][0][0] && $pw == $user[$a][$a][0]) {
               $_SESSION['logged'] = 1;
               break;
             } else {
               $_SESSION['logged'] = 0;
             }
           }

           if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
             header('Location: '.$uri.'../../index.php');
             die();
            }
             if (isset($_SESSION['logged']) && $_SESSION['logged'] == 0 ) {
               $_SESSION['failed'] = 1;
               header('Location: '.$uri);
               die();
             }

          }
          ?>

        </div>

    </body>
</html>
