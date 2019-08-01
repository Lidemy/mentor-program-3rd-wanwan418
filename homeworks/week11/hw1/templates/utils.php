<?php
function printMsg($msg, $redirect) {
  echo "<div class='msg'>" . $msg . "</div>";
  echo "<script>";
  echo "window.location ='" . $redirect . "'";
  echo "</script>";
}

function setToken($conn, $username) {
  $token = uniqid();
  $sql = "DELETE FROM wanwan418_certificates WHERE username='$username'";
  $conn->query($sql);
  
  $sql = "INSERT INTO wanwan418_certificates(username, token) VALUES ('$username','$token')";
  $conn->query($sql);
  setcookie("token", $token, time()+3600*24);
}

function getUserByToken($conn, $token) {
  if (isset($token) && !empty($token)) {
    $sql = "SELECT * FROM wanwan418_certificates WHERE token='$token'";
    $result = $conn->query($sql);
    if(!$result || $result->num_rows <= 0) {
      return null;
    }
    $row = $result->fetch_assoc();
    return $row['username'];
  } else {
    return null;
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
