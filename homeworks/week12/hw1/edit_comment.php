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
    <form action="./handle_edit_comment.php" method="post" class="form">
      <div class="commentTitle">編輯留言</div>
      <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
      <textarea class="commentContent" placeholder="在這裡輸入吧" rows="8" cols="70" name="content"></textarea>
      <?php if($user) {
        echo "<input type='submit' value='大力按下去' class='buttonMain'>";
      } else {
        echo "<input type='button' value='請先註冊或登入' class='buttonMain'>";
      }
      ?>
    </form>

  </div>



</body>
</html>