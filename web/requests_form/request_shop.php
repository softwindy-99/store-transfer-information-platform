<?php
	/* 接收数据 */
	//
	$Cookie = $_POST["cookie"];
	//基本信息
	$Id = $_POST['id'];//
	$Title = $_POST['title'];//
	$Province = $_POST['province'];//
	$City = $_POST['city'];//
	$District = $_POST['district'];//
	$Zone = $_POST['zone'];//
	$Address = $_POST['address'];//
	$Owner_name = $_POST['owner_name'];//
	$Owner_phone = $_POST['owner_phone'];//
	$Area = $_POST['area'];//
	$Type_0 = $_POST['type_0'];$Type_1 = $_POST['type_1'];
	$Industry = $Type_0 . "-" . $Type_1;if($Industry == null || $Industry == "")$Industry = "";
	$Status = $_POST['status'];if($Status == null || $Status == "")$Status = "";
	$Type = $_POST['type'];if($Type == null || $Type == "")$Type = "";
	$Width = $_POST['width'];if($Width == null || $Width == 0)$Width = 0;
	$Height = $_POST['height'];if($Height == null || $Height == 0)$Height = 0;
	$Depth = $_POST['depth'];if($Depth == null || $Depth == 0)$Depth = 0;
	$Min_floor = $_POST['min_floor'];if($Min_floor == null || $Min_floor == 0)$Min_floor = 0;
	$Max_floor = $_POST['max_floor'];if($Max_floor == null || $Max_floor == 0)$Max_floor = 0;
	$Is_street = $_POST['is_street'];if($Is_street == null || $Is_street == "")$Is_street = "";
	//价格信息
	$Monthly_rent = $_POST['monthly_rent'];//
	$Transfer_fee = $_POST['transfer_fee'];//
	$Method = $_POST['method'];if($Method == null || $Method == "")$Method = "";
	$Time_left = $_POST['time_left'];if($Time_left == null || $Time_left == 0)$Time_left = 0;
	//详细信息
	$Discrib = $_POST['discrib'];//
	$P0 = $_POST['p0'];$P1 = $_POST['p1'];$P2 = $_POST['p2'];$P3 = $_POST['p3'];$P4 = $_POST['p4'];$P5 = $_POST['p5'];$P6 = $_POST['p6'];$P7 = $_POST['p7'];
	$P8 = $_POST['p8'];$P9 = $_POST['p9'];$P10 = $_POST['p10'];$P11 = $_POST['p11'];$P12 = $_POST['p12'];$P13 = $_POST['p13'];$P14 = $_POST['p14'];$P15 = $_POST['p15'];
	$P16 = $_POST['p16'];$P17 = $_POST['p17'];$P18 = $_POST['p18'];$P19 = $_POST['p19'];$P20 = $_POST['p20'];
	$Supporting_facilities = $P0 . "-" . $P1 . "-" . $P2 . "-" . $P3 . "-" . $P4 . "-" . $P5 . "-" . $P6 . "-" . $P7 . "-" . $P8 . "-" . $P9 . "-" . $P10 . "-" . $P11 . "-" . $P12 . "-" . $P13 . "-" . $P14 . "-" . $P15;
	$Customer_population = $P16 . "-" . $P17 . "-" . $P18 . "-" . $P19 . "-" . $P20;
	//管理信息
	$Is_approval = $_POST['is_approval'];//
	$Is_advertise = $_POST['is_advertise'];//
	$Time_advertise = $_POST['time_advertise'];//is_advertise为"是"的情况为必填字段
	$Is_down = $_POST['is_down'];//
	$Time = $_POST['time'];//
	if($Is_advertise == "是" && ($Time_advertise == null || $Time_advertise == ""))$Time_advertise = "1970-01-01 00:00:00";

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
			$sql = "UPDATE dinghaopu_shop SET dinghaopu_shop_title='" . $Title . "'," . "dinghaopu_shop_address='" . $Address . "'," . "dinghaopu_shop_province='" . $Province . "'," . "dinghaopu_shop_city='" . $City . "'," . "dinghaopu_shop_district='" . $District . "'," . "dinghaopu_shop_zone='" . $Zone . "'," . "dinghaopu_shop_area=" . $Area . "," . "dinghaopu_shop_industry='" . $Industry . "'," . "dinghaopu_shop_owner_name='" . $Owner_name . "'," . "dinghaopu_shop_owner_phone='" . $Owner_phone . "'," . "dinghaopu_shop_monthly_rent=" . $Monthly_rent . "," . "dinghaopu_shop_transfer_fee=" . $Transfer_fee . "," . "dinghaopu_shop_time='" . $Time . "'," . "dinghaopu_shop_status='" . $Status . "'," . "dinghaopu_shop_type='" . $Type . "'," . "dinghaopu_shop_min_floor=" . $Min_floor . "," . "dinghaopu_shop_max_floor=" . $Max_floor . "," . "dinghaopu_shop_is_street='" . $Is_street . "'," . "dinghaopu_shop_width=" . $Width . "," . "dinghaopu_shop_height=" . $Height . "," . "dinghaopu_shop_depth=" . $Depth . "," . "dinghaopu_shop_method='" . $Method . "'," . "dinghaopu_shop_time_left=" . $Time_left . "," . "dinghaopu_shop_supporting_facilities='" . $Supporting_facilities . "'," . "dinghaopu_shop_is_advertise='" . $Is_advertise . "'," . "dinghaopu_shop_is_approval='" . $Is_approval . "'," . "dinghaopu_shop_is_down='" . $Is_down . "'," . "dinghaopu_shop_discrib='" . $Discrib . "'," . "dinghaopu_shop_time_advertise='" . $Time_advertise . "'," . "dinghaopu_shop_customer_population='" . $Customer_population . "' " . "WHERE dinghaopu_shop_id=" . $Id;
			if($conn->query($sql)) {
				echo '<script>alert("操作成功");window.location.href="../pages/shop_list.html";</script>';
			}
			else {
				echo '<script>alert("操作失败");window.location.href="../pages/shop_list.html";</script>';
			}
		}
		else {
			echo '<script>alert("操作失败");window.location.href="../pages/shop_list.html";</script>';
		}
	}
	else {
		echo '<script>alert("操作失败");window.location.href="../pages/shop_list.html";</script>';
	}
	
	$conn->close();
?>