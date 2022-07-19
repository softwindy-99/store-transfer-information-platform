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
	$data['describe'] = "请求成功";
	$data['result'] = array();
	$sql = "SELECT * FROM dinghaopu_image WHERE dinghaopu_image_user_id=" . $Id ;
	$data['describe'] = $sql;
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($data['result'],$row['dinghaopu_image_url']);
		}
	}

	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>