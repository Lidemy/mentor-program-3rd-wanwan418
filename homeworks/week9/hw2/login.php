<?php require_once('./conn.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Board</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <?php require_once('templates/navbar.php')?>
  <div class="container">
    <form action="./handle_login.php" method="POST" class="form">
      <div class="title">Login In</div>
      username: <input type="text" name="username">
      password: <input type="password" name="password">
      <input type="submit" value="submit" class="button">
      <div class="msg">
      <?php require_once('./check_login.php'); ?>
      </div>
    </form>
  </div>

</body>
</html>