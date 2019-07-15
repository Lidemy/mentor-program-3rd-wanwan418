<?php
require_once('./conn.php');
require_once('templates/utils.php');

if (
  isset($_POST['username']) &&
  isset($_POST['password']) &&
  isset($_POST['nickname'])
  ) {
    if (
    !empty($_POST['username']) &&
    !empty($_POST['password']) &&
    !empty($_POST['nickname']) 
    ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nickname = $_POST['nickname'];

    $sql = "INSERT INTO wanwan418_users(username, password, nickname) VALUES ('$username','$password','$nickname')";
    if($conn->query($sql)) {
      setcookie("username", $username, time()+3600*24);
      printMsg('註冊成功！','./index.php');
    } else {
      echo "error:" . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    printMsg('請輸入帳號或密碼！','./register.php');
  }
}
?>