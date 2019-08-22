<?
require_once('./check_login.php');
require_once('./conn.php');
require_once('templates/utils.php');

if (
  isset($_POST['id']) && !empty($_POST['id'])
    ) {
  
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM wanwan418_comments WHERE id = ? OR parent_id = ?");
    $stmt->bind_param("ss", $id, $id);
    $result = $stmt->execute();

    if($result) {
      header('Location: ./index.php');
    } else {
      printMsg($conn->error, './index.php');
    }
  } else {
    printMsg('錯誤','./index.php');
  }

?>