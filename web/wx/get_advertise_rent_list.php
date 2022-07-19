<?php
	/* 接收数据 */
	$City = $_GET['city'];
	$Industry = $_GET['industry'];
	$Zone = $_GET['zone'];
	$Area = $_GET['area'];
	$More = $_GET['more'];
	
	/* 变量 */
	$data = array();//待返回的数据
	
	/* Main */
	require "../database.php"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
	//数据预处理
	$City = mysqli_real_escape_string($conn, $City);
	$sql = "SELECT * FROM dinghaopu_rent WHERE dinghaopu_rent_is_advertise = '是' AND dinghaopu_rent_is_down = '未完结' AND dinghaopu_rent_is_approval ='已审核' AND dinghaopu_rent_city = '" . $City . "'";
	if($Industry == "行业") {
	    ;
	}
	else {
	$Industry = mysqli_real_escape_string($conn, $Industry);
	$sql = "SELECT * FROM dinghaopu_rent WHERE dinghaopu_rent_is_advertise = '是' AND dinghaopu_rent_is_down = '未完结' AND dinghaopu_rent_is_approval ='已审核' AND dinghaopu_rent_city = '" . $City . "' AND dinghaopu_rent_industry LIKE '%" . $Industry . "%'";
	}

	if($Zone == "商圈") {
	    ;
	}
	else {
	    $Zone = mysqli_real_escape_string($conn, $Zone);
	    $sql = $sql . " AND dinghaopu_rent_zone LIKE '%" . $Zone ."%'";
	}
	if($Area == "面积" || $Area =="不限") {
	    ;
	}
	else {
	    switch ($Area) {
	        case '20㎡以下':
	            $sql = $sql . " AND dinghaopu_rent_min_area < 20";
	            break;
	        case '20㎡-50㎡':
	            $sql = $sql . " AND dinghaopu_rent_min_area >= 20 AND dinghaopu_rent_min_area <= 50";
	            break;
	        case '50㎡-100㎡':
	            $sql = $sql . " AND dinghaopu_rent_min_area >= 50 AND dinghaopu_rent_min_area <= 100";
	            break;
	        case '100㎡-200㎡':
	            $sql = $sql . " AND dinghaopu_rent_min_area >= 100 AND dinghaopu_rent_min_area <= 200";
	            break;
	        case '200㎡以上':
	            $sql = $sql . " AND dinghaopu_rent_min_area >= 200";
	            break;
	        default:
	            ;
	            break;
	    }
	}
	if($More == "更多" || $More == "默认") {
	    $sql = $sql . " ORDER BY dinghaopu_rent_time_advertise Desc";
	}
	else {
	    switch ($More) {
	        case '租金升序':
	            $sql = $sql . " ORDER BY dinghaopu_rent_min_monthly_rent ASC";
	            break;
	        case '租金降序':
	            $sql = $sql . " ORDER BY dinghaopu_rent_min_monthly_rent DESC";
	            break;
	        default:
	            ;
	            break;
	    }
	}
	$data['sql'] = $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
		$data['status'] = 100;
		$data['describe'] = "请求成功";
		$data['result'] = array();
        while ($row = $result->fetch_assoc()) {
		  //查询文本信息
		  $temp = array();
		  $id = $row['dinghaopu_rent_id'];
		  $title = $row['dinghaopu_rent_title'];
		  $min_area = $row['dinghaopu_rent_min_area'];
		  $max_area = $row['dinghaopu_rent_max_area'];
		  $other = $row['dinghaopu_rent_other'];
		  if($other == "") {
			  $other = "暂无";
		  }
		  $temp['id'] = $id;
		  $temp['title'] = $title;
		  $temp['min_area'] = $min_area;
		  $temp['max_area'] = $max_area;
		  $temp['other'] = $other;
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