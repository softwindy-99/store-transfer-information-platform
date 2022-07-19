<?php
	/* 接收数据 */
	$Id = $_GET['id'];
	/* 变量 */
	$data = array();//待返回的数据
	
	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$sql = "SELECT * FROM dinghaopu_shop WHERE dinghaopu_shop_id=" . $Id;
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$data['status'] = 100;
		$data['describe'] = "请求成功";
		$row = $result->fetch_assoc();
		$temp['shop_id'] = $row['dinghaopu_shop_id'];
		$temp['shop_title'] = $row['dinghaopu_shop_title'];
		$temp['shop_discrib'] = $row['dinghaopu_shop_discrib'];
		$temp['shop_address'] = $row['dinghaopu_shop_address'];
		$temp['shop_province'] = $row['dinghaopu_shop_province'];
		$temp['shop_city'] = $row['dinghaopu_shop_city'];
		$temp['shop_district'] = $row['dinghaopu_shop_district'];
		$temp['shop_zone'] = $row['dinghaopu_shop_zone'];
		$temp['shop_area'] = $row['dinghaopu_shop_area'];
		$temp['shop_industry'] = $row['dinghaopu_shop_industry'];
		$temp['shop_owner_name'] = $row['dinghaopu_shop_owner_name'];
		$temp['shop_owner_phone'] = $row['dinghaopu_shop_owner_phone'];
		$temp['shop_monthly_rent'] = $row['dinghaopu_shop_monthly_rent'];
		$temp['shop_transfer_fee'] = $row['dinghaopu_shop_transfer_fee'];
		$temp['shop_is_approval'] = $row['dinghaopu_shop_is_approval'];
		$temp['shop_is_advertise'] = $row['dinghaopu_shop_is_advertise'];
		$temp['shop_time'] = $row['dinghaopu_shop_time'];
		$temp['shop_time_advertise'] = $row['dinghaopu_shop_time_advertise'];
		$temp['shop_status'] = $row['dinghaopu_shop_status'];
		$temp['shop_type'] = $row['dinghaopu_shop_type'];
		$temp['shop_min_floor'] = $row['dinghaopu_shop_min_floor'];
		$temp['shop_max_floor'] = $row['dinghaopu_shop_max_floor'];
		$temp['shop_is_street'] = $row['dinghaopu_shop_is_street'];
		$temp['shop_width'] = $row['dinghaopu_shop_width'];
		$temp['shop_height'] = $row['dinghaopu_shop_height'];
		$temp['shop_depth'] = $row['dinghaopu_shop_depth'];
		$temp['shop_method'] = $row['dinghaopu_shop_method'];
		$temp['shop_time_left'] = $row['dinghaopu_shop_time_left'];
		$temp['shop_supporting_facilities'] = $row['dinghaopu_shop_supporting_facilities'];
		$temp['shop_customer_population'] = $row['dinghaopu_shop_customer_population'];
		$temp['shop_is_down'] = $row['dinghaopu_shop_is_down'];
		$data['result'] = $temp;
	}
		
	
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>