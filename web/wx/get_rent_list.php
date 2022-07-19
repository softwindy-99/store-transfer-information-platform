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
	$City = mysqli_real_escape_string($conn, $City);
	$sql = "SELECT * FROM dinghaopu_rent WHERE dinghaopu_rent_is_approval = '已审核' AND dinghaopu_rent_is_down = '未完结' AND dinghaopu_rent_city = '{$City}' AND (dinghaopu_rent_title  LIKE '%{$Text}%' OR dinghaopu_rent_other  LIKE '%{$Text}%' OR dinghaopu_rent_industry  LIKE '%{$Text}%' OR dinghaopu_rent_zone  LIKE '%{$Text}%') ORDER BY dinghaopu_rent_time_advertise Desc";
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