<?php 
 $Id = $_GET['id'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>需求审核</title>
		<link rel="stylesheet" href="./css/base.css" />
		<link rel="stylesheet" href="./css/rent_approval.css" />
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
				<div class="card">
					<h1>需求审核的信息</h1>
					<h2>基本信息</h2>
					<p><b>标题：&nbsp;&nbsp;</b>{{ rent_info.title }}</p>
					<p><b>ID：&nbsp;&nbsp;</b>{{ rent_info.id }}</p>
					<p>
						<b>城市：&nbsp;&nbsp;</b>{{ rent_info.city }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<b>区：&nbsp;&nbsp;</b>{{ rent_info.district }}</p>
					<p><b>商圈地段：&nbsp;&nbsp;</b>{{ rent_info.zone }}</p>
					<p><b>意向行业：&nbsp;&nbsp;</b>{{ rent_info.industry }}</p>
					<h2>价格信息</h2>
					<p>
						<b>月租范围：&nbsp;&nbsp;</b>{{ rent_info.min_monthly_rent }}&nbsp;&nbsp;&nbsp;元&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;&nbsp;{{ rent_info.min_monthly_rent }}&nbsp;&nbsp;&nbsp;元
					</p>
					<h2>详细信息</h2>
					<p>
						<b>面积范围：&nbsp;&nbsp;</b>{{ rent_info.min_area }}&nbsp;&nbsp;&nbsp;平米&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;&nbsp;{{ rent_info.min_area }}&nbsp;&nbsp;&nbsp;平米
					</p>
					<p><b>求租说明：&nbsp;&nbsp;</b>{{ rent_info.other }}&nbsp;&nbsp;&nbsp;</p>
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
		var page_rent_approval = new Vue({
			el:'#main',
			data: {
				username:"用户名",
				user_permission:200,
				rent_info:{id:0, is_approval:"", is_down:"", time:"", is_advertise:"",  time_advertise:"", title:"", city:"", district:"", zone:"", 
						   industry:"", min_monthly_rent:0, max_monthly_rent:0, min_area:0, max_area:0, name:"", phone:0, other:""}
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
							
						//获取求租信息
						case 'get_rent_info':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + this.get_cookie('login') + '&id=' + <?php echo $Id ?>;
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									self.rent_info.id = response.result[0].rent_id;
									self.rent_info.title = response.result[0].rent_title;
									self.rent_info.city = response.result[0].rent_city;
									self.rent_info.district = response.result[0].rent_district;
									self.rent_info.zone = response.result[0].rent_zone;
									self.rent_info.min_monthly_rent = response.result[0].rent_min_monthly_rent;
									self.rent_info.max_monthly_rent = response.result[0].rent_max_monthly_rent;
									self.rent_info.min_area = response.result[0].rent_min_area;
									self.rent_info.max_area = response.result[0].rent_max_area;
									self.rent_info.name = response.result[0].rent_name;
									self.rent_info.phone = response.result[0].rent_phone;
									self.rent_info.other = response.result[0].rent_other;
									self.rent_info.is_approval = response.result[0].rent_is_approval;
									self.rent_info.is_advertise = response.result[0].rent_is_advertise;
									self.rent_info.time_advertise = response.result[0].rent_time_advertise;
									self.rent_info.time = response.result[0].rent_time;
									self.rent_info.is_down = response.result[0].rent_is_down;
									self.rent_info.industry = response.result[0].rent_industry;
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_rent_info.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
							
						//
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
							window.history.back();
						}
					}
					xmlhttp.open("POST", "../requests_ajax/send_allow_rent.php", true);//异步post请求
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
							window.history.back();
						}
					}
					xmlhttp.open("POST", "../requests_ajax/send_refuse_rent.php", true);//异步post请求
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(data);
				},
				
				//返回
				back() {
					window.history.back();
				}
			},
			created() {
				this.check_login();
				this.get_infomation('name');
				this.get_infomation('permission');
				this.get_infomation('get_rent_info');
			}
		});
	</script>
</html>
