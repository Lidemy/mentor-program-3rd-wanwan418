<?php
require_once('./conn.php');
require_once('templates/utils.php');

if (
  isset($_POST['username']) &&
  isset($_POST['password']) 
  ) {
    if (
    !empty($_POST['username']) &&
    !empty($_POST['password'])  
    ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM wanwan418_users WHERE username='$username' AND password ='$password'";
    $result = $conn->query($sql);
    
    if(!$result) {
      printMsg('$conn->error', './login.php');
      exit();
    }
    if($result->num_rows>0) {
      setcookie("username", $username, time()+3600*24);
      printMsg('登入成功！', './index.php');
    } else {
      printMsg('帳號或密碼錯誤', './login.php');
    }
  } else {
    printMsg('請輸入帳號或密碼！','./login.php');
  }
}
?>