<?php
	/* 接收数据 */
	$Cookie = $_POST["cookie"];
	$Is_approval = $_POST['is_approval'];
	$Id = $_POST['id'];
	$Title = $_POST['title'];
	$Province = $_POST['province'];
	$City = $_POST['city'];
	$District = $_POST['district'];
	$Zone = $_POST['zone'];
	$Min_monthly_rent = $_POST['min_monthly_rent'];
	$Max_monthly_rent = $_POST['max_monthly_rent'];
	$Min_area = $_POST['min_area'];
	$Max_area = $_POST['max_area'];
	$Name = $_POST['name'];
	$Phone = $_POST['phone'];
	$Other = $_POST['other'];
	$Is_advertise = $_POST['is_advertise'];
	$Time_advertise = $_POST['time_advertise'];
	$Time = $_POST['time'];
	$Is_down = $_POST['is_down'];
	$Type_0 = $_POST['type_0'];$Type_1 = $_POST['type_1'];
	$Industry = $Type_0 . "-" . $Type_1;//
	
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
	if(check_user_cookie($Cookie)) {
		if(check_user_permission($Cookie)) {
			$sql = "UPDATE dinghaopu_rent SET dinghaopu_rent_title='" . $Title . "'," . 
			"dinghaopu_rent_province='" . $Province . "'," . 
			"dinghaopu_rent_city='" . $City . "'," . 
			"dinghaopu_rent_district='" . $District . "'," . 
			"dinghaopu_rent_zone='" . $Zone . "'," . 
			"dinghaopu_rent_min_monthly_rent=" . $Min_monthly_rent . "," . 
			"dinghaopu_rent_max_monthly_rent=" . $Max_monthly_rent . "," . 
			"dinghaopu_rent_min_area=" . $Min_area . "," . 
			"dinghaopu_rent_max_area=" . $Max_area . "," . 
			"dinghaopu_rent_name='" . $Name . "'," . 
			"dinghaopu_rent_phone='" . $Phone . "'," . 
			"dinghaopu_rent_other='" . $Other . "'," . 
			"dinghaopu_rent_is_approval='" . $Is_approval . "'," . 
			"dinghaopu_rent_is_advertise='" . $Is_advertise . "'," . 
			"dinghaopu_rent_time_advertise='" . $Time_advertise . "'," . 
			"dinghaopu_rent_time='" . $Time . "'," . 
			"dinghaopu_rent_is_down='" . $Is_down . "'," . 
			"dinghaopu_rent_industry='" . $Industry . "' ".
			"WHERE dinghaopu_rent_id=" . $Id;
			if($conn->query($sql)) {
				echo '<script>alert("操作成功");window.location.href="../pages/rent_list.html";</script>';
			}
			else {
				echo '<script>alert("操作失败");window.location.href="../pages/rent_list.html";</script>';
			}
		}
		else {
			echo '<script>alert("操作失败");window.location.href="../pages/rent_list.html";</script>';
		}
	}
	else {
		echo '<script>alert("操作失败");window.location.href="../pages/shop_list.html";</script>';
	}
	$conn->close();
?>