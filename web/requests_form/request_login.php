<?php
	/* 接收数据 */
	$Username = $_POST["username"];
	$Password = $_POST["password"];
	
	/* 方法 */
	//生成随机字符串
	function GetRandStr($length) {
		//字符组合
		$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$len = strlen($str)-1;
		$randstr = '';
		for ($i=0;$i<$length;$i++) {
				$char=mt_rand(0,$len);
				$randstr .= $str[$char];
		}
		return $randstr;
	}
	
	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$Username = mysqli_real_escape_string($conn, $Username);
	$Password = mysqli_real_escape_string($conn, $Password);
	$sql = "SELECT * FROM dinghaopu_user WHERE dinghaopu_user_name='" . $Username ."' AND dinghaopu_user_password= '" . $Password ."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$Id = $row["dinghaopu_user_id"];
		$str = GetRandStr(128);
		$sql = "UPDATE dinghaopu_user SET dinghaopu_user_cookie = '" . $str . "' WHERE dinghaopu_user_id = " . $Id;
		if($conn->query($sql)){
			setcookie('login',$str,time()+3600*24*30,"/pages/");//3600为1小时
			echo "<script>alert('登录成功');window.location.href='../pages/home.html';</script>";  
		}
		else {
			echo "<script>alert('登录失败，发生未知的错误');window.location.href='../pages/login.html';</script>";
		}
	}
	else {
		echo "<script>alert('登录失败，用户名或密码错误');window.location.href='../pages/login.html';</script>";  
	}
	$conn->close();
?>