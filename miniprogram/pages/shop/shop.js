// pages/shop/shop.js
Page({
    /* 数据 */
    data: {
        shop_info:{},
        shop_image:[],
        id:0,
    },
    /* 事件处理函数 */
    // 从服务器获取首页所需要的数据*
    Get_serverdata() {
        var self = this;
        //获取店铺信息
        wx.request({
          url: 'https://zay159.xyz/wx/get_shop_info.php',
          data: {
              id: self.data.id
          },
          method:"GET",
          success(res) {
            if(res.data.status == 100) {
                self.data.shop_info = res.data.result;

                /* 处理客流人群字段，使用顿号拼接 */
                self.data.shop_info.customer_population = [];
                let customer_population_list = self.data.shop_info.shop_customer_population.split('-');
                for (let i = 0; i < customer_population_list.length; i++) {
                    if (customer_population_list[i]) {
                        self.data.shop_info.customer_population.push(customer_population_list[i]);
                    }
                }
                self.data.shop_info.customer_population = self.data.shop_info.customer_population.join('、');

                /* 处理配套设施字段，使用顿号拼接 */
                self.data.shop_info.supporting_facilities = [];
                let supporting_facilities_list = self.data.shop_info.shop_supporting_facilities.split('-');
                for (let i = 0; i < supporting_facilities_list.length; i++) {
                    if (supporting_facilities_list[i]) {
                        self.data.shop_info.supporting_facilities.push(supporting_facilities_list[i]);
                    }
                }
                self.data.shop_info.supporting_facilities = self.data.shop_info.supporting_facilities.join('、');
            }
            console.log(self.data.shop_info);
            self.setData(self.data);
          }
        });
        //获取图片信息
        wx.request({
            url: 'https://zay159.xyz/wx/get_shop_image.php',
            data: {
                id: self.data.id
            },
            method:"GET",
            success(res) {
              if(res.data.status == 100) {
                  for(var i=0;i<res.data.result.length;i++)
                    self.data.shop_image.push(res.data.result[i]);
              }
              self.setData(self.data);
            }
          });
    },
    connectUs:function () {
        wx.makePhoneCall({
          phoneNumber: '15029002522',
        })
    },
    /* 生命周期函数 */
    onLoad:function (options) {
        this.data.id = options.id;
    },
    onReady() {
        this.Get_serverdata();
    }
});