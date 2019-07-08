<div class="commentMain">
  <div class="commentHeader">
    <div class="commentAuthor"><?php echo $row['nickname'] ?></div>
    <div class="commentTime"><?php echo $row['created_at'] ?></div> 
  </div>
  <div class="commentContent"><?php echo $row['content'] ?></div>

  <?php
    $parent_id = $row['id'];
    $sql_child = "SELECT wanwan418_comments.*, wanwan418_users.nickname FROM wanwan418_comments LEFT JOIN wanwan418_users ON wanwan418_users.id = wanwan418_comments.user_id WHERE parent_id = $parent_id ORDER BY created_at DESC"; 
  
    $result_child = $conn->query($sql_child);

    while($sub_comment = $result_child->fetch_assoc()) {
      require('template_subcomment.php');
    }
  ?>

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
</div>