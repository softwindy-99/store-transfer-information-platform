// pages/shop_upload/shop_upload.js
Page({
  data: {
    text_image:"点击此处选择图片",
    imageUrlList: [],
    region: ['北京市', '北京市', '东城区'],
    zoneList: [123, 456],
    zoneIndex: 0,
    address: '',
    area: '',
    typeList: [
      ['不限'],
      ['不限']
    ],
    typePick: [0, 0],
    monthly_rent: '',
    transfer_fee: '',
    title: '',
    discrib: '',
    owner_name: '',
    owner_phone: '',
    width: '',
    height: '',
    depth: '',
    statusList: ['经营中', '闲置中'],
    statusIndex: 0,
    shopTypeList: ['商业街商铺', '写字楼配套', '社区底商', '档口摊位', '临街门面', '购物百货中心', '其他'],
    shopTypeIndex: 6,
    shopFloorList: [
      [-3, -2, -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 , 14, 15, 16, 17, 18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33],
      [-3, -2, -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 , 14, 15, 16, 17, 18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33]
    ],
    shopFloorIndexs: [3, 3],
    isStreetList: ['是', '否'],
    isStreetIndex: 1,
    methodList: [
      [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
      [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
    ],
    methodIndexs: [0, 0],
    timeLeftList: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
    timeLeftIndex: 0,
    pts: [{
        name: 'p0',
        value: '货梯',
        checked: false
      },
      {
        name: 'p1',
        value: '扶梯',
        checked: false
      },
      {
        name: 'p2',
        value: '客梯',
        checked: false
      },
      {
        name: 'p3',
        value: '可明火',
        checked: false
      },
      {
        name: 'p4',
        value: '380V',
        checked: false
      },
      {
        name: 'p5',
        value: '管煤',
        checked: false
      },
      {
        name: 'p6',
        value: '排污',
        checked: false
      },
      {
        name: 'p7',
        value: '排烟',
        checked: false
      },
      {
        name: 'p8',
        value: '上水',
        checked: false
      },
      {
        name: 'p9',
        value: '下水',
        checked: false
      },
      {
        name: 'p10',
        value: '外摆区',
        checked: false
      },
      {
        name: 'p11',
        value: '暖气',
        checked: false
      },
      {
        name: 'p12',
        value: '网络',
        checked: false
      },
      {
        name: 'p13',
        value: '天然气',
        checked: false
      },
      {
        name: 'p14',
        value: '停车位',
        checked: false
      },
      {
        name: 'p15',
        value: '中央空调',
        checked: false
      }
    ],
    kls: [{
        name: 'p16',
        value: '办公人群',
        checked: false
      },
      {
        name: 'p17',
        value: '学生人群',
        checked: false
      },
      {
        name: 'p18',
        value: '居民人群',
        checked: false
      },
      {
        name: 'p19',
        value: '旅游人群',
        checked: false
      },
      {
        name: 'p20',
        value: '其他',
        checked: false
      }
    ]
  },
  onLoad: function (options) {
    this.getZoneList();
    this.getTypeListOne();
  },
  getZoneList: function () {
    const self = this;
    wx.request({
      method: 'GET',
      url: 'https://zay159.xyz/wx/get_zone_list.php',
      data: {
        province: self.data.region[0],
        city: self.data.region[1],
        district: self.data.region[2],
      },
      success: function (res) {
        if (res.data.status == 100) {
          self.data.zoneList = res.data.result;
          self.data.zoneIndex = 0;
          self.setData(self.data);
        }
      }
    });
  },
  getTypeListOne: function () {
    const self = this;
    wx.request({
      method: 'GET',
      url: 'https://zay159.xyz/wx/get_industry_0_list.php',
      success: function (res) {
        if (res.data.status == 100) {
          self.data.typeList[0] = res.data.result;
          self.setData(self.data);
        }
      }
    });
  },
  getTypeListTwo: function (e) {
    if (e.detail.column == 0) {
      const self = this;
      wx.request({
        method: 'GET',
        url: 'https://zay159.xyz/wx/get_industry_1_list.php',
        data: {
          industry_0: self.data.typeList[0][e.detail.value]
        },
        success: function (res) {
          if (res.data.status == 100) {
            self.data.typeList[1] = res.data.result;
            self.data.typePick[0] = e.detail.value;
            self.data.typePick[1] = 0;
            self.setData(self.data);
          }
        }
      });
    }
  },
  bindRegionChange: function (e) {
    this.data.region = e.detail.value;
    this.setData(this.data);
    this.getZoneList();
  },
  bindZoneSelector: function (e) {
    this.data.zoneIndex = e.detail.value;
    this.setData(this.data);
  },
  bindTypeSelector: function (e) {
    this.data.typePick = e.detail.value;
    this.setData(this.data);
  },
  bindStatusSelector: function (e) {
    this.data.statusIndex = e.detail.value;
    this.setData(this.data);
  },
  bindShopTypeSelector: function (e) {
    this.data.shopTypeIndex = e.detail.value;
    this.setData(this.data);
  },
  bindShopFloorSelector: function (e) {
    this.data.shopFloorIndexs = e.detail.value;
    this.setData(this.data);
  },
  bindIsStreetSelector: function (e) {
    this.data.isStreetIndex = e.detail.value;
    this.setData(this.data);
  },
  bindMethodSelector: function (e) {
    this.data.methodIndexs = e.detail.value;
    this.setData(this.data);
  },
  bindTimeLeftSelector: function (e) {
    this.data.timeLeftIndex = e.detail.value;
    this.setData(this.data);
  },
  bindAddressInput: function (e) {
    this.data.address = e.detail.value;
    this.setData(this.data);
  },
  bindAreaInput: function (e) {
    this.data.area = e.detail.value;
    this.setData(this.data);
  },
  bindMonthlyRentInput: function (e) {
    this.data.monthly_rent = e.detail.value;
    this.setData(this.data);
  },
  bindTransferFeeInput: function (e) {
    this.data.transfer_fee = e.detail.value;
    this.setData(this.data);
  },
  bindTitleInput: function (e) {
    this.data.title = e.detail.value;
    this.setData(this.data);
  },
  bindDiscribInput: function (e) {
    this.data.discrib = e.detail.value;
    this.setData(this.data);
  },
  bindOwnerNameInput: function (e) {
    this.data.owner_name = e.detail.value;
    this.setData(this.data);
  },
  bindOwnerPhoneInput: function (e) {
    this.data.owner_phone = e.detail.value;
    this.setData(this.data);
  },
  bindWidthInput: function (e) {
    this.data.width = e.detail.value;
    this.setData(this.data);
  },
  bindHeightInput: function (e) {
    this.data.height = e.detail.value;
    this.setData(this.data);
  },
  bindDepthInput: function (e) {
    this.data.depth = e.detail.value;
    this.setData(this.data);
  },
  selPt: function (e) {
    this.data.pts[e.currentTarget.dataset.index].checked = !this.data.pts[e.currentTarget.dataset.index].checked;
    this.setData(this.data);
  },
  selKl: function (e) {
    this.data.kls[e.currentTarget.dataset.index].checked = !this.data.kls[e.currentTarget.dataset.index].checked;
    this.setData(this.data);
  },
  doSubmit: function () {
    const self = this;
    var p =Array();
    //数组映射
    for(var i=0;i<self.data.pts.length;i++) {
      if(self.data.pts[i].checked == false) {
        p[i] = "";
      }
      else {
        p[i] = self.data.pts[i].value;
      }
    }
    for(var i=0;i<self.data.kls.length;i++) {
      if(self.data.kls[i].checked == false) {
        p[i+16] = "";
      }
      else {
        p[i+16] = self.data.kls[i].value;
      }
    }
    wx.request({
      method: 'POST',
      url: 'https://zay159.xyz/wx/shop_upload.php',
      header: {
        'content-type': 'application/x-www-form-urlencoded' // 改变默认值为这个配置
        },
      data: {
        imageUrlList: self.data.imageUrlList,
        province: self.data.region[0],
        city: self.data.region[1],
        district: self.data.region[2],
        zone: self.data.zoneList[self.data.zoneIndex],
        address: self.data.address,
        area: Number(self.data.area),
        type_0: self.data.typeList[0][self.data.typePick[0]],
        type_1: self.data.typeList[1][self.data.typePick[1]],
        monthly_rent: Number(self.data.monthly_rent),
        transfer_fee: Number(self.data.transfer_fee),
        title: self.data.title,
        discrib: self.data.discrib,
        owner_name: self.data.owner_name,
        owner_phone: self.data.owner_phone,
        type: self.data.shopTypeList[self.data.shopTypeIndex],
        min_floor: self.data.shopFloorList[0][self.data.shopFloorIndexs[0]],
        max_floor: self.data.shopFloorList[1][self.data.shopFloorIndexs[1]],
        is_street: self.data.isStreetList[self.data.isStreetIndex],
        status: self.data.statusList[self.data.statusIndex],
        width: Number(self.data.width),
        height: Number(self.data.height),
        depth: Number(self.data.depth),
        method_0: self.data.methodList[0][self.data.methodIndexs[0]],
        method_1: self.data.methodList[1][self.data.methodIndexs[1]],
        time_left: self.data.timeLeftList[self.data.timeLeftIndex],
        //pts: self.data.pts,
       // kls: self.data.kls
       p0:p[0],
       p1:p[1],
       p2:p[2],
       p3:p[3],
       p4:p[4],
       p5:p[5],
       p6:p[6],
       p7:p[7],
       p8:p[8],
       p9:p[9],
       p10:p[10],
       p11:p[11],
       p12:p[12],
       p13:p[13],
       p14:p[14],
       p15:p[15],
       p16:p[16],
       p17:p[17],
       p18:p[18],
       p19:p[19],
       p20:p[20]
      },
      success: function (res) {
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
    });
  },
  // 上传图片
  chooseImage: function () {
    var self = this;
    self.data.imageUrlList = [];
    wx.chooseImage({
      count: 9,
      sizeType: [ 'compressed'],
      sourceType: ['album'],
      success (res) {
        // tempFilePath可以作为img标签的src属性显示图片
        const tempFilePaths = res.tempFilePaths
        for(var i=0;i<tempFilePaths.length;i++){
          //上传
          wx.uploadFile({
            filePath: tempFilePaths[i],
            name: 'image',
            url: 'https://zay159.xyz/wx/upload_image.php',
            success(e){
              //判断是否上传成功
              var data = JSON.parse(e.data);
              self.data.imageUrlList.push(data.url);
              self.data.text_image="图片已上传";
              self.setData(self.data);
            }
          });
        }
       
      }
    });
  }
})