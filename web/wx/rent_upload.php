<?php
	/* 接收数据 */
	//基本信息
	$Title = $_POST['title'];//
	$Province = $_POST['province'];//
	$City = $_POST['city'];//
	$District = $_POST['district'];//
	$Zone = $_POST['zone'];//
	$Name = $_POST['name'];//
	$Phone = $_POST['phone'];//
	$Min_area = $_POST['min_area'];//
	$Max_area = $_POST['max_area'];//
	$Type_0 = $_POST['type_0'];$Type_1 = $_POST['type_1'];
	$Industry = $Type_0 . "-" . $Type_1;//
	//价格信息
	$Min_monthly_rent = $_POST['min_monthly_rent'];//
	$Max_monthly_rent = $_POST['max_monthly_rent'];//
	//详细信息
	$Other = $_POST['other'];
	//管理信息
	$Time_advertise = "2021-01-01";
	date_default_timezone_set('Asia/Shanghai');
	$Time = date('Y-m-d H:i:s');
	
	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = "INSERT INTO dinghaopu_rent(`dinghaopu_rent_time`, `dinghaopu_rent_time_advertise`, `dinghaopu_rent_title`, `dinghaopu_rent_province`, `dinghaopu_rent_city`, `dinghaopu_rent_district`, `dinghaopu_rent_zone`, `dinghaopu_rent_industry`, `dinghaopu_rent_min_monthly_rent`, `dinghaopu_rent_max_monthly_rent`, `dinghaopu_rent_min_area`, `dinghaopu_rent_max_area`, `dinghaopu_rent_name`, `dinghaopu_rent_phone`, `dinghaopu_rent_other`) VALUES('{$Time}', '2021-01-01', '{$Title}', '{$Province}', '{$City}', '{$District}', '{$Zone}', '{$Industry}', {$Min_monthly_rent}, {$Max_monthly_rent}, {$Min_area}, {$Max_area}, '{$Name}', '{$Phone}', '{$Other}')";
	$data['sql'] = $sql;
	if($conn->query($sql)) {
	    $data['status'] = 100;
		
	}
	else {
		$data['status'] = 200;
	}
	
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>