<?php
function printMsg($msg, $redirect) {
  echo "<div class='msg'>" . $msg . "</div>";
  echo "<script>";
  echo "window.location ='" . $redirect . "'";
  echo "</script>";
}
?>