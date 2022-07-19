<?php
	$Name = $_POST['name'];
	$Password = $_POST['password'];
	$Permission = $_POST['permission'];
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO dinghaopu_user (dinghaopu_user_name, dinghaopu_user_password, dinghaopu_user_permission) VALUES ('" . $Name . "'," . "'" . $Password . "'," . $Permission . ")";
	if($conn->query($sql)) {
		echo '<script>alert("操作成功");window.location.href="../pages/user_list.html";</script>';
	}
	else {
		echo '<script>alert("操作失败");window.location.href="../pages/user_list.html";</script>';
	}
?>