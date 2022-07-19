// app.js
App({

  /* 数据 */
  data: {
    region: ['北京市', '北京市', '东城区'], //位置信息
    latitude:116.38,//这里的经纬度是天安门广场
    longitude:39.90
  },

  /* 事件处理函数 */
  // 查询、申请位置权限
  Permission() {
    const self = this;
    wx.getSetting({
      success(res) {
        if (!res.authSetting['scope.userLocation']) {
          wx.authorize({
            scope: 'scope.userLocation',
            success() {
              wx.getLocation({
                type: 'wgs84',
                success(res) {
                  self.latitude = res.latitude; //纬度
                  self.longitude = res.longitude; //经度
                  self.Get_city(self.latitude,self.longitude);//
                }
              })
            },
            fail() {
             
            },
            else() {
              
            }
          });
        } else {
          //已获取位置权限
          
          wx.getLocation({
            type: 'wgs84',
            success(res) {
              self.latitude = res.latitude; //纬度
              self.longitude = res.longitude; //经度
              self.Get_city(self.latitude,self.longitude);
            }
          });
        }
      },
      fail(res) {
        
      },
      else() {
        
      }
    });
  },
   // 用户所在城市查询
  Get_city(latitude,longitude) {
    const self = this;
    wx.request({
      //腾讯地图平台
      url: 'https://apis.map.qq.com/ws/geocoder/v1/?location=',
      //服务器需要的参数
      data: {
        location:latitude+","+longitude,
        key:""
      },  
      method: 'GET',
      success(res) {
        var province = res.data.result.address_component.province;
        var city = res.data.result.address_component.city;
        var district = res.data.result.address_component.district;
        self.data.region[0] = JSON.stringify(province);
        self.data.region[0] = self.data.region[0].replace('"',"");//这里是为了去掉value里的双引号，replace只会替换一次，所以执行两次
        self.data.region[0] = self.data.region[0].replace('"',"");
        self.data.region[1] = JSON.stringify(city);
        self.data.region[1] = self.data.region[1].replace ('"',"");
        self.data.region[1] = self.data.region[1].replace('"',"");
        self.data.region[2] = JSON.stringify(district);
        self.data.region[2] = self.data.region[2].replace('"',"");
        self.data.region[2] = self.data.region[2].replace('"',"");
      },
      fail(res) {
        //TODO...
      },
      else(res) {
        //TODO...
      }
    });
  },

  /* 生命周期函数 */
  onLaunch() {
    this.Permission();
  }

})