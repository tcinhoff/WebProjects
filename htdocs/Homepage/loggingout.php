<!DOCTYPE html>
<html>
    <title>
    </title>
    <head>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
          $_SESSION['logged'] = 0;
          $_SESSION['loggedout'] = 0;
          header('Location: '.$uri. '../index.php');
          die();
        } else {
          $_SESSION['loggedout'] = 1;
          header('Location: '.$uri. '../index.php');
          die();
        }
        ?>
    </body>
</html>
