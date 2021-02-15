<!DOCTYPE html>
<html>
    <title>
    </title>
    <head>
    <link type="text/css" rel="stylesheet" href="Sandbox.css" />
    </head>
    <body>
      <?php
      session_start();
      if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
        if (!isset($_SESSION['$data2'])) {
          $_SESSION['$data2'] = "";
          $_SESSION['$css'] = "";// code...
        }
        $html = $_SESSION['$data2'];
        $css2 = $_SESSION['$css'];
        echo "
         <a href='../../index.php'> back </a>  </br>
        <form action='' method='post'>

          HTML:
          <textarea name='text' placeholder='hier html oder php code eingeben' required>$html</textarea>
          CSS:
          <textarea name='style' placeholder='hier css code eingeben'>$css2</textarea>
          <input type='submit' value='RUN' class='submit' name='uploadsubmit' />

        </form>
          ";
          if(isset($_POST['uploadsubmit'])){

            $_SESSION['$css'] = $_POST['style'];
            $cssdir = "user/file.css";
            $cssfile = fopen($cssdir, "w+");
            fwrite($cssfile, $_SESSION['$css']);
            fclose($cssfile);

            $data1 = "
  <!DOCTYPE html>
  <html>
    <title>
    </title>
      <link type='text/css' rel='stylesheet' href='file.css' />
    <head>
      <a href='../Sandbox.php'> back </a>  </br>
    </head>
    <body>
    ";
            $_SESSION['$data2'] = $_POST['text'];
            $data3 = "
    </body>
  </html>";
            $mydir = "user/file.php";
            $myfile = fopen($mydir, "w+");
            fwrite($myfile, $data1);
            fwrite($myfile, $_SESSION['$data2']);
            fwrite($myfile, $data3);
            fclose($myfile);
            header('Location: '.$uri.'/Homepage/Sandbox/' .$mydir);
            die();
          }
      } else {
        $_SESSION['tried'] = 1;
        header('Location: '.$uri. '../../index.php');
        die();
      }


        ?>
    </body>
</html>
