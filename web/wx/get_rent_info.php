<?php
	/* 接收数据 */
	$Id = $_GET['id'];
	
	/* 变量 */
	$data = array();//待返回的数据
	

	
	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$Id = mysqli_real_escape_string($conn, $Id);

			$data['status'] = 100;
			$data['describe'] = "成功";
			$data['result'] = array();
			$sql = "SELECT * FROM dinghaopu_rent WHERE dinghaopu_rent_id=" . $Id;
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$temp = array();
				$temp['rent_id'] = $row['dinghaopu_rent_id'];
				$temp['rent_title'] = $row['dinghaopu_rent_title'];
				$temp['rent_province'] = $row['dinghaopu_rent_province'];
				$temp['rent_city'] = $row['dinghaopu_rent_city'];
				$temp['rent_district'] = $row['dinghaopu_rent_district'];
				$temp['rent_zone'] = $row['dinghaopu_rent_zone'];
				$temp['rent_min_monthly_rent'] = $row['dinghaopu_rent_min_monthly_rent'];
				$temp['rent_max_monthly_rent'] = $row['dinghaopu_rent_max_monthly_rent'];
				$temp['rent_min_area'] = $row['dinghaopu_rent_min_area'];
				$temp['rent_max_area'] = $row['dinghaopu_rent_max_area'];
				$temp['rent_name'] = $row['dinghaopu_rent_name'];
				$temp['rent_phone'] = $row['dinghaopu_rent_phone'];
				$temp['rent_other'] = $row['dinghaopu_rent_other'];
				$temp['rent_is_approval'] = $row['dinghaopu_rent_is_approval'];
				$temp['rent_is_advertise'] = $row['dinghaopu_rent_is_advertise'];
				$temp['rent_time_advertise'] = $row['dinghaopu_rent_time_advertise'];
				$temp['rent_time'] = $row['dinghaopu_rent_time'];
				$temp['rent_is_down'] = $row['dinghaopu_rent_is_down'];
				$temp['rent_industry'] = $row['dinghaopu_rent_industry'];
				array_push($data['result'],$temp);
			}
		
	
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>