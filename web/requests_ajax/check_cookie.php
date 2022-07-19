<?php
	/* 接收数据 */
	$Cookie = $_POST['cookie'];
	
	/* 变量 */
	$data = array();//待返回的数据
	
	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$Cookie = mysqli_real_escape_string($conn, $Cookie);
	$sql = "SELECT * FROM dinghaopu_user WHERE dinghaopu_user_cookie='" . $Cookie  . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$data['status'] = 100;
		$data['describe'] = "成功";
	}
	else {
		$data['status'] = 200;
		$data['describe'] = "失败";
	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>