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

    $sql = "SELECT * FROM wanwan418_users WHERE username='$username'";
    
    $result = $conn->query($sql);
    if(!$result) {
      printMsg('$conn->error', './login.php');
      exit();
    }
    if($result->num_rows<=0) {
      printMsg('帳號或密碼錯誤','./login.php');
      exit();
    }

    $row = $result->fetch_assoc();
    $hash_password = $row['password'];

    if(password_verify($password, $hash_password)) {
      setToken($conn, $username);
      printMsg('登入成功！', './index.php');
    } else {
      printMsg('帳號或密碼錯誤','./login.php');
      exit();
    }
  } else {
    printMsg('請輸入帳號或密碼！','./login.php');
  }
}
?>