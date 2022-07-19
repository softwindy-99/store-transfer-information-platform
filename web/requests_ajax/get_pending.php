<?php
	/* 接收数据 */
	$Cookie = $_POST['cookie'];

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

	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$Cookie = mysqli_real_escape_string($conn, $Cookie);
	if(check_user_cookie($Cookie)) {
		$data['status'] = 100;
		$data['describe'] = "成功";
		//查询待审核的店铺数量
		$sql = 'SELECT COUNT(dinghaopu_shop_is_approval) FROM dinghaopu_shop WHERE dinghaopu_shop_is_approval = "未审核"';
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$data['shop_number'] = $row['COUNT(dinghaopu_shop_is_approval)'];
		}
		else {
			$data['shop_number'] = 0;
		}
		//查询待审核的求租数量
		$sql = 'SELECT COUNT(dinghaopu_rent_is_approval) FROM dinghaopu_rent WHERE dinghaopu_rent_is_approval = "未审核"';
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$data['rent_number'] = $row['COUNT(dinghaopu_rent_is_approval)'];
		}
		else {
			$data['rent_number'] = 0;
		}
	}
	else {
		$data['status'] = 200;
		$data['describe'] = "失败，无效的cookie";
	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>