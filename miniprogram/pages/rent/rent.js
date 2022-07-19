// pages/rent/rent.js
Page({

    /**
     * 页面的初始数据
     */
    data: {
        rent_info:[],
        id:0,
    },

    Get_serverdata() {
        var self = this;
        //获取求租信息
        wx.request({
          url: 'https://zay159.xyz/wx/get_rent_info.php',
          data: {
              id: self.data.id
          },
          method:"GET",
          success(res) {
            if(res.data.status == 100) {
                self.data.rent_info = res.data.result[0];
            }
            console.log(self.data.rent_info);
            self.setData(self.data);
          }
        });

    },

    connectUs:function () {
        wx.makePhoneCall({
          phoneNumber: '15029002522',
        })
    },
    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function (options) {
        this.data.id = options.id;
    },

    /**
     * 生命周期函数--监听页面初次渲染完成
     */
    onReady: function () {
        this.Get_serverdata();
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