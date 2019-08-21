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
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $nickname = $_POST['nickname'];

    $stmt = $conn->prepare("INSERT INTO wanwan418_users(username, password, nickname) VALUES (?,?,?)");
    $stmt->bind_param("sss", $username, $password, $nickname);
    $result = $stmt->execute();
    if($result) {
      setToken($conn, $username);
      printMsg('註冊成功！','./index.php');
    } else {
      echo "error:" . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    printMsg('請輸入帳號或密碼！','./register.php');
  }
}
?>