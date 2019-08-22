<?
require_once('./check_login.php');
require_once('./conn.php');
require_once('templates/utils.php');

if (
  isset($_POST['content']) && !empty($_POST['content'])
    ) {
  
    $content = $_POST['content'];
    $parent_id = $_POST['parent_id'];

    $stmt = $conn->prepare("INSERT INTO wanwan418_comments(username, content, parent_id) VALUES (?,?,?)");
    $stmt->bind_param("sss",$username,$content,$parent_id);
    $result = $stmt->execute();

    if($result) {
      printMsg('新增成功！','./index.php');
    } else {
      printMsg($conn->error, './index.php');
    }
  } else {
    printMsg('請輸入內容！','./index.php');
  }

?>