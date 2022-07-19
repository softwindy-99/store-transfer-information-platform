<?php
	/* 接收数据 */
	$Text = $_GET['text'];
	$City = $_GET['city'];
	$District = $_GET['district'];
	/* 变量 */
	$data = array();//待返回的数据
	
	/* Main */
	require "../database.php"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
	//数据预处理
	$Text = mysqli_real_escape_string($conn, $Text);
	$sql = "SELECT * FROM dinghaopu_shop WHERE dinghaopu_shop_is_approval = '已审核' AND dinghaopu_shop_is_down = '未转出' AND dinghaopu_shop_city = '{$City}' AND ( dinghaopu_shop_title LIKE '%{$Text}%' OR dinghaopu_shop_address LIKE '%{$Text}%' OR dinghaopu_shop_industry LIKE '%{$Text}%' OR dinghaopu_shop_zone LIKE '%{$Text}%' OR dinghaopu_shop_owner_name LIKE '%{$Text}%')  ORDER BY dinghaopu_shop_time_advertise Desc";

	$data['sql'] = $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
		$data['status'] = 100;
		$data['describe'] = "请求成功";
		$data['result'] = array();
        while ($row = $result->fetch_assoc()) {
		  //查询文本信息
		  $temp = array();
		  $id = $row['dinghaopu_shop_id'];
		  $title = $row['dinghaopu_shop_title'];
		  $area = $row['dinghaopu_shop_area'];
		  $monthly_rent = $row['dinghaopu_shop_monthly_rent'];
		  $transfer_fee = $row['dinghaopu_shop_transfer_fee'];
		  if($monthly_rent == 0) {
			  $monthly_rent = "面议";
		  }
		  if($transfer_fee == 0) {
			  $transfer_fee = "面议";
		  }
		  $temp['id'] = $id;
		  $temp['title'] = $title;
		  $temp['area'] = $area;
		  $temp['monthly_rent'] = $monthly_rent;
		  $temp['transfer_fee'] = $transfer_fee;
		  //查询图片信息
		  $sql_temp = "SELECT * FROM dinghaopu_image WHERE dinghaopu_image_user_id = " . $id;
		  $result_temp = $conn->query($sql_temp);
		  $row_temp = $result_temp->fetch_assoc();
		  $image_url = $row_temp['dinghaopu_image_url'];
		  $temp['image_url'] = $image_url;
		  array_push($data['result'], $temp);
        }
    }
	else {
		$data['status'] = 200;
		$data['describe'] = "请求失败";
	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>