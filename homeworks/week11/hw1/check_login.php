<?php 
  include_once('./conn.php');
  include_once('templates/utils.php');

$user = getUserByToken($conn, $_COOKIE['token']);
?>
