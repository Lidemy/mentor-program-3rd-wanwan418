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
  <?php 
  $page = 1;
  if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = (int) $_GET['page'];
  }
  $size = 10;
  $start = $size * ($page -1);
  $sql = "SELECT c.id, c.content, c.created_at, c.username, u.nickname FROM wanwan418_comments as c LEFT JOIN wanwan418_users as u ON c.username = u.username
    WHERE c.parent_id = 0 
    ORDER BY c.id DESC
    LIMIT $start, $size";
  $result = $conn->query($sql); 
  ?>
  <div class="container">
    <div class="boardIntro">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</div>
    <?php
      if ($token) {
        echo "<h1>Hello," . $user . "</h1>";
      } else {
        echo "Please Login in or Register";
      }
    ?>
    <form action="./add_comment.php" method="post" class="form">
      <div class="commentTitle">歡迎說說話</div>
      <input type="hidden" value="0" name="parent_id">
      <textarea class="commentContent" placeholder="Message....." rows="8" cols="70" name="content"></textarea>
      <?php if($token) {
        echo "<input type='submit' value='大力按下去' class='buttonMain'>";
      } else {
        echo "<input type='button' value='請先註冊或登入' class='buttonMain'>";
      }
      ?>
    </form>
    <?php 
      $count_sql = "SELECT count(*) as count FROM wanwan418_comments WHERE parent_id = 0";
      $count_result = $conn->query($count_sql); 

      if ($count_result && $count_result->num_rows > 0) { //抓留言數
        $count = $count_result->fetch_assoc()['count'];
        $total_page = ceil($count / $size);
        echo "<div class='page'>";
        for ($i=1; $i<=$total_page; $i++) {
          echo "<a href='./index.php?page=$i'>$i</a>";
        }
        echo "</div>";
      }
    ?> 
    <div class="comments">
      <?php
        $sql = "SELECT c.id, c.content, c.created_at, c.username, u.nickname FROM wanwan418_comments as c LEFT JOIN wanwan418_users as u ON c.username = u.username
        WHERE c.parent_id = 0 ORDER BY c.id DESC";
        $result = $conn->query($sql);
        if($result) {
          while($row = $result->fetch_assoc()) {
          ?>
        <div class="comment"> 
          <div class="commentTime"><?php echo $row['created_at']?></div>
          <div class="commentUser"><?php echo $row['nickname']?> 說</div>
          <div class="commentMsg"><?php echo htmlspecialchars($row['content'],ENT_QUOTES, 'UTF-8')?></div>
           
            <?php 
            if ($user === $row['username']) {
              echo editBtn($row['id']);
              echo deleteBtn($row['id']);
            }
            ?>
          
          <div class="Subcomments">
          <?php
            $parent_id = $row['id'];
            $sql_sub = "SELECT c.id, c.content, c.created_at, c.username , u.nickname, u.username FROM wanwan418_comments as c LEFT JOIN wanwan418_users as u ON c.username = u.username
            WHERE c.parent_id = $parent_id ORDER BY c.id DESC";
            $result_sub = $conn->query($sql_sub);
            if($result_sub) {
              while($row_sub = $result_sub->fetch_assoc()) {
          ?> 
           
            <!-- <div class="Subcomment"> -->
            <?php
              if($row_sub['nickname'] === $row['nickname']) {
                echo "<div class='commentsParent'>";
              } else {
                echo "<div class='commentsChild'>";
              }
              echo "<div class='SubcommentTime'>" . $row_sub['created_at'] . "</div>";
              echo "<div class='SubcommentUser'>" . $row_sub['nickname'] . " 回覆" . "</div>";
              echo "<div class='SubcommentMsg'>" . htmlspecialchars($row_sub['content'],ENT_QUOTES, 'UTF-8') . "</div>";
              if ($user === $row_sub['username']) {
                echo editBtn($row_sub['id']);
                echo deleteBtn($row_sub['id']);
              }
              echo "</div>";


            ?>
  
            <!-- </div> -->
          <?php
              }
            }
          ?>
            <div class="replyMsg">
              <h3>新增留言</h3>
              <form action="./add_comment.php" method="post">
                <input type="hidden" value="<?php echo $parent_id; ?>" name="parent_id">
                <textarea placeholder="Message....." rows="8" cols="70" name="content"></textarea>
                <?php if($token) {
                  echo "<input type='submit' value='大力按下去' class='buttonMain'>";
                } else {
                  echo "<input type='button' value='請先註冊或登入' class='buttonMain'>";
                }
                ?>
              </form>
            </div>
          </div>
        </div>  
          <?php
          }
        }
        ?>
    </div>
  </div>



</body>
</html>