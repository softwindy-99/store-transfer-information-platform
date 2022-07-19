<?php
	/* 变量 */
	$data = array();//待返回的数据
	
	/* Main */
	$data['status'] = 100;
	$data['describe'] = "成功";
	$data['result'] = array();
	array_push($data['result'], "不限");
	array_push($data['result'], "餐饮美食");
	array_push($data['result'], "美容美发");
	array_push($data['result'], "服饰鞋包");
	array_push($data['result'], "专柜转让");
	array_push($data['result'], "休闲娱乐");
	array_push($data['result'], "百货超市");
	array_push($data['result'], "生活服务");
	array_push($data['result'], "电器通讯");
	array_push($data['result'], "汽修美容");
	array_push($data['result'], "医疗器械");
	array_push($data['result'], "家居建材");
	array_push($data['result'], "教育培训");
	array_push($data['result'], "酒店宾馆");
	array_push($data['result'], "公司工厂");
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>