<?php
	/* 接收数据 */
	$Cookie = $_POST["cookie"];
	$Province = $_POST['province'];
	$City = $_POST['city'];
	$District = $_POST['district'];
	
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
			$constans = file_get_contents("../region_dumps.json");
			$json = json_decode($constans, true);
			$temp = array();
			//选取到省
			for($i = 0; $i<count($json); $i++) {
				if($json[$i]['name'] == $Province) {
					$temp = $json[$i];
				}
			}
			//选取到市
			for($i = 0; $i<count($temp['cities']); $i++) {
				if($temp['cities'][$i]['name'] == $City) {
					$json = $temp['cities'][$i];//这里不能$temp = $temp['cities'][$i]; 因为$temp会进行类型转换，所以交替使用$temp和$json
				}
			}
			//选取到区
			$temp1 = array();
			for($i = 0; $i<count($json['counties']); $i++) {
				if($json['counties'][$i]['name'] == $District) {
					$temp1 = $json['counties'][$i];
				}
			}
			//获取商圈列表
			for($i = 0; $i<count($temp1['circles']); $i++) {
				array_push($data['result'],$temp1['circles'][$i]['name']);
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