<?
require_once('./check_login.php');
require_once('./conn.php');
require_once('templates/utils.php');

if (
  isset($_POST['id']) && !empty($_POST['id'])
    ) {
  
    $id = $_POST['id'];

    $sql = "DELETE FROM wanwan418_comments WHERE id = $id OR parent_id = $id";
    
    if($conn->query($sql)) {
      header('Location: ./index.php');
    } else {
      printMsg($conn->error, './index.php');
    }
  } else {
    printMsg('錯誤','./index.php');
  }

?>