<?php
	/* 接收数据 */
	$Province = $_GET['province'];
	$City = $_GET['city'];
	$District = $_GET['district'];
	
	/* 变量 */
	$data = array();//待返回的数据
	
	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);

			$data['status'] = 100;
			$data['describe'] = "成功";
			$data['result'] = array();
			$constans = file_get_contents("../region_dumps.json");
			$json = json_decode($constans, true);
			$temp = array();
			//选取到省
			for($i = 0; $i<count($json); $i++) {
				if($json[$i]['name'] == $Province) {
					$temp = $json[$i];
				}
			}
			//选取到市
			for($i = 0; $i<count($temp['cities']); $i++) {
				if($temp['cities'][$i]['name'] == $City) {
					$json = $temp['cities'][$i];//这里不能$temp = $temp['cities'][$i]; 因为$temp会进行类型转换，所以交替使用$temp和$json
				}
			}
			//选取到区
			$temp1 = array();
			for($i = 0; $i<count($json['counties']); $i++) {
				if($json['counties'][$i]['name'] == $District) {
					$temp1 = $json['counties'][$i];
				}
			}
			//获取商圈列表
			for($i = 0; $i<count($temp1['circles']); $i++) {
				array_push($data['result'],$temp1['circles'][$i]['name']);
			}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>