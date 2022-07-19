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

	$Id = $_POST['id'];
	
	if($_FILES["image"]["error"] > 0) {
		echo '<script>alert("上传失败");window.location.href="../pages/upload_image.html";</script>';
	}
	else {
		$allowedExts = array("jpeg", "jpg", "png");	// 允许图片类型
		$extension = end(explode(".", $_FILES["image"]["name"]));
		$path = "../upload_images/" . time() . GetRandStr(16) . ".$extension";
		
		move_uploaded_file($_FILES["image"]["tmp_name"], $path);
		
		if($Id == 0) {
		    $path = "https://zay159.xyz" . substr($path,2);
			$Url = $_POST['url'];
			$sql = "INSERT INTO dinghaopu_swiper (dinghaopu_swiper_imageurl, dinghaopu_swiper_targeturl) VALUES ('{$path}', '{$Url}');";
		}
		else {
		    $path = "https://zay159.xyz" . substr($path,2);
			$sql = "INSERT INTO dinghaopu_image (dinghaopu_image_url, dinghaopu_image_user_id) VALUES ('{$path}', {$Id});";
		}
		
		require "../database.php";
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if($conn->query($sql) && in_array($extension, $allowedExts)) {
			echo '<script>alert("上传成功");window.location.href="../pages/upload_image.html";</script>';
		}
		else {
			echo '<script>alert("上传失败");window.location.href="../pages/upload_image.html";</script>';
		}
		
		$conn->close();
	}
?>