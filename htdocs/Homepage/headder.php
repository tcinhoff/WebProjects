
      <div id="menu">
          <ul>
              <li class="topmenu">
                  <a href="Homepage/Loginjs/login.php"> js Login </a>
              </li>
              <li class="topmenu">
                  <a href="Homepage/Loginphp/login.php"> Login php </a>
                  <ul>
                      <li class="submenu"><a href="Homepage/Loginphp/registration.php"> Registration </a></li>
                      <li class="submenu"><a href="Homepage/Loginphp/login.php"> Login </a></li>
                  </ul>
              </li>
              <li class="topmenu">
                  <a href="Homepage/Blog/Blog.html"> Blog </a>
              </li>
              <li class="topmenu">
                  <a href="Homepage/Sandbox/Sandbox.php"> Sandbox </a>
              </li>
              <li class="topmenu">
                  <a> Spiele </a>
                  <ul>
                      <li class="submenu"><a href="Homepage/Games/TicTacToejs.php"> TicTacToe </a></li>
                      <li class="submenu"><a> weiteres </a></li>
                  </ul>
              </li>
          </ul>
      </div>

    <div id="logged">
      <?php
      if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
        echo "logged in</br>";// code...
        echo "<a href='Homepage/loggingout.php'>loging off</a>";
      } else {
        echo "logged out</br>";// code...
      }


       ?>
    </div>
