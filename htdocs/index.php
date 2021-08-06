<!DOCTYPE html>
<html>
    <head>
      <title> Tc's Homepage </title>
      <link type="text/css" rel="stylesheet" href="Homepage/index.css" />
	    <link href="https://fonts.googleapis.com/css?family=Gamja+Flower" rel="stylesheet">
    </head>
    <body>
      <?php
        session_start();
        if (!isset($_SESSION['tried'])) {
          $_SESSION['tried'] = 0;
          // code...
        }
        if (!isset($_SESSION['logged'])) {
          $_SESSION['logged'] = 0;
          // code...
        }
        if (!isset($_SESSION['loggedout'])) {
          $_SESSION['loggedout'] = 0;
          // code...
        }
        include('Homepage/headder.php');
      ?>

      <h1> Info Projekt </h1>

      <?php
        if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 0) && ($_SESSION['tried'] == 1)) {
          echo "<script> alert('Please Log in for using the Sandbox'); </script>";// code...
          $_SESSION['tried'] = 0;
          // code...
        }

        if (isset($_SESSION['loggedout']) && $_SESSION['loggedout'] == 1) {
          echo "<script> alert('Please Log in for Logging out'); </script>";// code...
        }

        include('Homepage/footer.php');
      ?>
    </body>
</html>
