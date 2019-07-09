<?php
  $is_login = false;
  $user_id = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>留言板</title>
</head>

<body>
  <div class="msgMain">
    <?php
    // 判斷使用者是否登入
      if(!$is_login) {
    ?>
      <a href="register.php">register</a>
      <a href="login.php">login in</a>
    <?php
      } else {
    ?>
      <a href="logout.php">logout</a>
    <?php 
      }
    ?>

    <div class="msgTitle">
      <h1>我很醜，溫柔的留言板</h1>
      <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>
    </div>
    <form action="add_comment" method="post" class="msgForm">
      <textarea name="msgContent" id="msgContent" cols="30" rows="10" placeholder="來留言"></textarea>
      <input type="hidden" name="parent_id" value="0" />
      <?php
        if($is_login) {
          echo "<input type='submit' class='msgBtn' value='submit' />";
        } else {
          echo "<input type='submit' class='msgBtn' value='login in' disabled />";
        }
      ?>
    </form>

    <?php
    // 顯示所有留言
      require_once('conn.php');
      $sql = "SELECT wanwan418_comments.id, wanwan418_comments.content, wanwan418_comments.created_at, wanwan418_users.nickname FROM wanwan418_comments LEFT JOIN wanwan418_users ON wanwan418_comments.user_id = wanwan418_users.id WHERE parent_id = 0 ORDER BY created_at DESC";
      $result = $conn->query($sql);

      if ($result) {
        while($row = $rseult->fetch_assoc()) {
          require('template_comment.php');
        }
      }
    ?>

  </div>

</body>

</html>