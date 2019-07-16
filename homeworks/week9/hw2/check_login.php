<?php 
  require_once('./conn.php') 
?>

<?php
  if (isset($_COOKIE['username']) && !empty($_COOKIE['username'])) {
    $user = $_COOKIE['username'];
  } else {
    $user = null;
  }
?>
