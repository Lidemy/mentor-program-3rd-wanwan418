<?php

  require_once('./check_login.php');
  require_once('./conn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Board</title>
  <link rel="stylesheet" href="./style.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto+Mono|Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
  <?php include_once('templates/navbar.php')?>
  <div class="container">
    <div class="boardIntro">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</div>
    <?php
      if ($user) {
        echo "<h1>Hello," . $user . "</h1>";
      } else {
        echo "Please Login in or Register";
      }
    ?>
    <form action="./add_comment.php" method="post" class="form">
      <div class="commentTitle">歡迎說說話</div>
      <textarea class="commentContent" placeholder="在這裡輸入吧" rows="8" cols="70" name="content"></textarea>
      <?php if($user) {
        echo "<input type='submit' value='大力按下去' class='buttonMain'>";
      } else {
        echo "<input type='button' value='請先註冊或登入' class='buttonMain'>";
      }
      ?>
    </form>

    <div class="comments">
      <?php
        $sql = "SELECT c.content, c.created_at, u.nickname FROM wanwan418_comments as c LEFT JOIN wanwan418_users as u ON c.username = u.username
        ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if($result) {
          while($row = $result->fetch_assoc()) {
          ?>
        <div class="comment"> 
          <div class="commentTime"><?php echo $row['created_at']?></div>
          <div class="commentUser"><?php echo $row['nickname']?> 說</div>
          <div class="commentMsg"><?php echo $row['content']?></div>
        </div>  
          <?php
          }
        }
        ?>
    </div>
  </div>



</body>
</html>