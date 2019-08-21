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

    $stmt = $conn->prepare("SELECT u.username, u.password FROM wanwan418_users as u LEFT JOIN wanwan418_certificates as c ON u.username = c.username WHERE u.username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    if(!$result) {
      printMsg('$conn->error', './login.php');
      exit();
    }
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        if(password_verify($password, $row['password'])) {
          setToken($conn, $username);
          printMsg('登入成功！', './index.php');
        } else {
          printMsg('帳號或密碼錯誤','./login.php');
          exit();
        }
      }
    } else {
      printMsg('帳號或密碼錯誤','./login.php');
      exit();
    }
  } else {
    printMsg('請輸入帳號或密碼！','./login.php');
  }
}
?>