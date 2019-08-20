<?php
  require_once('./check_login.php');
  require_once('templates/utils.php');
?>
<nav class='nav'>
  <ul class='navList navLeft'>
    <li class='navItem'><a href='./index.php'>Home</a></li>
  </ul>
  <ul class='navList navRight'>
    <li class='navItem'><a href='./register.php'>Register</a></li>
    <?php 
      if(!$user) {
        echo "<li class='navItem'>" . "<a href='./login.php'>" . "Login" . "</a>" . "</li>";
      } else {
        echo "<li class='navItem'>" . "<a href='./logout.php'>" . "Logout" . "</a>" . "</li>";
      }
    ?>
  </ul>    
</nav>