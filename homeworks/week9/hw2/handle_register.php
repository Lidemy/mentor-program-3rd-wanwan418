<?php
	include_once('conn.php');
	print_r($_POST);

	if (!empty($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nickname = $_POST['nickname'];
		
		$sql = "INSERT INTO wanwan418_users(username, password, nickname) VALUES ('$username', '$password', '$nickname')";
		$result = $conn->query($sql);

		if ($result) {
			$last_id = $conn->insert_id;
			setcookie("user_id", $last_id, time()*3600+24);
		}

		$conn->close();
		header('Location: index.php');
	}
?>