<?php 
 $Id = $_GET['id'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>店铺审核信息</title>
		<link rel="stylesheet" href="./css/base.css" />
		<link rel="stylesheet" href="./css/shop_approval.css" />
		<link rel="shortcut icon" href="./images/logo.ico"/>
		<script src="./js/vue.min.js" type="text/javascript" charset="UTF-8"></script>
	</head>
	<body>
		<div class="main" id="main">
			<div class="nav_left">
				<div class="nav_left_logo">
					<img src="./images/logo.png" />
				</div>
				<ul class="nav_left_list_main">
					<li v-if="user_permission == 100 || user_permission == 101">信息审核
						<ul class="nav_left_list_secondary">
							<li onclick="window.location.href='./shop_approval_list.html'">店铺信息审核</li>
							<li onclick="window.location.href='./rent_approval_list.html'">求租信息审核</li>
						</ul>
					</li>
					<li>信息管理
						<ul class="nav_left_list_secondary">
							<li onclick="window.location.href='./shop_list.html'">店铺信息管理</li>
							<li onclick="window.location.href='./rent_list.html'">求租信息管理</li>
							<li onclick="window.location.href='./shop_upload.html'">店铺上传</li>
							<li onclick="window.location.href='./rent_upload.html'">求租上传</li>
						</ul>
					</li>
					<li v-if="user_permission == 100 || user_permission == 101">图片管理
						<ul class="nav_left_list_secondary">
							<li onclick="window.location.href='./user_image_list.html'">用户图片管理</li>
							<li onclick="window.location.href='./swiper_image_list.html'">首页轮播图管理</li>
							<li onclick="window.location.href='./upload_image.html'">图片上传</li>
						</ul>
					</li>
					<li>账户管理
						<ul class="nav_left_list_secondary">
							<li v-if="user_permission == 100" onclick="window.location.href='./user_list.html'" >后台账户管理</li>
							<li onclick="window.location.href='./user_self.html'">个人管理</li>
						</ul>
					</li>
					<li>{{ username }}</li>
					<li class="nav_left_out" onclick='document.cookie = "login=; expires=Thu, 01 Jan 1970 00:00:00 GMT";alert("已退出");location.reload();'>退出登录</li>
				</ul>
			</div>
			<div class="content_right">
				<div class="card" >
						<h1>店铺审核信息</h1>
						<h2>基本信息</h2>
						<p><b>标题：&nbsp;&nbsp;</b>{{ shop_info.title }}</p>
						<p><b>ID：&nbsp;&nbsp;</b>{{ shop_info.id }}</p>
						<p>
							<b>省：&nbsp;&nbsp;</b>{{ shop_info.province }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b>市：&nbsp;&nbsp;</b>{{ shop_info.city }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b>区：&nbsp;&nbsp;</b>{{ shop_info.district }}</p>
						<p><b>商圈地段：&nbsp;&nbsp;</b>{{ shop_info.zone }}</p>
						<p><b>地址：&nbsp;&nbsp;</b>{{ shop_info.address }}</p>
						<p><b>店铺类型：&nbsp;&nbsp;</b>{{ shop_info.type }}</p>
						<p><b>经营行业：&nbsp;&nbsp;</b>{{ shop_info.industry }}</p>
						<p><b>经营状态：&nbsp;&nbsp;</b>{{ shop_info.status }}</p>
						<p>
							<b>面积：&nbsp;&nbsp;</b>{{ shop_info.area }}&nbsp;&nbsp;&nbsp;平米&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b>面宽：&nbsp;&nbsp;</b>{{ shop_info.width }}&nbsp;&nbsp;&nbsp;米&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b>层高：&nbsp;&nbsp;</b>{{ shop_info.height }}&nbsp;&nbsp;&nbsp;米&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b>进深：&nbsp;&nbsp;</b>{{ shop_info.depth }}&nbsp;&nbsp;&nbsp;米
						</p>
						<p><b>临街情况：&nbsp;&nbsp;</b>{{ shop_info.is_street }}</p>
						<p><b>店铺楼层：&nbsp;&nbsp;</b>{{ shop_info.min_floor }}&nbsp;&nbsp;&nbsp;楼&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;&nbsp;{{ shop_info.max_floor }}&nbsp;&nbsp;&nbsp;楼</p>
						<p>
							<b>客户姓名：&nbsp;&nbsp;</b>{{ shop_info.owner_name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b>联系电话：&nbsp;&nbsp;</b>{{ shop_info.owner_phone }}
						</p>
						<p>
						<h2>价格信息</h2>
						<p><b>租金：&nbsp;&nbsp;</b>{{ shop_info.monthly_rent }}&nbsp;&nbsp;&nbsp;元/月</p>
						<p><b>转让费：&nbsp;&nbsp;</b>{{ shop_info.transfer_fee }}&nbsp;&nbsp;&nbsp;万元</p>
						<p><b>押金预付方式：&nbsp;&nbsp;</b>{{ shop_info.method }}&nbsp;&nbsp;&nbsp;单位：月</p>
						<p><b>剩余租期：&nbsp;&nbsp;</b>{{ shop_info.time_left }}&nbsp;&nbsp;&nbsp;月</p>
						<h2>详细信息</h2>
						<p><b>店铺描述：&nbsp;&nbsp;</b>{{ shop_info.discrib }}&nbsp;&nbsp;&nbsp;</p>
						<p><b>配套设施：&nbsp;&nbsp;</b>{{ shop_info.supporting_facilities }}&nbsp;&nbsp;&nbsp;</p>
						<p><b>客流人群：&nbsp;&nbsp;</b>{{ shop_info.customer_population }}&nbsp;&nbsp;&nbsp;</p>
						<h2>图片信息</h2>
						<div class="card_image_div" v-for="i in shop_image">
							<img v-bind:src="i.url" />
						</div>
						<div style="clear: both;"></div>
						<p>
							<button type="button" v-on:click="allow()">通过</button>
							<button type="button" v-on:click="refuse()">拒绝</button>
							<button type="button" v-on:click="back()">返回</button>
						</p>
				</div>
			</div>
		</div>
	</body>
	<script>
		var page_shop_approval = new Vue({
			el:'#main',
			data: {
				username:"用户名",
				user_permission:200,
				shop_info:{id:0, title:"店铺标题", discrib:"店铺的描述", address:"店铺的详细地址", province:"店铺的省份", city:"店铺的城市", district:"店铺的区",
						   zone:"店铺的地段", area:0.5, industry:"不限-不限", owner_name:"姓名", owner_phone:99999999999, monthly_rent:0, transfer_fee:0, 
						   is_approval:"未审核", is_advertise:"", time:"1970-01-01 00:00:00", time_advertise:"", status:"", type:"", min_floor:0, 
						   max_floor:0, is_street:"", width:0, height:0, depth:0, method:"", time_left:0, supporting_facilities:"", 
						   customer_population:"", is_down:"未转出"},
				shop_image:[]
			},
			methods: {
				//检查登录
				check_login() {
					var self = this;
					var login_cookie = self.get_cookie("login");
					if(login_cookie != null) {
						if(self.check_cookie(login_cookie)) {
							
						}
						else {
							window.location.href = "./login.html";
						}
					}
					else {
						window.location.href = "./login.html";
					}
				},
				
				//获取本地指定名称的cookie值
				get_cookie(name) {
				    var str = document.cookie;
					if(str != null) {
						var arr = str.split("; ");
						for(var i = 0; i < arr.length; i++) {
						    var arr = arr[i].split("=");
						    if(name == arr[0]) {
						        return arr[1];
						    }
						}
					}
				    else {
						return null;
					}
				},
				
				//检查cookie值的有效性
				check_cookie(value) {
					var xmlhttp = new XMLHttpRequest();
					var data = "cookie=" + value;
					xmlhttp.open("POST", "../requests_ajax/check_cookie.php", false);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(data);
					var response = JSON.parse(xmlhttp.responseText);
					if(response['status'] == 100) {
						return true;
					}
					else {
						return false;
					}	
				},
				
				//向服务器获取信息
				get_infomation(string) {
					var self = this;
					switch(string) {
						//获取用户名
						case 'name':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login');
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									self.username = response.username;
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_username.php", true);
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
							
						//获取权限值
						case 'permission':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login');
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									self.user_permission = response.user_permission;
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_user_permission.php", true);
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
						
						//获取店铺信息
						case 'get_shop_info':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + this.get_cookie('login') + '&id=' + <?php echo $Id ?>;
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									self.shop_info.id = response.result[0].shop_id;
									self.shop_info.title = response.result[0].shop_title;
									self.shop_info.discrib = response.result[0].shop_discrib;
									self.shop_info.address = response.result[0].shop_address;
									self.shop_info.province = response.result[0].shop_province;
									self.shop_info.city = response.result[0].shop_city;
									self.shop_info.district = response.result[0].shop_district;
									self.shop_info.zone = response.result[0].shop_zone;
									self.shop_info.area = response.result[0].shop_area;
									self.shop_info.industry = response.result[0].shop_industry;
									self.shop_info.owner_name = response.result[0].shop_owner_name;
									self.shop_info.owner_phone = response.result[0].shop_owner_phone;
									self.shop_info.monthly_rent = response.result[0].shop_monthly_rent;
									self.shop_info.transfer_fee = response.result[0].shop_transfer_fee;
									self.shop_info.is_approval = response.result[0].shop_is_approval;
									self.shop_info.is_advertise = response.result[0].shop_is_advertise;
									self.shop_info.time = response.result[0].shop_time;
									self.shop_info.time_advertise = response.result[0].shop_time_advertise;
									self.shop_info.status = response.result[0].shop_status;
									self.shop_info.type = response.result[0].shop_type;
									self.shop_info.min_floor = response.result[0].shop_min_floor;
									self.shop_info.max_floor = response.result[0].shop_max_floor;
									self.shop_info.is_street = response.result[0].shop_is_street;
									self.shop_info.width = response.result[0].shop_width;
									self.shop_info.height = response.result[0].shop_height;
									self.shop_info.depth = response.result[0].shop_depth;
									self.shop_info.method = response.result[0].shop_method;
									self.shop_info.time_left = response.result[0].shop_time_left;
									self.shop_info.supporting_facilities = response.result[0].shop_supporting_facilities;
									self.shop_info.customer_population = response.result[0].shop_customer_population;
									self.shop_info.is_down = response.result[0].shop_is_down;
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_shop_info.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
							
						//获取店铺图片
						case 'get_shop_image':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + this.get_cookie('login') + '&id=' + <?php echo $Id ?>;
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									for(var i=0; i<response.result.length; i++) {
										var temp = Object();
										temp['id'] = response.result[i].image_id;
										temp['url'] = response.result[i].image_url;
										temp['user_id'] = response.result[i].image_user_id;
										self.shop_image.push(temp);
									}
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_image_list.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
							
						//错误的参数
						default:
							console.log("无效的操作");
							break;
					}
					
				},
				
				//通过
				allow() {
					var xmlhttp = new XMLHttpRequest();
					var data = 'cookie=' + this.get_cookie('login') + '&id=' + <?php echo $Id ?>;
					console.log(123);
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							var response = JSON.parse(xmlhttp.responseText);
							window.alert(response.describe);
							window.location.href="./shop_approval_list.html";
						}
					}
					xmlhttp.open("POST", "../requests_ajax/send_allow_shop.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(data);
				},
				
				//拒绝
				refuse() {
					var xmlhttp = new XMLHttpRequest();
					var data = 'cookie=' + this.get_cookie('login') + '&id=' + <?php echo $Id ?>;
					console.log(123);
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							var response = JSON.parse(xmlhttp.responseText);
							window.alert(response.describe);
							window.location.href="./shop_approval_list.html";
						}
					}
					xmlhttp.open("POST", "../requests_ajax/send_refuse_shop.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(data);
				},
				
				//返回
				back() {
					window.location.href="./shop_approval_list.html";
				}
			},
			created() {
				this.check_login();
				this.get_infomation('name');
				this.get_infomation('permission');
				this.get_infomation('get_shop_info');
				this.get_infomation('get_shop_image');
			}
		});
	</script>
</html>
