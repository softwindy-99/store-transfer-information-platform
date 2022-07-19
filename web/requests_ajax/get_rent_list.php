<?php
	/* 接收数据 */
	$Cookie = $_POST['cookie'];
	$Key = $_POST['key'];
	
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
	$Key = mysqli_real_escape_string($conn, $Key);
	if($Key != null) {
		//关键词搜索
		if(check_user_cookie($Cookie)) {
			//cookie有效
			if (check_user_permission($Cookie)) {
				//权限通过
				$data['status'] = 100;
				$data['describe'] = "成功";
				$data['result'] = array();
				//从标题、名字、商圈、行业搜索，只查询已审核并未完结的求租
				$sql = "SELECT * FROM dinghaopu_rent WHERE (dinghaopu_rent_title LIKE '%" . $Key ."%' OR dinghaopu_rent_name LIKE '%" . $Key . "%' OR dinghaopu_rent_zone LIKE '%" . $Key . "%' OR dinghaopu_rent_industry LIKE '%" . $Key . "%' OR dinghaopu_rent_city LIKE '%" . $Key . "%' OR dinghaopu_rent_phone LIKE '%" . $Key . "%') AND dinghaopu_rent_is_down='未完结' AND dinghaopu_rent_is_approval = '已审核'";
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
				$data['describe'] = "失败";
			}
			
		}
		else {
			//cookie无效
			$data['status'] = 200;
			$data['describe'] = "失败，cookie无效";
		}
	}
	else {
		//全部搜索
		if(check_user_cookie($Cookie)) {
			//cookie有效
			if (check_user_permission($Cookie)) {
				//权限通过
				$data['status'] = 100;
				$data['describe'] = "成功";
				$data['result'] = array();
				$sql = "SELECT * FROM dinghaopu_rent WHERE dinghaopu_rent_is_approval='已审核' AND dinghaopu_rent_is_down='未完结'";
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
				$data['describe'] = "失败";
			}
			
		}
		else {
			//cookie无效
			$data['status'] = 200;
			$data['describe'] = "请求失败，cookie无效";
		}
	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>