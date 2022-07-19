// pages/rent_upload/rent_upload.js
Page({

    /**
     * 页面的初始数据
     */
    data: {
      title:"",
        region: ['', '', ''], //位置
        min_rent:0,
        max_rent:0,
        min_area:0,
        max_area:0,
        name:"",
        phone:"",
        other:"",
        zone_list: [],//商圈筛选信息列表
    zone_list_index: 0,//商圈筛选信息索引
    },
    // 省市区选择器回调函数
  BindRegionChange(e) {
    var self = this;
    this.setData({
      region: e.detail.value,
    });
    self.get_zone_list();
  },
   // 商圈选择器回调函数
   Bindchange_zone(e) {
    var self = this;
    self.data.zone_list_index = e.detail.value;
    self.setData(self.data);
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
  doSubmit() {
    var self = this;
    self.setData(self.data);
    wx.request({
      url: 'https://zay159.xyz/wx/rent_upload.php',
      method:"POST",
      header: {
        'content-type': 'application/x-www-form-urlencoded' // 改变默认值为这个配置
        },
      data:{
        title:self.data.title,
        province:self.data.region[0],
        city:self.data.region[1],
        district:self.data.region[2],
        zone:self.data.zone_list[self.data.zone_list_index],
        name:self.data.name,
        phone:self.data.phone,
        min_monthly_rent:self.data.min_rent,
        max_monthly_rent:self.data.max_rent,
        min_area:self.data.min_area,
        max_area:self.data.max_area,
        other:self.data.other
      },
      success(res) {
        if (res.data.status == 100) {
          wx.showModal({  
            title: '提示',  
            content: '上传成功',  
            showCancel: false,
            success: function(res) {  
                if (res.confirm) {  
                  wx.navigateBack({
                    delta: 1
                  });
                };
            }  
        }) ;
        }
      }
    })
  },
    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function (options) {

    },

    /**
     * 生命周期函数--监听页面初次渲染完成
     */
    onReady: function () {

    },

    /**
     * 生命周期函数--监听页面显示
     */
    onShow: function () {

    },

    /**
     * 生命周期函数--监听页面隐藏
     */
    onHide: function () {

    },

    /**
     * 生命周期函数--监听页面卸载
     */
    onUnload: function () {

    },

    /**
     * 页面相关事件处理函数--监听用户下拉动作
     */
    onPullDownRefresh: function () {

    },

    /**
     * 页面上拉触底事件的处理函数
     */
    onReachBottom: function () {

    },

    /**
     * 用户点击右上角分享
     */
    onShareAppMessage: function () {

    }
})