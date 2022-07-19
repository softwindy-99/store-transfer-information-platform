<?php
	/* 变量 */
	$image_url = array();
	$target_url = array();
	$data = array();//待返回的数据
	
	/* Main */
	require "../database.php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM dinghaopu_swiper";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
		$data['status'] = 100;
		$data['describe'] = "请求成功";
        while ($row = $result->fetch_assoc()) {
		  $imageurl = $row['dinghaopu_swiper_imageurl'];
		  $targeturl = $row['dinghaopu_swiper_targeturl'];
		  array_push($image_url, $imageurl);
		  array_push($target_url, $targeturl);
        }
		$data['image_url'] = $image_url;
		$data['target_url'] = $target_url;
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