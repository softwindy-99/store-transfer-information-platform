<?php
	/* 接收数据 */
	$Cookie = $_POST["cookie"];
	$Id = $_POST["id"];
	
	/* 变量 */
	$data = array();//待返回的数据
	
	/* 方法 */
	//检查cookie的有效性
	function check_user_cookie($cookie) {
		require "../database.php";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT * FROM dinghaopu_user WHERE dinghaopu_user_cookie='" . $cookie . "'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	//检查权限
	function check_user_permission($cookie) {
		require "../database.php";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT * FROM dinghaopu_user WHERE dinghaopu_user_cookie='" . $cookie . "'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if($row['dinghaopu_user_permission'] == 100 || $row['dinghaopu_user_permission'] == 101) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$Cookie = mysqli_real_escape_string($conn, $Cookie);
	$Id = mysqli_real_escape_string($conn, $Id);
	if(check_user_cookie($Cookie)) {
		//cookie有效
		if (check_user_permission($Cookie)) {
			//权限通过
			$sql = "UPDATE dinghaopu_rent SET dinghaopu_rent_is_approval = '已审核' WHERE dinghaopu_rent_id=" . $Id;
			if($conn->query($sql)) {
				$data['status'] = 100;
				$data['describe'] = "成功";
			}
			else {
				$data['status'] = 200;
				$data['describe'] = "失败，无此ID";
			}
		}
		else {
			//权限不通过
			$data['status'] = 200;
			$data['describe'] = "失败，权限不足";
		}
		
	}
	else {
		//cookie无效
		$data['status'] = 200;
		$data['describe'] = "失败，无效的cookie";
	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>