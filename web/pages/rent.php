<?php 
	$Id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>需求信息</title>
		<link rel="stylesheet" href="./css/base.css" />
		<link rel="stylesheet" href="./css/rent.css" />
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
				<div class="card">
					<form action="../requests_form/request_rent.php" method="post">
						<h1>求租信息</h1>
						<h2>基本信息</h2>
						<input class="card_form_input_hidden" name="id" v-bind:value="rent_info.id" />
						<input class="card_form_input_hidden" name="cookie" v-bind:value="get_cookie('login')" />
						<p>
							<b><span>*&nbsp;&nbsp;</span>标题：&nbsp;&nbsp;</b><input class="_form_input_title" v-model="rent_info.title" name="title" required="required" />&nbsp;&nbsp;&nbsp;&nbsp;<i>标题应不超过30个汉字或60个英文字母</i>
							<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID：</b>{{ rent_info.id }}&nbsp;&nbsp;&nbsp;&nbsp;<i>ID是求租信息的唯一编号</i>
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>省(直辖市)：&nbsp;&nbsp;</b>
							<select v-model="rent_info.province" v-on:change="changed_province()" name="province" required="required">
								<option v-for="i in province_list">{{ i }}</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
							<b><span>*&nbsp;&nbsp;</span>市(直辖市)：</b>
							<select v-model="rent_info.city" v-on:change="changed_city()" name="city" required="required" >
								<option v-for="i in city_list">{{ i }}</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
							<b><span>*&nbsp;&nbsp;</span>区：</b>
							<select v-model="rent_info.district" v-on:change="changed_district()" name="district" required="required" >
								<option v-for="i in district_list">{{ i }}</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>商圈地段：&nbsp;&nbsp;</b>
							<select v-model="rent_info.zone" name="zone" required="required">
								<option v-for="i in zone_list">{{ i }}</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>经营行业：&nbsp;&nbsp;</b>
							<select v-model="type_0" v-on:change="changed_type()" name="type_0"  required="required">
								<option v-for="i in type_0_list">{{ i }}</option>
							</select>&nbsp;&nbsp;—&nbsp;&nbsp;
							<select v-model="type_1" name="type_1" required="required">
								<option v-for="i in type_1_list">{{ i }}</option>
							</select>
						</p>
						<h2>价格信息</h2>
						<p>
							<b><span>*&nbsp;&nbsp;</span>月租金范围：&nbsp;&nbsp;</b>
							<input type="number" v-model="rent_info.min_monthly_rent" name="min_monthly_rent" required="required" />
							&nbsp;至&nbsp;
							<input type="number" v-model="rent_info.max_monthly_rent" name="max_monthly_rent" required="required" />
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>面积范围：&nbsp;&nbsp;</b>
							<input type="number" step="0.01" v-model="rent_info.min_area" name="min_area" required="required" />
							平米&nbsp;至&nbsp;
							<input type="number" step="0.01" v-model="rent_info.max_area" name="max_area" required="required" />
							平米
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>姓名：&nbsp;&nbsp;</b><input v-model="rent_info.name" name="name" required="required" />
							<b><span>*&nbsp;&nbsp;</span>电话：&nbsp;&nbsp;</b><input type="text" maxlength="11" step="1" v-model="rent_info.phone" name="phone" required="required" />
						</p>
						<h2>详细信息</h2>
						<p><b>具体说明：</b></p>
						<p><textarea class="_form_textarea_other" v-model="rent_info.other" name="other" ></textarea></p>
						<h2>管理信息</h2>
						<p>
							<b><span>*&nbsp;&nbsp;</span>提交日期：&nbsp;&nbsp;</b>
							<input type="datetime" v-model="rent_info.time" name="time" required="required" />
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>是否推广：&nbsp;&nbsp;</b>
							<select v-model="rent_info.is_advertise" name="is_advertise" required="required" >
								<option>是</option>
								<option>否</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
							<b><span>*&nbsp;&nbsp;</span>推广时间：&nbsp;&nbsp;</b>
							<input type="date" v-model="rent_info.time_advertise" name="time_advertise" required="required" /><i>&nbsp;设置推广的同时填开始时间</i>&nbsp;&nbsp;&nbsp;&nbsp;
							<b><span>*&nbsp;&nbsp;</span>完结状态：&nbsp;&nbsp;</b>
							<select v-model="rent_info.is_down" name="is_down" required="required" >
								<option>未完结</option>
								<option>已完结</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
							<b><span>*&nbsp;&nbsp;</span>审核状态：&nbsp;&nbsp;</b>
							<select v-model="rent_info.is_approval" name="is_approval" required="required" >
								<option>已审核</option>
								<option>未审核</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p>
							<button v-if="user_permission == 100 || user_permission == 101" type="submit">修改</button>
							<button type="button" onclick="window.history.back()">返回</button>
						</p>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script>
		var page_rent = new Vue({
			el:'#main',
			data: {
				username:"用户名",
				user_permission:200,
				rent_info:{id:0, title:"标题", province:"", city:"城市", district:"区域", zone:"地段", min_monthly_rent:0, max_monthly_rent:0, min_area:0, max_area:0,
						   industry:"", name:"名字", phone:99999999999, other:"说明", is_approval:"未审核", is_advertise:"否", time_advertise:"1970-01-01", time:"", is_down:"未完结"},
				//表单需要的信息
				province_list:[],
				city_list:[],
				district_list:[],
				zone_list:[],
				type_0_list:[],
				type_1_list:[],
				type_0:"",
				type_1:""
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
							
						//获取需求信息
						case 'get_rent_info':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + this.get_cookie('login') + '&id=' + <?php echo $Id ?>;
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									self.rent_info.id = response.result[0].rent_id;
									self.rent_info.title = response.result[0].rent_title;
									self.rent_info.province = response.result[0].rent_province;
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
									self.get_infomation('get_pronvince_list');
									self.get_infomation('get_city_list');
									self.get_infomation('get_district_list');
									self.get_infomation('get_zone_list');
									self.split_industry();
									self.get_infomation('get_type_0_list');
									self.get_infomation('get_type_1_list');
		
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_rent_info.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
						
						//获取省信息
						case 'get_pronvince_list':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login');
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									console.log(response);
									for(var i=0; i<response.result.length; i++) {
										self.province_list.push(response.result[i]);
									}
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_province_list.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
						
						//获取市信息
						case 'get_city_list':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login') + '&province=' + self.rent_info.province;
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									console.log(response);
									for(var i=0; i<response.result.length; i++) {
										self.city_list.push(response.result[i]);
									}
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_city_list.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
						
						//获取区信息
						case 'get_district_list':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login') + '&province=' + self.rent_info.province + '&city=' + self.rent_info.city;
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									console.log(response);
									for(var i=0; i<response.result.length; i++) {
										self.district_list.push(response.result[i]);
									}
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_district_list.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
						
						//获取商圈地段信息
						case 'get_zone_list':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login') + '&province=' + self.rent_info.province + '&city=' + self.rent_info.city + '&district=' + self.rent_info.district;
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									console.log(response);
									for(var i=0; i<response.result.length; i++) {
										self.zone_list.push(response.result[i]);
									}
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_zone_list.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;	
							
						//获取店铺类型0信息
						case 'get_type_0_list':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login');
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									console.log(response);
									for(var i=0; i<response.result.length; i++) {
										self.type_0_list.push(response.result[i]);
									}
									
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_type_0_list.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
						
						//获取店铺类型1信息
						case 'get_type_1_list':
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login') +'&type_0=' + self.type_0;
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									var response = JSON.parse(xmlhttp.responseText);
									console.log(response);
									for(var i=0; i<response.result.length; i++) {
										self.type_1_list.push(response.result[i]);
									}
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_type_1_list.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
							
						//无效的参数
						default:
							console.log("无效的操作");
							break;
					}
					
				},
				
				//省变化
				changed_province() {
					var self = this;
					self.rent_info.city = "";
					self.rent_info.district = "";
					self.rent_info.zone = "";
					self.city_list = Array();
					self.district_list = Array();
					self.zone_list = Array();
					self.get_infomation('get_city_list');
				},
				
				//市变化
				changed_city() {
					var self = this;
					self.rent_info.district = "";
					self.rent_info.zone = "";
					self.district_list = Array();
					self.zone_list = Array();
					self.get_infomation('get_district_list');
				},
				
				//区变化
				changed_district() {
					var self = this;
					self.rent_info.zone = "";
					self.zone_list = Array();
					self.get_infomation('get_zone_list');
				},
				
				//店铺类型0变化
				changed_type() {
					var self = this;
					self.type_1_list = Array();
					self.type_1 = "不限";
					self.get_infomation('get_type_1_list');
				},
				
				//拆分industry字段
				split_industry() {
					var self = this;
					var temp = self.rent_info.industry;
					var arr = temp.split("-");
					self.type_0 = arr[0];
					self.type_1 = arr[1];
				},
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
