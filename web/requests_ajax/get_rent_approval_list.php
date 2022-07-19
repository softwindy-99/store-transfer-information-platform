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
	if(check_user_cookie($Cookie)) {
		//cookie有效
		if (check_user_permission($Cookie)) {
			//权限通过
			$data['status'] = 100;
			$data['describe'] = "请求成功，cookie有效，权限有效";
			$data['result'] = array();
			$sql = "SELECT * FROM dinghaopu_rent WHERE dinghaopu_rent_is_approval='未审核'";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$temp = array();
					$temp['rent_id'] = $row['dinghaopu_rent_id'];
					$temp['rent_title'] = $row['dinghaopu_rent_title'];
					$temp['rent_city'] = $row['dinghaopu_rent_city'];
					$temp['rent_district'] = $row['dinghaopu_rent_district'];
					$temp['rent_zone'] = $row['dinghaopu_rent_zone'];
					$temp['rent_name'] = $row['dinghaopu_rent_name'];
					$temp['rent_phone'] = $row['dinghaopu_rent_phone'];
					array_push($data['result'],$temp);
				}
			}
		}
		else {
			//权限不通过
			$data['status'] = 200;
			$data['describe'] = "失败，权限无效";
		}
		
	}
	else {
		//cookie无效
		$data['status'] = 200;
		$data['describe'] = "失败，cookie无效";
	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>