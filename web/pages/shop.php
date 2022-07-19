<?php
	$Id = $_GET['id'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>店铺信息</title>
		<link rel="stylesheet" href="./css/base.css" />
		<link rel="stylesheet" href="./css/shop.css" />
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
				<div v-if="shop_info.is_down=='已转出'&&shop_image!=null" class="card">
					<h1>店铺已转出</h1>
					<div class="_div_concent">
						<div class="_div_image">
							<img v-bind:src="shop_image[0].url" />
						</div>
						<div class="_div_text">
							<div class="_div_text_id">ID: {{shop_info.id}}</div>
							<div class="_div_text_red">
								<div class="_div_text_red_item">
									<div v-if="shop_info.monthly_rent == 0" class="_div_text_red_item_n">面议</div>
									<div v-else class="_div_text_red_item_n">{{shop_info.monthly_rent}}元</div>
									<div class="_div_text_red_item_t">月租</div>
								</div>
								<div class="_div_text_red_item">
									<div v-if="shop_info.transfer_fee == 0" class="_div_text_red_item_n">面议</div>
									<div v-else class="_div_text_red_item_n">{{shop_info.transfer_fee}}万元</div>
									<div class="_div_text_red_item_t">转让费</div>
								</div>
								<div class="_div_text_red_item" style="border: none;">
									<div class="_div_text_red_item_n">{{shop_info.area}}平米</div>
									<div class="_div_text_red_item_t">面积</div>
								</div>
							</div>
							<div class="_div_text_list">
								<div class="_div_text_list_item">
									<div class="_div_text_list_item_title">目前经营：</div>
									<div class="_div_text_list_item_text">{{shop_info.industry}}</div>
									<div class="_div_text_list_item_title">经营状态：</div>
									<div class="_div_text_list_item_text">{{shop_info.status}}</div>
								</div>
								<div style="clear: both;"></div>
								<div class="_div_text_list_item">
									<div class="_div_text_list_item_title">面&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;宽：</div>
									<div class="_div_text_list_item_text">{{shop_info.width}}米</div>
									<div class="_div_text_list_item_title">支付方式：</div>
									<div class="_div_text_list_item_text">{{shop_info.method}}</div>
								</div>
								<div style="clear: both;"></div>
								<div class="_div_text_list_item">
									<div class="_div_text_list_item_title">层&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：</div>
									<div class="_div_text_list_item_text">{{shop_info.height}}米</div>
									<div class="_div_text_list_item_title">商&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;圈：</div>
									<div class="_div_text_list_item_text">{{shop_info.zone}}</div>
								</div>
								<div style="clear: both;"></div>
								<div class="_div_text_list_item">
									<div class="_div_text_list_item_title">进&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;深：</div>
									<div class="_div_text_list_item_text">{{shop_info.depth}}米</div>
									<div class="_div_text_list_item_title">类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：</div>
									<div class="_div_text_list_item_text">{{shop_info.type}}</div>
								</div>
								<div style="clear: both;"></div>
								<div class="_div_text_list_item">
									<div class="_div_text_list_item_title">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</div>
									<div class="_div_text_list_item_text">{{shop_info.address}}</div>
								</div>
								<div style="clear: both;"></div>
								<img class="_div_down" style="width: 250px;height: 250px;position: absolute;bottom: 4rem;left: 5rem;" src="images/down.jpg" />
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<form action="../requests_form/request_shop.php" method="post">
						<h1>店铺信息</h1>
						<input class="card_form_input_hidden" name="cookie" v-bind:value="get_cookie('login')" />
						<input class="card_form_input_hidden" name="id" v-bind:value="shop_info.id" />
						<h2>基本信息<h2>
						<p>
							<b><span>*&nbsp;&nbsp;</span>标题：&nbsp;&nbsp;</b>
							<input class="_form_input_title" maxlength="40" v-model="shop_info.title" name="title" required="required" />&nbsp;&nbsp;&nbsp;&nbsp;
							<i>店铺标题应不超过40个字符</i>
						</p>
						<p>
							<b>ID：&nbsp;&nbsp;</b>{{ shop_info.id }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<i>ID是店铺信息的唯一编号</i>
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>省(直辖市)：&nbsp;&nbsp;</b>
							<select v-model="shop_info.province" v-on:change="changed_province()" name="province" required="required">
								<option v-for="i in province_list">{{ i }}</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
							<b><span>*&nbsp;&nbsp;</span>市(直辖市)：</b>
							<select v-model="shop_info.city" v-on:change="changed_city()" name="city" required="required" >
								<option v-for="i in city_list">{{ i }}</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
							<b><span>*&nbsp;&nbsp;</span>区：</b>
							<select v-model="shop_info.district" v-on:change="changed_district()" name="district" required="required" >
								<option v-for="i in district_list">{{ i }}</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>商圈地段：&nbsp;&nbsp;</b>
							<select v-model="shop_info.zone" name="zone" required="required">
								<option v-for="i in zone_list">{{ i }}</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p><b><span>*&nbsp;&nbsp;</span>地址：&nbsp;&nbsp;</b><input class="_form_input_address" v-model="shop_info.address" name="address" / required="required"></p>
						<p><b><span>*&nbsp;&nbsp;</span>联系人：&nbsp;&nbsp;</b><input v-model="shop_info.owner_name" name="owner_name" / required="required"></p>
						<p><b><span>*&nbsp;&nbsp;</span>联系电话：&nbsp;&nbsp;</b><input type="number" maxlength="11" v-model="shop_info.owner_phone" name="owner_phone" required="required" /></p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>经营行业：&nbsp;&nbsp;</b>
							<select v-model="type_0" v-on:change="changed_type()" name="type_0"  required="required">
								<option v-for="i in type_0_list">{{ i }}</option>
							</select>&nbsp;&nbsp;—&nbsp;&nbsp;
							<select v-model="type_1" name="type_1" required="required">
								<option v-for="i in type_1_list">{{ i }}</option>
							</select>
						</p>
						<p>
							<b>经营状态：&nbsp;&nbsp;</b>
							<select v-model="shop_info.status" name="status">
								<option>经营中</option>
								<option>闲置中</option>
							</select>
						</p>
						<p>
							<b>店铺类型：&nbsp;&nbsp;</b>
							<select v-model="shop_info.type" name="type">
								<option>商业街商铺</option>
								<option>写字楼配套</option>
								<option>社区底商</option>
								<option>档口摊位</option>
								<option>临街门面</option>
								<option>购物百货中心</option>
								<option>其他</option>
							</select>
							
						</p>
						<p><b><span>*&nbsp;&nbsp;</span>面积：&nbsp;&nbsp;</b><input type="number" step="0.01" v-model="shop_info.area" name="area" required="required" />&nbsp;&nbsp;&nbsp;&nbsp;平米</p>
						<p><b>面宽：&nbsp;&nbsp;</b><input type="number" step="0.01" v-model="shop_info.width" name="width" />&nbsp;&nbsp;&nbsp;&nbsp;米</p>
						<p><b>层高：&nbsp;&nbsp;</b><input type="number" step="0.01" v-model="shop_info.height" name="height" />&nbsp;&nbsp;&nbsp;&nbsp;米</p>
						<p><b>进深：&nbsp;&nbsp;</b><input type="number" step="0.01" v-model="shop_info.depth" name="depth" />&nbsp;&nbsp;&nbsp;&nbsp;米</p>
						<p>
							<b>楼层：&nbsp;&nbsp;</b>
							<select v-model="shop_info.min_floor" name="min_floor">
								<option>33</option>
								<option>32</option>
							    <option>31</option>
								<option>30</option>
								<option>29</option>
								<option>28</option>
								<option>27</option>
								<option>26</option>
								<option>25</option>
								<option>24</option>
							    <option>23</option>
								<option>22</option>
								<option>21</option>
								<option>20</option>
								<option>19</option>
								<option>18</option>
								<option>16</option>
								<option>17</option>
								<option>16</option>
								<option>15</option>
								<option>14</option>
								<option>13</option>
								<option>12</option>
								<option>11</option>
								<option>10</option>
								<option>9</option>
								<option>8</option>
								<option>7</option>
								<option>6</option>
								<option>5</option>
								<option>4</option>
								<option>3</option>
								<option>2</option>
								<option>1</option>
								<option>0</option>
								<option>-1</option>
								<option>-2</option>
								<option>-3</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;至
							<select v-model="shop_info.max_floor" name="max_floor">
							    <option>33</option>
								<option>32</option>
							    <option>31</option>
								<option>30</option>
								<option>29</option>
								<option>28</option>
								<option>27</option>
								<option>26</option>
								<option>25</option>
								<option>24</option>
							    <option>23</option>
								<option>22</option>
								<option>21</option>
								<option>20</option>
								<option>19</option>
								<option>18</option>
								<option>16</option>
								<option>17</option>
								<option>16</option>
								<option>15</option>
								<option>14</option>
								<option>13</option>
								<option>12</option>
								<option>11</option>
								<option>10</option>
								<option>9</option>
								<option>8</option>
								<option>7</option>
								<option>6</option>
								<option>5</option>
								<option>4</option>
								<option>3</option>
								<option>2</option>
								<option>1</option>
								<option>0</option>
								<option>-1</option>
								<option>-2</option>
								<option>-3</option>
							</select>
						</p>
						<p>
							<b>是否临街：&nbsp;&nbsp;</b>
							<select v-model="shop_info.is_street" name="is_street">
								<option>是</option>
								<option>否</option>
							</select>
						</p>
						<h2>价格信息</h2>
						<p>
							<b><span>*&nbsp;&nbsp;</span>月租金：&nbsp;&nbsp;</b>
							<input type="number" step="1" v-model="shop_info.monthly_rent" name="monthly_rent" required="required" />&nbsp;&nbsp;&nbsp;&nbsp;元
						</p>
						<p>
							<b><span>*&nbsp;&nbsp;</span>转让费：&nbsp;&nbsp;</b>
							<input type="number" step="0.1" v-model="shop_info.transfer_fee" name="transfer_fee" required="required" />&nbsp;&nbsp;&nbsp;&nbsp;万元
						</p>
						<p>
							<b>支付方式：&nbsp;&nbsp;</b>
							<input v-model="shop_info.method" name="method" />
							&nbsp;&nbsp;&nbsp;&nbsp;单位：月&nbsp;&nbsp;&nbsp;&nbsp;<i>押0付0即为面议</i>
						</p>
						<p>
							<b>剩余租期：&nbsp;&nbsp;</b>
							<input type="number" step="1" v-model="shop_info.time_left"  name="time_left"/>
							&nbsp;&nbsp;&nbsp;&nbsp;月
						</p>
						<h2>详细信息</h2>
						<p><b><span>*&nbsp;&nbsp;</span>店铺描述：&nbsp;&nbsp;</b></p>
						<p><textarea maxlength="1000" class="_form_textarea_discrib" v-model="shop_info.discrib" name="discrib" required="required"></textarea></p>
						<p>
							<b>配套设施：&nbsp;&nbsp;</b>
							货梯<input type="checkbox" value="货梯" name="p0"  v-bind:checked="check_list[0]" />
							扶梯<input type="checkbox" value="扶梯"  name="p1" v-bind:checked="check_list[1]"/>
							客梯<input type="checkbox" value="客梯" name="p2" v-bind:checked="check_list[2]"/>
							可明火<input type="checkbox" value="可明火" name="p3" v-bind:checked="check_list[3]"/>
							380V<input type="checkbox" value="380V" name="p4" v-bind:checked="check_list[4]"/>
							管煤<input type="checkbox" value="管煤" name="p5" v-bind:checked="check_list[5]"/>
							排污<input type="checkbox" value="排污" name="p6" v-bind:checked="check_list[6]"/>
							排烟<input type="checkbox" value="排烟" name="p7" v-bind:checked="check_list[7]"/>
							上水<input type="checkbox" value="上水" name="p8" v-bind:checked="check_list[8]"/>
							下水<input type="checkbox" value="下水" name="p9" v-bind:checked="check_list[9]"/>
							外摆区<input type="checkbox" value="外摆区" name="p10" v-bind:checked="check_list[10]"/>
							暖气<input type="checkbox" value="暖气" name="p11" v-bind:checked="check_list[11]" />
							网络<input type="checkbox" value="网络" name="p12" v-bind:checked="check_list[12]"/>
							天然气<input type="checkbox" value="天然气" name="p13" v-bind:checked="check_list[13]" />
							停车位<input type="checkbox" value="停车位" name="p14" v-bind:checked="check_list[14]"/>
							中央空调<input type="checkbox" value="中央空调" name="p15" v-bind:checked="check_list[15]"/>
						</p>
						<p>
							<b>客流人群：&nbsp;&nbsp;</b>
							办公人群<input type="checkbox" value="办公人群" name="p16" v-bind:checked="check_list[16]"/>
							学生人群<input type="checkbox" value="学生人群" name="p17" v-bind:checked="check_list[17]"/>
							居民人群<input type="checkbox" value="居民人群" name="p18" v-bind:checked="check_list[18]"/>
							旅游人群<input type="checkbox" value="旅游人群" name="p19" v-bind:checked="check_list[19]"/>
							其他<input type="checkbox" value="其他" name="p20" v-bind:checked="check_list[20]"/>
						</p>
						<div v-if="user_permission == 100 || user_permission == 101">
						<h2>管理信息</h2>
						<p>
							<b>审核状态：&nbsp;&nbsp;</b>
							<select v-model="shop_info.is_approval" name="is_approval" required="required">
								<option>已审核</option>
								<option>未审核</option>
							</select>
						</p>
						<p>
							<b>转出状态：&nbsp;&nbsp;</b>
							<select v-model="shop_info.is_down" name="is_down" required="required">
								<option>已转出</option>
								<option>未转出</option>
							</select>
						</p>
						<p>
							<b>推广状态：&nbsp;&nbsp;</b>
							<select v-model="shop_info.is_advertise" name="is_advertise" required="required">
								<option>是</option>
								<option>否</option>
							</select>
						</p>
						<p>
							<b>推广时间：&nbsp;&nbsp;</b>
							<input type="date" v-model="shop_info.time_advertise" name="time_advertise" required="required" />
						</p>
						<p>
							<b>店铺信息创建时间：&nbsp;&nbsp;</b>
							<input type="datetime" v-model="shop_info.time" name="time" required="required" />
							<i>日期格式：xxxx-xx-xx xx:xx:xx</i>
						</p>
						</div>
						<p v-if="user_permission == 100 || user_permission == 101">
							<button type="submit">修改</button>
							<button type="button" onclick="window.history.back()">返回</button>
						</p>
					</form>
					<p v-if="user_permission == 200">
						<button type="button" v-on:click="send_down()">标记转出</button>
						<button type="button" onclick="window.history.back()">返回</button>
					</p>
				</div>
				<div class="card">
					<h1>店铺图片</h1>
					<div class="card_image_div" v-for="i in shop_image">
						<img v-bind:src="i.url" />
					</div>
					<div style="clear: both;"></div>
				</div>
			</div>
		</div>
	</body>
	<script>
		var page_shop = new Vue({
			el:'#main',
			data: {
				username:"用户名",
				user_permission:200,
				shop_info:{id:0, title:"", discrib:"", address:"", province:"", city:"", district:"",
						   zone:"", area:0, industry:"", owner_name:"", owner_phone:99999999999, monthly_rent:0, transfer_fee:0, 
						   is_approval:"", is_advertise:"", time:"", time_advertise:"", status:"", type:"", min_floor:0, 
						   max_floor:0, is_street:"", width:0, height:0, depth:0, method:"", time_left:0, supporting_facilities:"", 
						   customer_population:"", is_down:""
						  },
				shop_image:[{"url":"#","id":0,"user_id":0}],
				//表单所需要的数据
				province_list:[],
				city_list:[],
				district_list:[],
				zone_list:[],
				type_0_list:[],
				type_1_list:[],
				type_0:"",
				type_1:"",
				check_list:[],
				
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
							var data = 'cookie=' + self.get_cookie('login') + '&id=' + <?php echo $Id ?>;
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
									self.get_infomation('get_pronvince_list');
									self.get_infomation('get_city_list');
									self.get_infomation('get_district_list');
									self.get_infomation('get_zone_list');
									self.split_industry();
									self.get_infomation('get_type_0_list');
									self.get_infomation('get_type_1_list');
									self.split_s_c();
								}
							}
							xmlhttp.open("POST", "../requests_ajax/get_shop_info.php", true);//异步post请求
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.send(data);
							break;
							
						//获取店铺图片
						case 'get_shop_image':
							this.shop_image = [];
							var xmlhttp = new XMLHttpRequest();
							var data = 'cookie=' + self.get_cookie('login') + '&id=' + <?php echo $Id ?>;
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
							var data = 'cookie=' + self.get_cookie('login') + '&province=' + self.shop_info.province;
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
							var data = 'cookie=' + self.get_cookie('login') + '&province=' + self.shop_info.province + '&city=' + self.shop_info.city;
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
							var data = 'cookie=' + self.get_cookie('login') + '&province=' + self.shop_info.province + '&city=' + self.shop_info.city + '&district=' + self.shop_info.district;
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
							
						default:
							console.log("无效的操作");
							break;
					}
				},
				
				//省变化
				changed_province() {
					var self = this;
					self.shop_info.city = "";
					self.shop_info.district = "";
					self.shop_info.zone = "";
					self.city_list = Array();
					self.district_list = Array();
					self.zone_list = Array();
					self.get_infomation('get_city_list');
				},
				
				//市变化
				changed_city() {
					var self = this;
					self.shop_info.district = "";
					self.shop_info.zone = "";
					self.district_list = Array();
					self.zone_list = Array();
					self.get_infomation('get_district_list');
				},
				
				//区变化
				changed_district() {
					var self = this;
					self.shop_info.zone = "";
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
					var temp = self.shop_info.industry;
					var arr = temp.split("-");
					self.type_0 = arr[0];
					self.type_1 = arr[1];
				},
				
				//拆分supporting_facilities和customer_population字段并初始化
				split_s_c() {
					var self = this;
					var temp = self.shop_info.supporting_facilities;
					var arr = temp.split("-");
					for(var i=0;i<arr.length;i++) {
						switch(arr[i]) {
							case "货梯":
								self.check_list[0] = "checked";
								break;
							case "扶梯":
								self.check_list[1] = "checked";
								break;
							case "客梯":
								self.check_list[2] = "checked";
								break;
							case "可明火":
								self.check_list[3] = "checked";
								break;
							case "380V":
								self.check_list[4] = "checked";
								break;
							case "管煤":
								self.check_list[5] = "checked";
								break;
							case "排污":
								self.check_list[6] = "checked";
								break;
							case "排烟":
								self.check_list[7] = "checked";
								break;
							case "上水":
								self.check_list[8] = "checked";
								break;
							case "下水":
								self.check_list[9] = "checked";
								break;
							case "外摆区":
								self.check_list[10] = "checked";
								break;
							case "暖气":
								self.check_list[11] = "checked";
								break;
							case "网络":
								self.check_list[12] = "checked";
								break;
							case "天然气":
								self.check_list[13] = "checked";
								break;
							case "停车位":
								self.check_list[14] = "checked";
								break;
							case "中央空调":
								self.check_list[15] = "checked";
								break;
						}
					}
					var temp = self.shop_info.customer_population;
					var arr = temp.split("-");
					for(var i=0;i<arr.length;i++) {
						switch(arr[i]) {
							case "办公人群":
								self.check_list[16] = "checked";
								break;
							case "学生人群":
								self.check_list[17] = "checked";
								break;
							case "居民人群":
								self.check_list[18] = "checked";
								break;
							case "旅游人群":
								self.check_list[19] = "checked";
								break;
							case "其他":
								self.check_list[20] = "checked";
								break;
						}
					}
				},
				
				//标记为转出
				send_down() {
					var self = this;
					var xmlhttp = new XMLHttpRequest();
					var data = 'cookie=' + self.get_cookie('login') + '&id=' + self.shop_info.id;
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							var response = JSON.parse(xmlhttp.responseText);
							if(response.status == 100) {
								window.alert(response.describe);
								window.location.href="./shop_list.html";
							}
						}
					}
					xmlhttp.open("POST", "../requests_ajax/send_down_shop.php", true);//异步post请求
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send(data);
				}
				
			},
			created() {
				this.check_login();
				this.get_infomation('name');
				this.get_infomation('permission');
				this.get_infomation('get_shop_image');
				this.get_infomation('get_shop_info');
				
			}
		});
	</script>
</html>
