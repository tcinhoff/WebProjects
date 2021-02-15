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

          <form action="" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" id="unId" required autofocus />
            <p>E-Mail</p>
            <input type="text" name="email" placeholder="Enter E-Mail" id="mail" required />
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" required />

      			<div class="g-recaptcha" data-sitekey="your_site_key"></div> <br/>
      			<input type="submit" name="submit" value="Registration" />
			    </form>

          <a class="left" href="login.php">Login</a>
          <a class="right" href="../../index.php">back</a>

          <?php

          if(isset($_POST['submit'])){
           $fileContents = file_get_contents('user.txt');

           //Convert the JSON string back into an array.
           $user = json_decode($fileContents, true);

           $i = $user[0][0][0];
           $i++;
           $un = htmlspecialchars($_POST['username']);
           $pw = htmlspecialchars($_POST['password']);
           $mail = htmlspecialchars($_POST['email']);
           $user[$i][0][0] = $un;
           $user[$i][$i][0] = $pw;
           $user[$i][$i][$i] = $mail;
           $user[0][0][0] = $i;
           //Encode the array into a JSON string.
           $encodedString  = json_encode($user);


          //Save the JSON string to a text file.
          $cssdir = "user.txt";
          $cssfile = fopen($cssdir, "w+");
          fwrite($cssfile, $encodedString);
          fclose($cssfile);

          }
           ?>

        </div>

    </body>
</html>
