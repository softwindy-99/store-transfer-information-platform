<?php
	/* 接收数据 */
	$Cookie = $_POST["cookie"];
	$Type_0 =$_POST['type_0'];
	
	/* 变量 */
	$data = array();//待返回的数据
	
	/* 方法 */
	//检查cookie的有效性
	function check_user_cookie($cookie) {
		require "../database.php";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT * FROM dinghaopu_user WHERE dinghaopu_user_cookie='" . $cookie . "'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	//检查权限
	function check_user_permission($cookie) {
		require "../database.php";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT * FROM dinghaopu_user WHERE dinghaopu_user_cookie='" . $cookie . "'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if($row['dinghaopu_user_permission'] == 100 || $row['dinghaopu_user_permission'] == 101 || $row['dinghaopu_user_permission'] == 200) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	
	/* Main */
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$Cookie = mysqli_real_escape_string($conn, $Cookie);
	if(check_user_cookie($Cookie)) {
		//cookie有效
		if (check_user_permission($Cookie)) {
			//权限通过
			$data['status'] = 100;
			$data['describe'] = "成功";
			$data['result'] = array();
			switch($Type_0) {
				case "不限":
					array_push($data['result'], "不限");
					break;
				case "餐饮美食":
					array_push($data['result'], "不限");
					array_push($data['result'], "餐馆");
					array_push($data['result'], "食堂");
					array_push($data['result'], "面包店");
					array_push($data['result'], "咖啡馆");
					array_push($data['result'], "茶艺馆");
					array_push($data['result'], "小吃店");
					array_push($data['result'], "水果食品店");
					array_push($data['result'], "凉茶店");
					array_push($data['result'], "快餐店");
					break;
				case "美容美发":
					array_push($data['result'], "不限");
					array_push($data['result'], "美容院");
					array_push($data['result'], "美发店");
					array_push($data['result'], "美甲店");
					array_push($data['result'], "SPA馆");
					break;
				case "服饰鞋包":
					array_push($data['result'], "不限");
					array_push($data['result'], "服装店");
					array_push($data['result'], "内衣店");
					array_push($data['result'], "童装店");
					array_push($data['result'], "鞋店");
					array_push($data['result'], "箱包店");
					array_push($data['result'], "饰品点");
					break;
				case "专柜转让":
					array_push($data['result'], "不限");
					array_push($data['result'], "商场专柜");
					array_push($data['result'], "电子专柜");
					array_push($data['result'], "其他专柜");
					break;
				case "休闲娱乐":
					array_push($data['result'], "不限");
					array_push($data['result'], "网吧");
					array_push($data['result'], "酒吧");
					array_push($data['result'], "足浴");
					array_push($data['result'], "水疗");
					array_push($data['result'], "球馆");
					array_push($data['result'], "麻将馆");
					array_push($data['result'], "瑜伽馆");
					array_push($data['result'], "KTV");
					array_push($data['result'], "养生馆");
					array_push($data['result'], "夜总会");
					array_push($data['result'], "桌球城");
					array_push($data['result'], "健身房");
					array_push($data['result'], "游泳馆");
					array_push($data['result'], "休闲中心");
					array_push($data['result'], "棋牌室");
					array_push($data['result'], "电玩城");
					array_push($data['result'], "溜冰场");
					array_push($data['result'], "婴儿游泳馆");
					array_push($data['result'], "度假山庄");
					array_push($data['result'], "儿童乐园");
					break;
				case "百货超市":
					array_push($data['result'], "不限");
					array_push($data['result'], "超市");
					array_push($data['result'], "便利店");
					array_push($data['result'], "小卖部");
					array_push($data['result'], "精品店");
					array_push($data['result'], "干货杂货店");
					array_push($data['result'], "烟酒茶叶店");
					array_push($data['result'], "母婴用品店");
					array_push($data['result'], "玩具店");
					array_push($data['result'], "文具店");
					array_push($data['result'], "书店");
					array_push($data['result'], "音像店");
					array_push($data['result'], "眼镜店");
					array_push($data['result'], "化妆品店");
					array_push($data['result'], "乐器店");
					array_push($data['result'], "工艺品店");
					array_push($data['result'], "珠宝首饰");
					array_push($data['result'], "床上用品");
					array_push($data['result'], "体育用品店");
					break;
				case "生活服务":
					array_push($data['result'], "不限");
					array_push($data['result'], "干洗店");
					array_push($data['result'], "花店水族");
					array_push($data['result'], "公话超市");
					array_push($data['result'], "彩票店");
					array_push($data['result'], "报刊亭");
					array_push($data['result'], "送水送气店");
					array_push($data['result'], "宠物店");
					array_push($data['result'], "照相馆");
					array_push($data['result'], "婚纱摄影店");
					array_push($data['result'], "婚介所");
					array_push($data['result'], "职介所");
					array_push($data['result'], "家政中心");
					array_push($data['result'], "打字复印");
					array_push($data['result'], "美鞋修鞋店");
					break;
				case "电器通讯":
					array_push($data['result'], "不限");
					array_push($data['result'], "手机店");
					array_push($data['result'], "电脑店");
					array_push($data['result'], "电器店");
					array_push($data['result'], "维修店");
					array_push($data['result'], "通讯用品店");
					break;
				case "汽修美容":
					array_push($data['result'], "不限");
					array_push($data['result'], "汽修厂");
					array_push($data['result'], "轮胎店");
					array_push($data['result'], "汽车美容店");
					array_push($data['result'], "车场");
					break;
				case "医疗器械":
				    array_push($data['result'], "不限");
				    array_push($data['result'], "医院");
				    array_push($data['result'], "诊所");
				    array_push($data['result'], "药店");
				    array_push($data['result'], "保健品店");
					array_push($data['result'], "成人用品店");
					break;
				case "家居建材":
				    array_push($data['result'], "不限");
				    array_push($data['result'], "五金店");
				    array_push($data['result'], "建材店");
				    array_push($data['result'], "家具店");
				    array_push($data['result'], "灯饰店");
					array_push($data['result'], "家居饰品店");
					array_push($data['result'], "装饰装修材料店");
					break;	
				case "教育培训":
				    array_push($data['result'], "不限");
				    array_push($data['result'], "学校");
				    array_push($data['result'], "幼儿园");
				    array_push($data['result'], "培训机构");
				    array_push($data['result'], "家教中心");
					array_push($data['result'], "早教中心");
					break;	
				case "酒店宾馆":
				    array_push($data['result'], "不限");
				    array_push($data['result'], "旅馆");
				    array_push($data['result'], "宾馆酒店");
				    array_push($data['result'], "招待所");
				    array_push($data['result'], "公寓房");
					break;	
				case "公司工厂":
				    array_push($data['result'], "不限");
				    array_push($data['result'], "公司转让");
				    array_push($data['result'], "工厂转让");
				default:
					array_push($data['result'], "不限");
					break;
			}
			
			
		}
		else {
			//权限不通过
			$data['status'] = 200;
			$data['describe'] = "失败，权限不足";
		}
		
	}
	else {
		//cookie无效
		$data['status'] = 200;
		$data['describe'] = "失败，无效的cookie";
	}
	$conn->close();
	header('Content-Type:application/json; charset=utf-8');
	$data = json_encode($data);
	echo $data;
?>