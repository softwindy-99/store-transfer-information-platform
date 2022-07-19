<?php
	/* 接收数据 */
	$Cookie = $_POST['cookie'];

	/* 变量 */
	$data = array();//待返回的数据
	
	/* 方法 */
	//验证cookie的有效性
	function check_user_cookie($cookie) {
		require "../database.php";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT * FROM dinghaopu_user WHERE dinghaopu_user_cookie='" . $cookie . "'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$conn->close();
			return true;
		}
		else {
			$conn->close();
			return false;
		}
	}

	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$Cookie = mysqli_real_escape_string($conn, $Cookie);
	if(check_user_cookie($Cookie)) {
		//cookie有效
		$data['status'] = 100;
		$data['describe'] = "请求成功，cookie有效";
		//查询用户名
		$sql = "SELECT dinghaopu_user_permission FROM dinghaopu_user WHERE dinghaopu_user_cookie ='" . $Cookie . "'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$data['user_permission'] = $row['dinghaopu_user_permission'];
		}
		else {
			$data['status'] = 101;
			$data['describe'] = "请求失败，cookie有效，但数据库查询出现错误";
		}
	}
	else {
		//cookie无效
		$data['status'] = 200;
		$data['describe'] = "请求失败，cookie无效";
	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>