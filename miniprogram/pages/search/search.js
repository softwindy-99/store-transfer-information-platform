// pages/search/search.js
const app = getApp();
Page({
    /* 数据 */
    data: {
        shop_list:[],
        rent_list:[],
        region: ['北京市', '北京市', '东城区'], //位置
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
        this.get_shop_list();
        this.get_rent_list();
        this.setData(this.data);
    },
    // 省市区选择器回调函数
    BindRegionChange(e) {
        var self = this;
        this.setData({
            region: e.detail.value,
        });
        app.data.region = this.data.region;
        self.get_shop_list();
        self.get_rent_list();
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
    // 搜索信息
    search() {
        this.get_shop_list();
        this.get_rent_list();
    },
    // 获取店铺列表
    get_shop_list() {
    var self = this;
    self.data.shop_list = Array();
     wx.request({
      url: 'https://zay159.xyz/wx/get_shop_list.php',
      data: {
       text: self.data.search_text,
       city:self.data.region[1],
       district: self.data.region[2]
      }, 
      method: 'GET',
      success(res) {
        if(res.data.status == 100) {
          for(var i=0;i<res.data.result.length;i++) {
            self.data.shop_list.push(res.data.result[i]);
          } 
        }
        self.setData(self.data);
      }
    });
    },
    // 获取求租列表
    get_rent_list() {
        var self = this;
        self.data.rent_list = Array();
         wx.request({
          url: 'https://zay159.xyz/wx/get_rent_list.php',
          data: {
           text: self.data.search_text,
           city:self.data.region[1],
           district: self.data.region[2],
          }, 
          method: 'GET',
          success(res) {
            if(res.data.status == 100) {
              for(var i=0;i<res.data.result.length;i++) {
                self.data.rent_list.push(res.data.result[i]);
              } 
            }
            self.setData(self.data);
          }
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
    /* 生命周期函数 */
    onLoad: function (options) {
        this.data.search_text = options.search_text;
    },
    onReady: function () {
        this.Initialization();
    },

})