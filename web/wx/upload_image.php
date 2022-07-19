<?php
	function GetRandStr($length) {
		$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$len = strlen($str)-1;
		$randstr = '';
		for ($i=0;$i<$length;$i++) {
				$char=mt_rand(0,$len);
				$randstr .= $str[$char];
		}
		return $randstr;
	}

	$data = array();
	if($_FILES["image"]["error"] > 0) {
		$data['status'] = 200;
	}
	else {
	    $data['status'] = 100;
		$allowedExts = array("jpeg", "jpg", "png");	// 允许图片类型
		$extension = end(explode(".", $_FILES["image"]["name"]));
		$path = "../upload_images/" . time() . GetRandStr(16) . ".$extension";
		move_uploaded_file($_FILES["image"]["tmp_name"], $path);
		$path = "https://zay159.xyz" . substr($path, 2);
		$data['url'] = $path;
	}
header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>