<?php
	$O = $_POST['password_o'];
	$N = $_POST['password_n'];
	$Cookie = $_POST['cookie'];
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM dinghaopu_user WHERE dinghaopu_user_cookie='" . $Cookie . "'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$Id = $row['dinghaopu_user_id'];
		if($row['dinghaopu_user_password'] == $O) {
			$sql = "UPDATE dinghaopu_user SET dinghaopu_user_password='" . $N . "' WHERE dinghaopu_user_id=" . $Id;
			if($conn->query($sql)) {
				echo '<script>alert("操作成功");window.location.href="../pages/user_self.html";</script>';
			}
			else {
				echo '<script>alert("操作失败");window.location.href="../pages/user_self.html";</script>';
			}
		}
		else {
			echo '<script>alert("操作失败");window.location.href="../pages/user_self.html";</script>';
		}
	}
	else {
		echo '<script>alert("操作失败");window.location.href="../pages/user_self.html";</script>';
	}
		
?>