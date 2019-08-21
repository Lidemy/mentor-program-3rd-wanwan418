<?php
function printMsg($msg, $redirect) {
  echo "<div class='msg'>" . $msg . "</div>";
  echo "<script>";
  echo "window.location ='" . $redirect . "'";
  echo "</script>";
}

function setToken($conn, $username) {
  $token = uniqid();
  $stmt_delete = $conn->prepare("DELETE FROM wanwan418_certificates WHERE username=?") ;
  $stmt_delete->bind_param("s",$username);
  $stmt_delete->execute();
  $stmt_insert = $conn->prepare("INSERT INTO wanwan418_certificates(username, token) VALUES (?,?)");
  $stmt_insert->bind_param("ss", $username, $token);
	$stmt_insert->execute();
  setcookie("token", $token, time()+3600*24);
}

function getUserByToken($conn, $token) {
  if (isset($token) && !empty($token)) {
    $stmt = $conn->prepare("SELECT username FROM wanwan418_certificates WHERE token=?");
    $stmt->bind_param("s",$token);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row['username'];  
    } else {
      return null;
    }
  } else {
    $token = null;
  }
}

function deleteBtn($id) {
  return "
  <div class='deleteComment'>
    <form method='POST' action='delete_comment.php'>
      <input type='hidden' name='id' value='$id'>
      <input type='submit' value='刪除'>
    </form>
  </div>
  ";
}

function editBtn($id) {
  return "
  <div class='editComment'>
    <form method='GET' action='edit_comment.php'>
      <input type='hidden' name='id' value='$id'>
      <input type='submit' value='編輯'>
    </form>
  </div>
  ";
}
?>
