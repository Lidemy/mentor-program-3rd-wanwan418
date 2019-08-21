<?
require_once('./check_login.php');
require_once('./conn.php');
require_once('templates/utils.php');

if (
  isset($_POST['content']) && !empty($_POST['content'])
    ) {
  
    $content = $_POST['content'];
    $id = $_POST['id'];

    $sql = "UPDATE wanwan418_comments SET content='$content' WHERE id = $id ";
    
    if($conn->query($sql)) {
      printMsg('修改成功！','./index.php');
    } else {
      printMsg($conn->error,$_SERVER['HTTP_REFERER']);
    }
  } else {
    printMsg('請輸入內容！',$_SERVER['HTTP_REFERER']);
  }

?>