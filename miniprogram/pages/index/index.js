// index.js
// 获取应用实例
const app = getApp();

Page({
  /* 数据 */
  data: {
    swiper: [], //轮播图
    region: app.data.region, //位置
    shop_advertise_list: [], //推广店铺
    rent_advertise_list: [], //推广求租
    advertisement_information_picker_text_list: ["行业", "商圈", "面积", "更多"], //筛选面板显示的文本
    industry_list: [["不限", "餐饮美食", "美容美发", "服饰鞋包", "专柜转让", "休闲娱乐", "百货超市", "生活服务", "电器通讯", "汽修美容", "医疗器械", "家居建材", "教育培训", "酒店宾馆", "公司工厂"],["不限"]], //行业筛选信息列表
    industry_list_index: [0,0], //行业筛选信息索引
    zone_list: [],//商圈筛选信息列表
    zone_list_index: 0,//商圈筛选信息索引
    area_list: ["不限", "20㎡以下", "20㎡-50㎡", "50㎡-100㎡", "100㎡-200㎡", "200㎡以上"],//面积筛选信息列表
    area_list_index: 0,//面积筛选信息索引
    more_list: ["更多", "月租升序", "月租降序"],
    more_list_index :0,
    search_text:"",
    display_shop: "block", //
    display_rent: "none", //
    shop_color: "rgb(255,255,255)",//
    shop_b_color: "rgb(20,150,220)", //
    rent_color: "rgba(0, 0, 0, 0.5)", //
    rent_b_color: "rgb(220,220,220)", //
    cover_display:"none"
  },

  /* 事件处理函数 */
  // 数据初始化
  Initialization() {
    this.data.region = app.data.region;
    this.setData(this.data);
    this.get_advertise_shop_list();
    this.get_advertise_rent_list();
    this.get_swiper_list();
    this.get_zone_list();
  },
  // 省市区选择器回调函数
  BindRegionChange(e) {
    var self = this;
    this.setData({
      region: e.detail.value,
    });
    app.data.region = this.data.region;
    self.get_advertise_shop_list();
    self.get_advertise_rent_list();
    self.get_zone_list();
  },
  // 行业选择器列变动回调函数
  BindColumnChange(e) {
    var string = this.data.industry_list[0][e.detail.value];
    var self = this;
    if(e.detail.column == 0) {
      wx.request({
        url: 'https://zay159.xyz/wx/get_industry_1_list.php',
        data: {
          industry_0: string
        }, 
        method: "GET",
        success(res) {
          if(res.data.status == 100) {
              self.data.industry_list[1] = res.data.result;
          }
          self.data.industry_list_index[0] = e.detail.value; 
          self.data.industry_list_index[1] = 0; 
          self.setData(self.data);
        }
      });
    }
   
  },
  // 行业选择器回调函数
  BindMultiPickerChange(e) {
    var self = this;
    var industry_0 = self.data.industry_list[0][e.detail.value[0]];//行业第一列
    var industry_1 = self.data.industry_list[1][e.detail.value[1]];//行业第二列
    self.data.industry_list_index[0] = e.detail.value[0];
    self.data.industry_list_index[1] = e.detail.value[1];
    if(industry_1 == "不限") {
      self.data.advertisement_information_picker_text_list[0] = industry_0;
    }
    else {
      self.data.advertisement_information_picker_text_list[0] = industry_1;
    }
    self.get_advertise_shop_list();
    self.get_advertise_rent_list();
    self.setData(self.data);
  },
  // 商圈选择器回调函数
  Bindchange_zone(e) {
    var self = this;
    var zone = self.data.zone_list[e.detail.value];
    self.data.zone_list_index = e.detail.value;
    self.data.advertisement_information_picker_text_list[1] = zone;
    self.get_advertise_shop_list();
    self.get_advertise_rent_list();
    self.setData(self.data);
  },
  // 面积选择器回调函数
  Bindchange_area(e) {
    var self = this;
    var area = self.data.area_list[e.detail.value];
    self.data.area_list_index = e.detail.value;
    self.data.advertisement_information_picker_text_list[2] = area;
    self.get_advertise_shop_list();
    self.get_advertise_rent_list();
    self.setData(self.data);
  },
  // 更多选择器回调函数
  Bindchange_more(e) {
    var self = this;
    var more = self.data.more_list[e.detail.value];
    self.data.more_list_index = e.detail.value;
    self.data.advertisement_information_picker_text_list[3] = more;
    self.get_advertise_shop_list();
    self.get_advertise_rent_list();
    self.setData(self.data);
  },
  // 跳转到店铺页
  to_shop(event) {
    var id = event.currentTarget.id;
    wx.navigateTo({
      url: '../shop/shop?id=' + id,
    });
  },
  // 跳转到求租页
  to_rent(event) {
    var id = event.currentTarget.id;
    wx.navigateTo({
      url: '../rent/rent?id=' + id,
    });
  },
  // 跳转到搜索页
  to_search() {
    var search_text = this.data.search_text;
    wx.redirectTo({
      url: '../search/search?search_text=' + search_text,
    });
  },
  // 跳转到首页
  to_index() {
    wx.redirectTo({
      url: '../index/index',
    });
  },
  // 跳转到店铺上传页
  to_shop_upload() {
    wx.navigateTo({
      url: '../shop_upload/shop_upload',
    });
  },
  // 跳转到求租上传页
  to_rent_upload() {
    wx.navigateTo({
      url: '../rent_upload/rent_upload',
    });
  },
  // 跳转到webkit
  to_webkit(event) {
    var url = event.currentTarget.id;
    console.log(url);
    wx.navigateTo({
      url: '../webkit/webkit?url=' + url,
    });
  },
  // 切换到店铺推广列表
  print_list_shop() {
    this.setData({
      display_shop: "block",
      display_rent: "none", 
      shop_color: "rgb(255,255,255)",
      shop_b_color: "rgb(20,150,220)", 
      rent_color: "rgba(0, 0, 0, 0.5)", 
      rent_b_color: "rgb(220,220,220)"
    });
  },
  // 切换到求租推广列表
  print_list_rent() {
    this.setData({
      display_shop: "none",
      display_rent: "block",
      shop_color: "rgba(0, 0, 0, 0.5)", 
      shop_b_color: "rgb(220,220,220)",
      rent_color: "rgb(255,255,255)",
      rent_b_color: "rgb(20,150,220)"
    });
  },
  // 打开cover
  open_cover() {
    this.data.cover_display = "block";
    this.setData(this.data);
  },
  // 关闭cover
  close_cover() {
    this.data.cover_display = "none";
    this.setData(this.data);
  },
  // 获取店铺推广列表
  get_advertise_shop_list() {
    var self = this;
    self.data.shop_advertise_list = Array();
     wx.request({
      url: 'https://zay159.xyz/wx/get_advertise_shop_list.php',
      data: {
        city: self.data.region[1],
        industry: self.data.advertisement_information_picker_text_list[0],
        zone: self.data.advertisement_information_picker_text_list[1],
        area: self.data.advertisement_information_picker_text_list[2],
        more: self.data.advertisement_information_picker_text_list[3]
      }, 
      method: 'GET',
      success(res) {
        if(res.data.status == 100) {
          for(var i=0;i<res.data.result.length;i++) {
            self.data.shop_advertise_list.push(res.data.result[i]);
          } 
        }
        self.setData(self.data);
      }
    });
  },
  // 获取求租推广列表
  get_advertise_rent_list() {
    var self = this;
    self.data.rent_advertise_list = Array();
    wx.request({
      url: 'https://zay159.xyz/wx/get_advertise_rent_list.php',
      data: {
        city: self.data.region[1],
        industry: self.data.advertisement_information_picker_text_list[0],
        zone: self.data.advertisement_information_picker_text_list[1],
        area: self.data.advertisement_information_picker_text_list[2],
        more: self.data.advertisement_information_picker_text_list[3]
      }, 
      method: "GET",
      success(res) {
        var temp = Object();//这里要用Object，否则前端无法通过键值对来访问数据
        if(res.data.status == 100) {
          for(var i=0;i<res.data.result.length;i++) {
            temp['id'] = res.data.result[i].id;
            temp['title'] = res.data.result[i].title; 
            temp['other'] = res.data.result[i].other; 
            if(temp['other'].length>32) {
              temp['other'] = temp['other'].substring(0,31) + "...";
            }
            temp['min_area'] = res.data.result[i].min_area; 
            temp['max_area'] = res.data.result[i].max_area; 
            self.data.rent_advertise_list.push(temp);
            temp = Object();
          } 
        }
        self.setData(self.data);
      }
    });
  },
  // 获取轮播图列表
  get_swiper_list() {
    const self = this;
    wx.request({
      url: 'https://zay159.xyz/wx/get_swiper.php',
      data: {
      },  
      method: 'GET',
      success(res) {
        var temp = Object();//这里要用Object，否则前端无法通过键值对来访问数据
        if(res.data.status == 100) {
          for(var i=0;i<res.data.image_url.length;i++) {
            temp['image_url'] = res.data.image_url[i];
            temp['target_url'] = res.data.target_url[i];
            self.data.swiper.push(temp);
            temp = Object();
          }
          
        }
        else {
          //TODO...
        }
        self.setData(self.data);
      }
    });
  },
  // 获取商圈列表
  get_zone_list() {
    var self = this;
    wx.request({
      url: 'https://zay159.xyz/wx/get_zone_list.php',
      data:{
        province: self.data.region[0],
        city: self.data.region[1],
        district: self.data.region[2]
      },
      method: "GET",
      success(res) {
        self.data.zone_list = res.data.result;
        self.setData(self.data);
      }
    });
  },
  
  /* 生命周期函数 */
  onReady() {
    setTimeout(this.Initialization,5000);
  }
})