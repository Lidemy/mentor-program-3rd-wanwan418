<?php
require_once('./conn.php');
require_once('templates/utils.php');

if (
  isset($_POST['content']) && !empty($_POST['content'])
    ) {
    $username = $_COOKIE['username'];
    $content = $_POST['content'];
    $sql = "INSERT INTO wanwan418_comments(username ,content) VALUES ('$username','$content')";;
    
    if($conn->query($sql)) {
      printMsg('新增成功！','./index.php');
    } else {
      printMsg($conn->error, './index.php');
    }
  } else {
    printMsg('請輸入內容！','./index.php');
  }

?>