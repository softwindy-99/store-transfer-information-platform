<?php
	/* 接收数据 */
	$Cookie = $_POST["cookie"];
	
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
			if($row['dinghaopu_user_permission'] == 100 || $row['dinghaopu_user_permission'] == 101 || $row['dinghaopu_user_permission'] == 200) {
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
	if(check_user_cookie($Cookie)) {
		//cookie有效
		if (check_user_permission($Cookie)) {
			//权限通过
			$data['status'] = 100;
			$data['describe'] = "成功";
			$data['result'] = array();
			array_push($data['result'], "不限");
			array_push($data['result'], "餐饮美食");
			array_push($data['result'], "美容美发");
			array_push($data['result'], "服饰鞋包");
			array_push($data['result'], "专柜转让");
			array_push($data['result'], "休闲娱乐");
			array_push($data['result'], "百货超市");
			array_push($data['result'], "生活服务");
			array_push($data['result'], "电器通讯");
			array_push($data['result'], "汽修美容");
			array_push($data['result'], "医疗器械");
			array_push($data['result'], "家居建材");
			array_push($data['result'], "教育培训");
			array_push($data['result'], "酒店宾馆");
			array_push($data['result'], "公司工厂");
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