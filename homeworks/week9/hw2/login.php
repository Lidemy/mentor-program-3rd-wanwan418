<?php
  include_once('conn.php');

  $error_message = '';
  $blank_message = '';

  if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM wanwan418_users WHERE username = '$username' and password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      setcookie("user_id", $row['id'], time()+3600*24);
    } else {
      $error_message = '帳號或密碼錯誤，請重試';
    }
    $conn->close();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login in</title>
</head>
<body>
  <?php
   if($error_message !== '') {
    echo $error_message;
   }
  ?>

  <div class="loginTitle">Login in</div>
  <form method="post">
    username:<input type="text" name="username" id="username">;
    password:<input type="password" name="password" id="password">;
    <input type="submit" value="submit">
  </form>
</body>
</html>