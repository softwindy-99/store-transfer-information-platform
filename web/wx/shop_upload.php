<?php
	/* 接收数据 */
	//基本信息
	$Title = $_POST['title'];//
	$Province = $_POST['province'];//
	$City = $_POST['city'];//
	$District = $_POST['district'];//
	$Zone = $_POST['zone'];//
	$Address = $_POST['address'];//
	$Owner_name = $_POST['owner_name'];//
	$Owner_phone = $_POST['owner_phone'];//
	$Area = $_POST['area'];//
	$Type_0 = $_POST['type_0'];$Type_1 = $_POST['type_1'];
	$Industry = $Type_0 . "-" . $Type_1;if($Industry == null || $Industry == "")$Industry = "";
	$Status = $_POST['status'];if($Status == null || $Status == "")$Status = "";
	$Type = $_POST['type'];if($Type == null || $Type == "")$Type = "";
	$Width = $_POST['width'];if($Width == null || $Width == 0)$Width = 0;
	$Height = $_POST['height'];if($Height == null || $Height == 0)$Height = 0;
	$Depth = $_POST['depth'];if($Depth == null || $Depth == 0)$Depth = 0;
	$Min_floor = $_POST['min_floor'];if($Min_floor == null || $Min_floor == 0)$Min_floor = 0;
	$Max_floor = $_POST['max_floor'];if($Max_floor == null || $Max_floor == 0)$Max_floor = 0;
	$Is_street = $_POST['is_street'];if($Is_street == null || $Is_street == "")$Is_street = "";
	//价格信息
	$Monthly_rent = $_POST['monthly_rent'];//
	$Transfer_fee = $_POST['transfer_fee'];//
	$Method_0 = $_POST['method_0'];if($Method_0 == null)$Method_0 = 0;
	$Method_1 = $_POST['method_1'];if($Method_1 == null)$Method_1 = 0;
	$Method = "押".$Method_0."付".$Method_1;
	$Time_left = $_POST['time_left'];if($Time_left == null || $Time_left == 0)$Time_left = 0;
	//详细信息
	$Discrib = $_POST['discrib'];//
	$P0 = $_POST['p0'];$P1 = $_POST['p1'];$P2 = $_POST['p2'];$P3 = $_POST['p3'];$P4 = $_POST['p4'];$P5 = $_POST['p5'];$P6 = $_POST['p6'];$P7 = $_POST['p7'];
	$P8 = $_POST['p8'];$P9 = $_POST['p9'];$P10 = $_POST['p10'];$P11 = $_POST['p11'];$P12 = $_POST['p12'];$P13 = $_POST['p13'];$P14 = $_POST['p14'];$P15 = $_POST['p15'];
	$P16 = $_POST['p16'];$P17 = $_POST['p17'];$P18 = $_POST['p18'];$P19 = $_POST['p19'];$P20 = $_POST['p20'];
	$Supporting_facilities = $P0 . "-" . $P1 . "-" . $P2 . "-" . $P3 . "-" . $P4 . "-" . $P5 . "-" . $P6 . "-" . $P7 . "-" . $P8 . "-" . $P9 . "-" . $P10 . "-" . $P11 . "-" . $P12 . "-" . $P13 . "-" . $P14 . "-" . $P15;
	$Customer_population = $P16 . "-" . $P17 . "-" . $P18 . "-" . $P19 . "-" . $P20;
	/*$Pts = $_POST['pts'];
	$i = 0;
	for($i = 0;$i<count($Pts);$i++){
	    if($Pts[$i].checked == false){
	        $Supporting_facilities = $Supporting_facilities . "-" . $Pts[$i].value;
	    }
	}
	$Kls = json_decode($_POST['kls']);
	for($i = 0;$i<count($Kls);$i++){
	    if($Kls[$i].checked == false){
	        $Customer_population = $Customer_population . "-" . $Pts[$i].value;
	    }
	}*/
	//图片信息
	$Img = $_POST['imageUrlList'];
	$Img =explode(',',$Img);
	date_default_timezone_set('Asia/Shanghai');
	$Time = date('Y-m-d H:i:s');
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
	
	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$data = array();
	$sql = "INSERT INTO dinghaopu_shop(`dinghaopu_shop_time`, `dinghaopu_shop_time_advertise`, `dinghaopu_shop_title`, `dinghaopu_shop_address`, `dinghaopu_shop_monthly_rent`, `dinghaopu_shop_transfer_fee`, `dinghaopu_shop_owner_name`, `dinghaopu_shop_owner_phone`, `dinghaopu_shop_discrib`, `dinghaopu_shop_area`, `dinghaopu_shop_industry`, `dinghaopu_shop_province`, `dinghaopu_shop_city`, `dinghaopu_shop_district`, `dinghaopu_shop_zone`, `dinghaopu_shop_status`, `dinghaopu_shop_type`, `dinghaopu_shop_min_floor`, `dinghaopu_shop_max_floor`, `dinghaopu_shop_is_street`, `dinghaopu_shop_width`, `dinghaopu_shop_height`, `dinghaopu_shop_depth`, `dinghaopu_shop_method`, `dinghaopu_shop_time_left`, `dinghaopu_shop_supporting_facilities`, `dinghaopu_shop_customer_population`) VALUES('{$Time}', '2021-01-01', '{$Title}', '{$Address}', {$Monthly_rent}, {$Transfer_fee}, '{$Owner_name}', '{$Owner_phone}', '{$Discrib}', {$Area}, '{$Industry}', '{$Province}', '{$City}', '{$District}', '{$Zone}', '{$Status}', '{$Type}', {$Min_floor}, {$Max_floor}, '{$Is_street}', {$Width}, {$Height}, {$Depth}, '{$Method}', {$Time_left}, '{$Supporting_facilities}', '{$Customer_population}');";
	$data['sql'] = $sql;
	if($conn->query($sql)) {
		
		$sql = "SELECT * FROM `dinghaopu_shop` WHERE `dinghaopu_shop_id` = @@IDENTITY;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$id = $result->fetch_assoc()['dinghaopu_shop_id'];
			$i = 0;
			while($Img[$i]!=null) {
			    $sql = "INSERT INTO dinghaopu_image (dinghaopu_image_url, dinghaopu_image_user_id) VALUES ('{$Img[$i]}', {$id})";
			    $i = $i + 1;
			    $conn->query($sql);
			}
			$data['status'] = 100;
		}
		else {
			$data['status'] = 201;

		}
	}
	else {
		$data['status'] = 202;

	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
	
?>