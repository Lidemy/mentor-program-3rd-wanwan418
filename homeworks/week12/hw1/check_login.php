<?php 

require_once('./conn.php');
require_once('templates/utils.php');

if(isset($_COOKIE['token'])){
  $token = $_COOKIE['token'];
  $user = getUserByToken($conn, $_COOKIE['token']);
} else {
  $token = null;
  $user = null;
}
?>
