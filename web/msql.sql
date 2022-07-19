-- MySQL dump 10.13  Distrib 5.7.34, for Linux (x86_64)
--
-- Host: localhost    Database: zay159_xyz
-- ------------------------------------------------------
-- Server version	5.7.34-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dinghaopu_image`
--

DROP TABLE IF EXISTS `dinghaopu_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinghaopu_image` (
  `dinghaopu_image_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片的ID',
  `dinghaopu_image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片的路径',
  `dinghaopu_image_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片的用户所属id',
  PRIMARY KEY (`dinghaopu_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户上传的图片';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinghaopu_image`
--

LOCK TABLES `dinghaopu_image` WRITE;
/*!40000 ALTER TABLE `dinghaopu_image` DISABLE KEYS */;
INSERT INTO `dinghaopu_image` VALUES (254,'https://zay159.xyz/upload_images/1637391505VfGObJEGz9Qiyphn.jpg','17'),(255,'https://zay159.xyz/upload_images/1637471843I7sXdp99x1FbaVyu.jpg','18'),(256,'https://zay159.xyz/upload_images/1637471843I7sXdp99x1FbaVyu.jpg','19'),(257,'https://zay159.xyz/upload_images/1637471843I7sXdp99x1FbaVyu.jpg','20'),(258,'https://zay159.xyz/upload_images/1637471843I7sXdp99x1FbaVyu.jpg','21'),(259,'https://zay159.xyz/upload_images/16375444272cqU15Rz7XRi63zW.jpg','25'),(260,'https://zay159.xyz/upload_images/1637544427hWaXzIfXLMUYBtAh.jpg','25'),(261,'https://zay159.xyz/upload_images/1637544427qkauXzZIPfRYfsLm.jpg','25'),(262,'https://zay159.xyz/upload_images/1637561099WmW2SvwJTeWjJQMq.jpg','31'),(263,'https://zay159.xyz/upload_images/1637561099lPCaEJtzrnojDFMa.jpg','31'),(264,'https://zay159.xyz/upload_images/16375610997rXMFwNN1kbvhhcd.jpg','31'),(265,'https://zay159.xyz/upload_images/1637561194EGWhUaVLFbncCTRn.jpg','32'),(266,'https://zay159.xyz/upload_images/1637561194tFWw89ZQnLylvyXu.jpg','32'),(267,'https://zay159.xyz/upload_images/1637561799BcA47fYgIeFH18j8.jpg','34'),(268,'https://zay159.xyz/upload_images/1637561799aS41NHtAYZ58qYCn.jpg','34'),(269,'https://zay159.xyz/upload_images/1637561799StpUtOmaiY2NJ7Tw.jpg','34'),(270,'https://zay159.xyz/upload_images/1637564128dL5gfrH3EAliKAdg.jpg','35'),(271,'https://zay159.xyz/upload_images/1637564128c0cnEDQjMgTSeN4x.jpg','35'),(272,'https://zay159.xyz/upload_images/1637564128LaJ6zaHuqAer3cEd.jpg','35'),(273,'https://zay159.xyz/upload_images/1637564700uM6DLQOpmwl9DSCJ.jpg','34'),(274,'https://zay159.xyz/upload_images/1637747286qEoFZsqL3xgYkqSw.jpg','37'),(275,'https://zay159.xyz/upload_images/1637747286SuPB2FY9kOmV6x1y.jpg','37'),(276,'https://zay159.xyz/upload_images/1637806370nnUlN7NIiFU8OUOg.png','38'),(277,'https://zay159.xyz/upload_images/1637806370uykH0QlScidgDGly.png','38'),(278,'https://zay159.xyz/upload_images/1637806370IR0slBCYfd26Gyr9.png','38'),(279,'https://zay159.xyz/upload_images/1637808223TI5AmQeWhRupi6m8.jpg','39'),(280,'https://zay159.xyz/upload_images/1637808223EFvGuowAlSKtW1as.jpg','39'),(281,'https://zay159.xyz/upload_images/1637808223vV7HNYQ6T3skZg67.jpg','39'),(282,'https://zay159.xyz/upload_images/16378082231RBCn5G9Awfijt9t.jpg','39'),(283,'https://zay159.xyz/upload_images/1637809142nwXe9SxrjpBSKQwP.jpg','40'),(284,'https://zay159.xyz/upload_images/16378091429fDMouoYUs02ke9o.jpg','40'),(285,'https://zay159.xyz/upload_images/16378091423JPqUBL7Vbd84cXh.jpg','40'),(286,'https://zay159.xyz/upload_images/1637809142c3FtEGly2ycMYZDy.jpg','40'),(287,'https://zay159.xyz/upload_images/1637809386EX4DoP6K6yPWD6Nc.jpg','41'),(288,'https://zay159.xyz/upload_images/1637809386M405lmboqxrbXDeb.jpg','41'),(289,'https://zay159.xyz/upload_images/16378093864MKWLxJ85lpIGXf0.jpg','41'),(290,'https://zay159.xyz/upload_images/163780938685CHTrfI62UD7InU.jpg','41'),(291,'https://zay159.xyz/upload_images/1637809386fFbens0lwD08iUcj.jpg','41'),(292,'https://zay159.xyz/upload_images/1637809386sAxml0ihEzSgX7nM.jpg','41'),(293,'https://zay159.xyz/upload_images/1637809386nnzSlu1zdZCb9v3q.jpg','41'),(294,'https://zay159.xyz/upload_images/16378093863Q68jDsygc83pnAB.jpg','41'),(295,'https://zay159.xyz/upload_images/16378093860AhVbf85ZsHV3u1l.jpg','41'),(296,'https://zay159.xyz/upload_images/1637810600m5uHkEE6n9Tk9kFM.jpg','42'),(297,'https://zay159.xyz/upload_images/1637810600i7ylNfk5k5kGVVJE.jpg','42'),(298,'https://zay159.xyz/upload_images/1637810600VK1vCh11SkJFtTem.jpg','42'),(299,'https://zay159.xyz/upload_images/1637810600AGRDHHwZPosKEROn.jpg','42'),(300,'https://zay159.xyz/upload_images/1637819909lQ5VJfawCz5AfyZv.jpg','43'),(301,'https://zay159.xyz/upload_images/1637819909MSOkTmt7VT4AezOq.jpg','43'),(302,'https://zay159.xyz/upload_images/1637820355T1DO62ynMV9QJPwZ.jpg','44'),(303,'https://zay159.xyz/upload_images/1637820355ur1c213mY21rRqBS.jpg','44'),(304,'https://zay159.xyz/upload_images/16378203550uVIyPsuXCWDOKQW.jpg','44'),(305,'https://zay159.xyz/upload_images/1637820355eHiKpcTRMXTHAu3l.jpg','44'),(306,'https://zay159.xyz/upload_images/1637820355njeQweuUYAZwiRMW.jpg','44'),(307,'https://zay159.xyz/upload_images/1637820355Om3X1NGcPruEHumh.jpg','44'),(308,'https://zay159.xyz/upload_images/1637831642E9iVzifKQpztRyNF.jpg','45'),(309,'https://zay159.xyz/upload_images/16378321816uSqJ1i1HRyMuJWz.jpg','46'),(310,'https://zay159.xyz/upload_images/1637833257HoFkFgTLXTFvOI8M.jpg','49'),(312,'https://zay159.xyz/upload_images/1638009999A69RUFcvl7Nd8W0c.jpg','51'),(313,'https://zay159.xyz/upload_images/1638009999JrGXIrzGC4BdIYK8.jpg','51'),(314,'https://zay159.xyz/upload_images/1638009999Oo8oVQvcqdtULZYS.jpg','51'),(315,'https://zay159.xyz/upload_images/1638009999s9dxJ99dT52ugZHi.jpg','51'),(316,'https://zay159.xyz/upload_images/1638183271iDepdMEYIX3oFpYb.jpg','52'),(317,'https://zay159.xyz/upload_images/1638183271cbQQSeG9jEeFFf6R.jpg','52'),(318,'https://zay159.xyz/upload_images/1638183271nfWEHCixqZAYixhc.jpg','52'),(319,'https://zay159.xyz/upload_images/163818327173btHkl4a90dPl8D.jpg','52'),(320,'https://zay159.xyz/upload_images/1638184236vWuonsKKxeGookl3.jpg','53'),(321,'https://zay159.xyz/upload_images/1638184236JqTH76XcbkOgWErp.jpg','53'),(322,'https://zay159.xyz/upload_images/1638184236inem7NrrYDA1zO43.jpg','53'),(323,'https://zay159.xyz/upload_images/1638184236T8eNqGKYrZGNLPMQ.jpg','53'),(324,'https://zay159.xyz/upload_images/1638184907wo0HDKhDxPGh4p33.png','54'),(325,'https://zay159.xyz/upload_images/1638184907NilTPIxmLLQKKQPX.png','54'),(326,'https://zay159.xyz/upload_images/16381849075H6HlwzmlZ52ipRz.png','54'),(327,'https://zay159.xyz/upload_images/1638185357KnABn6QVf1EFuiyn.jpg','55'),(328,'https://zay159.xyz/upload_images/1638185357N3PQvJAi9TZgEjo2.jpg','55'),(329,'https://zay159.xyz/upload_images/1638185774lTX4UuCVCOQYnynn.jpg','56'),(330,'https://zay159.xyz/upload_images/1638185774rlNRYgJR1E5avawI.jpg','56'),(331,'https://zay159.xyz/upload_images/1638186128nBYJMAAqAPsS9N4f.jpg','57'),(332,'https://zay159.xyz/upload_images/1638186128BSOxDmnzH8MTrTAi.jpg','57'),(333,'https://zay159.xyz/upload_images/1638186128NIt2iTibKuAzynWq.jpg','57'),(334,'https://zay159.xyz/upload_images/163818612838cSw0NPg17mVWy1.png','57'),(335,'https://zay159.xyz/upload_images/1638186530yjD7Ihbcj7Mm6zFY.jpg','58'),(336,'https://zay159.xyz/upload_images/1638186530i3KTBEljAuWv6kYA.jpg','58'),(337,'https://zay159.xyz/upload_images/1638186820XPbyRCW9IvCdeksh.jpg','59'),(338,'https://zay159.xyz/upload_images/1638186820XMJKeUPsHKM7MgRz.jpg','59'),(339,'https://zay159.xyz/upload_images/1638187507F3jySsYBcvhEGmzr.jpg','60'),(340,'https://zay159.xyz/upload_images/16381875072jsiEiaHaXElCiKY.jpg','60'),(341,'https://zay159.xyz/upload_images/1638188063Ivf9hwwrKL48BQ5r.jpg','61'),(342,'https://zay159.xyz/upload_images/16381880636eyATan9Tw1Oghdu.jpg','61'),(343,'https://zay159.xyz/upload_images/1638188397dxFEiLIk7Kb1Qhna.jpg','62'),(344,'https://zay159.xyz/upload_images/16381883971sgnoZwBMYgERfNX.jpg','62'),(345,'https://zay159.xyz/upload_images/1638190155SAYweiy1VRkvat6D.jpg','63'),(346,'https://zay159.xyz/upload_images/16381901554Ldvv4SVcNBXQsbD.jpg','63'),(347,'https://zay159.xyz/upload_images/1638190155uHRAWV1hg0gRXXnM.jpg','63'),(348,'https://zay159.xyz/upload_images/16382738604SmAsXdSzdP0e5GB.jpg','64'),(349,'https://zay159.xyz/upload_images/1638340023KulmB7Rw8WrU9c4M.jpg','45'),(350,'https://zay159.xyz/upload_images/1638340055u0C0tfFOG1DUmLX1.jpg','45'),(351,'https://zay159.xyz/upload_images/1638342123Pde2yR15n8btfldC.jpg','65'),(352,'https://zay159.xyz/upload_images/1638342123rNmRzkM0Abc4V6zM.jpg','65'),(353,'https://zay159.xyz/upload_images/1638342123iy8hrTeXcqQfNHN4.jpg','65'),(354,'https://zay159.xyz/upload_images/1638342123KhlNWr4I0SNvz6iD.jpg','65'),(355,'https://zay159.xyz/upload_images/1638342123X2OrFxdzFbepOIzh.jpg','65'),(356,'https://zay159.xyz/upload_images/1638342123nLoMF93p9BiDC9h0.jpg','65'),(357,'https://zay159.xyz/upload_images/1638342123AZTXbYDXb7qmhiRZ.jpg','65'),(358,'https://zay159.xyz/upload_images/1638342123FAiPiHHrNobq4LDq.jpg','65'),(359,'https://zay159.xyz/upload_images/1638342123KXHpTnvNZaigD7Lp.jpg','65'),(360,'https://zay159.xyz/upload_images/1638343172cwUd1HsMxrTeOCAG.jpg','66'),(361,'https://zay159.xyz/upload_images/1638343172WeB0Ix7XU7LThpQs.jpg','66'),(362,'https://zay159.xyz/upload_images/1638343172li0wHrpdY3UH5lnW.jpg','66'),(363,'https://zay159.xyz/upload_images/1638343172eN93swrU9p6OzFQK.jpg','66'),(364,'https://zay159.xyz/upload_images/16383431722XB1VQmoUDXGQIAs.jpg','66'),(365,'https://zay159.xyz/upload_images/1638343172NpIuxglk2Zoy7LUN.jpg','66'),(366,'https://zay159.xyz/upload_images/1638343172lqgY8xSvFBsQ2T9H.jpg','66'),(367,'https://zay159.xyz/upload_images/1638343172MnCV7Y4DdfCMLnYz.jpg','66'),(368,'https://zay159.xyz/upload_images/16383440694PUsBIozvtusAw4H.jpg','67'),(369,'https://zay159.xyz/upload_images/1638344069ZzODZ9yObgcZgOH5.jpg','67'),(370,'https://zay159.xyz/upload_images/1638344069IDcF18zNyyWbEdUX.jpg','67'),(371,'https://zay159.xyz/upload_images/1638344069HPW7KNrltK7tXn5J.jpg','67'),(372,'https://zay159.xyz/upload_images/1638344069hUEE7SuuevXXBRmT.jpg','67'),(373,'https://zay159.xyz/upload_images/1638344504Bn7je7TOawLWxIgo.jpg','68'),(374,'https://zay159.xyz/upload_images/1638344504C6xi7nR6WYEPf89y.jpg','68'),(375,'https://zay159.xyz/upload_images/1638344504e2fbwC15ecbXR3qB.jpg','68'),(376,'https://zay159.xyz/upload_images/1638344504Qiu7PmthpQrHGIML.jpg','68'),(377,'https://zay159.xyz/upload_images/1638344504cWm3HYJzzwf28OUp.jpg','68'),(378,'https://zay159.xyz/upload_images/1638414715WQHXRGmcRUdUVxY5.jpg','69'),(379,'https://zay159.xyz/upload_images/16384147151oYvZVQJeGKf2J6Y.jpg','69'),(380,'https://zay159.xyz/upload_images/1638414715osGDIlwunFH0yfxf.jpg','69'),(381,'https://zay159.xyz/upload_images/1638414715ArIOvj6Uyo3QT8f4.jpg','69'),(382,'https://zay159.xyz/upload_images/16384161037s1YWeAftDIBsj2d.jpg','70'),(383,'https://zay159.xyz/upload_images/1638416103yw9kur6eqcpbA9AW.jpg','70'),(384,'https://zay159.xyz/upload_images/1638416103UADylfgHJxA48HLs.jpg','70'),(385,'https://zay159.xyz/upload_images/1638431494JbPtr0um38tc9MhE.jpg','71'),(386,'https://zay159.xyz/upload_images/1638431494cbOFbImAoPHGBglv.jpg','71'),(387,'https://zay159.xyz/upload_images/1638431494YQf5ESoxrobdfBkG.jpg','71'),(388,'https://zay159.xyz/upload_images/16384314941Asa5LM2mRrnMwsO.jpg','71'),(389,'https://zay159.xyz/upload_images/1638433041AINeikAEVnQZxiso.jpg','72'),(390,'https://zay159.xyz/upload_images/1638433041EFpzYu685vfr6GeV.jpg','72'),(391,'https://zay159.xyz/upload_images/16384330416HnaVu02j6SAtkGB.jpg','72'),(392,'https://zay159.xyz/upload_images/1638435118Z6QmtpAM2BY3GJiw.jpg','73'),(393,'https://zay159.xyz/upload_images/1638435118EFToVmUcPNPfi5Pu.jpg','73'),(394,'https://zay159.xyz/upload_images/1639117574sUOwfkH5VBennEzj.jpg','75'),(395,'http://zay159.xyz/upload_images/1639117652kpzW6K3XgW0i7EHt.jpg','76');
/*!40000 ALTER TABLE `dinghaopu_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinghaopu_rent`
--

DROP TABLE IF EXISTS `dinghaopu_rent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinghaopu_rent` (
  `dinghaopu_rent_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '求租信息的ID',
  `dinghaopu_rent_is_approval` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '未审核' COMMENT '求租信息的审核状态，值为未审核或已审核',
  `dinghaopu_rent_is_down` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '未完结' COMMENT '是否已完结，值为已完结或未完结',
  `dinghaopu_rent_time` datetime NOT NULL COMMENT '需求提交的日期',
  `dinghaopu_rent_is_advertise` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '否' COMMENT '是否处于推广，值为是或否',
  `dinghaopu_rent_time_advertise` date DEFAULT NULL COMMENT '开始推广的日期，年月日',
  `dinghaopu_rent_title` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '求租信息的标题',
  `dinghaopu_rent_city` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '需求店铺的城市',
  `dinghaopu_rent_province` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '省份',
  `dinghaopu_rent_district` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '需求店铺的区域',
  `dinghaopu_rent_zone` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '需求店铺的地段',
  `dinghaopu_rent_industry` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '意向行业',
  `dinghaopu_rent_min_monthly_rent` int(11) NOT NULL COMMENT '最低月租',
  `dinghaopu_rent_max_monthly_rent` int(11) NOT NULL COMMENT '最大月租',
  `dinghaopu_rent_min_area` float NOT NULL COMMENT '最低面积',
  `dinghaopu_rent_max_area` float NOT NULL COMMENT '最大面积',
  `dinghaopu_rent_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT '求租信息的联系人',
  `dinghaopu_rent_phone` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '联系人的电话',
  `dinghaopu_rent_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '需求说明',
  PRIMARY KEY (`dinghaopu_rent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='求租信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinghaopu_rent`
--

LOCK TABLES `dinghaopu_rent` WRITE;
/*!40000 ALTER TABLE `dinghaopu_rent` DISABLE KEYS */;
INSERT INTO `dinghaopu_rent` VALUES (5,'已审核','未完结','2021-11-22 09:40:34','否','2021-01-01','餐饮店','成都市','四川省','其他','其他','餐饮美食-餐馆',3000,7000,50,100,'吴先生','15338209090',''),(7,'已审核','未完结','2021-11-22 14:07:52','否','2021-01-01','测试标题——求租','西安市','陕西省','未央区','龙首村','服饰鞋包-服装店',2000,8000,20,40,'王五','10001','无'),(8,'已审核','已完结','2021-11-22 14:18:34','是','2021-11-22','测试标题','西安市','陕西省','未央区','凤城四路','不限-不限',2000,8000,10,20,'王五','10086','无'),(10,'已审核','未完结','2021-11-25 11:15:22','是','2021-01-01','找50-80平餐饮店','西安市','陕西省','新城区','其他','餐饮美食-餐馆',1500,2500,50,80,'王','111','找临街铺面'),(11,'已审核','未完结','2021-12-01 17:19:54','是','2021-01-01','找20平左右的美甲店','西安市','陕西省','未央区','其他','美容美发-美甲店',1500,2500,15,25,'王','222','');
/*!40000 ALTER TABLE `dinghaopu_rent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinghaopu_shop`
--

DROP TABLE IF EXISTS `dinghaopu_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinghaopu_shop` (
  `dinghaopu_shop_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店铺ID',
  `dinghaopu_shop_is_approval` varchar(7) CHARACTER SET utf8 NOT NULL DEFAULT '未审核' COMMENT '店铺信息是否已审核，值为已审核或未审核',
  `dinghaopu_shop_is_down` varchar(7) CHARACTER SET utf8 NOT NULL DEFAULT '未转出' COMMENT '店铺是否转出，值为已转出或未转出',
  `dinghaopu_shop_time` datetime NOT NULL DEFAULT '1970-01-01 00:00:00' COMMENT '店铺信息提交的时间',
  `dinghaopu_shop_is_advertise` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '否' COMMENT '店铺是否处于推广状态，值为是或否',
  `dinghaopu_shop_time_advertise` date NOT NULL DEFAULT '2021-01-01' COMMENT '店铺开始推广的日期，年月日',
  `dinghaopu_shop_title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '店铺房源的标题',
  `dinghaopu_shop_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '店铺地址',
  `dinghaopu_shop_monthly_rent` int(15) NOT NULL COMMENT '店铺的月租金，0为面议，单位元',
  `dinghaopu_shop_transfer_fee` float NOT NULL COMMENT '店铺的转让费，0为面议，单位万元',
  `dinghaopu_shop_owner_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT '店主的名字',
  `dinghaopu_shop_owner_phone` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '店主的电话',
  `dinghaopu_shop_discrib` varchar(1023) COLLATE utf8_unicode_ci NOT NULL COMMENT '店铺描述',
  `dinghaopu_shop_area` float NOT NULL COMMENT '店铺的面积',
  `dinghaopu_shop_industry` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '店铺经营的行业',
  `dinghaopu_shop_province` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '店铺的省份',
  `dinghaopu_shop_city` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '店铺的城市',
  `dinghaopu_shop_district` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '店铺的区域',
  `dinghaopu_shop_zone` varchar(31) COLLATE utf8_unicode_ci NOT NULL COMMENT '店铺的区域内的地段，如车站、大楼、广场等',
  `dinghaopu_shop_status` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '店铺的经营状态，值为经验中或闲置中',
  `dinghaopu_shop_type` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '店铺的类型',
  `dinghaopu_shop_min_floor` int(15) DEFAULT NULL COMMENT '店铺的最低楼层',
  `dinghaopu_shop_max_floor` int(15) DEFAULT NULL COMMENT '店铺的最高楼层',
  `dinghaopu_shop_is_street` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '店铺是否临街，值为临街或不临街',
  `dinghaopu_shop_width` float DEFAULT NULL COMMENT '店铺的门面宽度',
  `dinghaopu_shop_height` float DEFAULT NULL COMMENT '店铺的门面高度',
  `dinghaopu_shop_depth` float DEFAULT NULL COMMENT '店铺的门面深度，进深',
  `dinghaopu_shop_method` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '店铺的押金和预付方式，如押1付1',
  `dinghaopu_shop_time_left` int(15) DEFAULT NULL COMMENT '店铺的剩余租期，以月为单位',
  `dinghaopu_shop_supporting_facilities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '店铺所拥有的配套设施，格式为“货梯-扶梯-可明火”',
  `dinghaopu_shop_customer_population` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '店铺的顾客人群，格式为“办公人群-学生人群”',
  PRIMARY KEY (`dinghaopu_shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='店铺信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinghaopu_shop`
--

LOCK TABLES `dinghaopu_shop` WRITE;
/*!40000 ALTER TABLE `dinghaopu_shop` DISABLE KEYS */;
INSERT INTO `dinghaopu_shop` VALUES (25,'已审核','未转出','2021-11-22 09:27:07','是','2021-11-22','旺铺低价转让，整体空转均可，步行街里面，人流量大','荣昌城区人民四支路',3167,2,'钱女士','13551395495','【',37,'服饰鞋包-服装店','重庆市','重庆市','荣昌县','其他','经营中','购物百货中心',1,1,'是',3,4,12,'押1付6',2,'-----------暖气-网络-天然气--','办公人群-学生人群---'),(34,'未审核','未转出','2021-11-22 14:16:59','否','2021-01-01','测试标题-童装店','测试地址',0,0,'李四','10086','无',20,'服饰鞋包-童装店','陕西省','西安市','未央区','凤城四路','经营中','其他',1,1,'否',20,20,20,'押2付2',2,'----------外摆区-暖气----中央空调','办公人群-学生人群-居民人群--'),(37,'未审核','未转出','2021-11-24 17:48:53','否','2021-01-01','王府井大街小巷10 号','王府井大街',2,1.3,'王佩','13991113649','房源紧缺 急须转让！ 合适联系',110,'美容美发-美发店','北京市','北京市','东城区','王府井','经营中','临街门面',1,0,'是',1802,1500,18800,'押3付6',0,'货梯-----管煤----------中央空调','--居民人群--'),(38,'已审核','已转出','2021-11-25 10:12:50','否','2021-01-01','临街商务楼20平商超低价转让','小店-平阳  凯通大厦-北门',3300,4.2,'杨先生','13191002828','	\r\n【店铺位置】本店位于小店-平阳  凯通大厦-北门， 周边大型成熟住宅区、学校、广场、医院、商场等围绕，客流量非常大，周围有广泛的消费群体，消费档次高，交通四通八达，十分便利，商圈成熟，人口稠密，发展前景甚好。\r\n\r\n【店铺情况】本店现经营烟酒特产，面积20平米，租金3300元/月，临街一楼精装修，店内设施设备完善，门头醒目，利用面积大，系统完善，周边商圈超大，盈利状况良好。经营期间，积累了稳定的客源，生意稳定，周围固定人群和流动人群多，消费能力强！接手即可经营!\r\n因家中有事，诚心转让，有需要的联系',20,'百货超市-便利店','山西省','太原市','小店区','小店其他','经营中','临街门面',1,1,'是',3,4,6,'',0,'--------上水-下水-----停车位-','办公人群--居民人群--'),(39,'已审核','已转出','2021-11-25 10:43:43','否','2021-01-01','未央-160平休闲娱乐旺店 靠近广场学校商业街人流大','二府庄 物资大厦',2500,9,'薛老板','13399200105','【店铺位置】本店位于未央-二附庄 物资大厦， 周边大型住宅区、学校、医院、、商业街、商场等围绕，客流量非常大，周围有广泛的消费群体，消费档次高，交通四通八达，十分便利，商圈成熟，人口稠密，发展前景甚好。\r\n\r\n【店铺情况】本店现经营狼穴剧本杀，面积160平米，租金 2500元/月，临街一层精装修，店内设施设备完善，门头醒目，利用面积大，系统完善，周边商圈超大，盈利状况良好。经营期间，积累了稳定的客源，生意稳定，周围酒店，写字楼，上班族，固定人群和流动人群多，消费能力强！接手即可经营!!\r\n\r\n',160,'休闲娱乐-休闲中心','陕西省','西安市','未央区','二府庄','经营中','写字楼配套',1,1,'否',0,0,0,'',0,'货梯-扶梯-------上水-下水------','办公人群-学生人群-居民人群--'),(41,'已审核','已转出','2021-11-25 11:03:06','是','2021-11-25','莲湖铁塔寺临街11平旺铺 临近小天鹅艺术团人流大','莲湖区铁塔寺小天鹅艺术团东隔壁',1500,1,'王老板','13359299593','【店铺位置】\r\n\r\n本店位于莲湖区铁塔寺小天鹅艺术团东隔壁，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n【店铺情况】\r\n\r\n本店现经营葫芦拌菜，面积11平米，租金1500元/月，临街一层精装修，招牌醒目展示大气，位置显眼优越，多家学校，格局方正，环境舒适，店内设施设备齐全，包含3个月房费 1000元房屋押金  1.5米冷藏展示柜 1.2米不锈钢冰冻操作台 不锈钢展台2个 不锈钢餐车1个  3张长条桌 6把凳子 一个电视 一个壁挂壁扇 一个消毒柜，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，上下水齐全不限经营项目（可做餐饮 美容美发 售货  电器修理 等等）不限项目，整体转让接手即可经营，完全不用担心人流量问题。\r\n\r\n【转让原因】\r\n\r\n现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',11,'餐饮美食-餐馆','陕西省','西安市','莲湖区','其他','经营中','临街门面',1,1,'是',0,0,0,'',0,'--------上水-下水------','办公人群-学生人群-居民人群--'),(42,'已审核','未转出','2021-11-25 11:26:16','是','2021-11-26','未央区临街社区底商300平餐饮旺铺低价急转','未央区渭滨路888号颐和郡小区3号楼底商',2915,0,'刘老板','17791721151','店铺位于未央区凤城二路东段颐和郡南门一楼商铺，有天然气，精装修，设备齐全，旁边双地铁口，人流来往主干道。300平，纯一楼，格局方正，利用面积大，门头醒目，来往人群一目了然，门口宽敞，方便停车，因工作调动，无法经营，诚心转让，有需要的老板联系。',300,'餐饮美食-餐馆','陕西省','西安市','未央区','其他','经营中','临街门面',1,1,'是',0,0,0,'押1付6',6,'--------上水-下水-外摆区---天然气--','办公人群-学生人群-居民人群--'),(43,'已审核','已转出','2021-11-25 13:58:29','是','2021-11-25','青秀凤岭南52平水果食品店急转 位人流路边，生意稳定可可空转','青秀区凤岭南 缤果水果生活超市',7821,8,'林老板','18376737009','【店铺位置】本店位于青秀区凤岭南 缤果水果生活超市， 周边大型成熟住宅区、学校、医院、商场等围绕，客流量非常大，周围有广泛的消费群体，消费档次高，交通四通八达，十分便利，商圈成熟，人口稠密，发展前景甚好。\r\n\r\n【店铺情况】本店现经营缤果水果生活超市，面积52平米，租金7821元/月，一楼精装修，店内设施设备完善，四台冰柜，一台中央空调，门头醒目，利用面积大，系统完善，周边商圈超大，盈利状况良好。经营期间，积累了稳定的客源，生意稳定，周围酒店，写上班族，固定人群和流动人群多，消费能力强！接手即可经营!!',52,'餐饮美食-水果食品店','广西壮族自治区','南宁市','青秀区','其他','经营中','临街门面',1,1,'是',4,3,10,'押2付1',36,'------------网络---','办公人群-学生人群-居民人群--'),(44,'已审核','未转出','2021-11-25 14:07:48','是','2021-12-01','灞桥洪庆医院周边临街地铁口酒店转让','灞桥区洪庆-米兰精选酒店',20800,2,'任老板','18635868341','灞桥临街米兰精选酒店转让，旅客、办公、学生等流动性、固定性客源群体庞大密集，周边消费能力高，商圈非常成熟。店铺精装修，手续齐全，配置完善，布局合理，时尚简约。酒店经营期间服务热情，积累了大量回头客，老客户多，生意稳定，因本人及合伙人还有其他项目，诚心转让，有需要的联系。',1200,'酒店宾馆-宾馆酒店','陕西省','西安市','灞桥区','洪庆','经营中','临街门面',1,2,'是',0,0,0,'押0付0',6,'--客梯------上水-下水--暖气---停车位-中央空调','办公人群-学生人群-居民人群-旅游人群-'),(46,'未审核','未转出','2021-11-25 17:23:01','否','2021-01-01','旺铺低价转让，整体空转均可，步行街里面，人流量大','地址',1,1,'张三','123','【店铺位置】本店位于惠阳区-淡水，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！【店铺情况】本店现经营猪肚鸡煲 甲鱼鸡煲 重庆烧鸡公 川湘小炒，面积88平米，租金5600元/月，临街一层精装修，招牌醒目展示大气，位置显眼优越，格局方正，门口可以摆八张桌,里面六张，环境舒适，店内设施设备齐全，有三匹空调 ，有5个冰箱 ，还有杀鸡的那些机器都有 ，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。【转让原因】现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！ ',200,'餐饮美食-不限','天津市','天津市','和平区','鞍山道沿线','经营中','商业街商铺',33,33,'是',0,0,0,'',0,'货梯---------------','办公人群----'),(47,'未审核','未转出','2021-11-25 17:31:49','否','2021-01-01','123','123',10,10,'123','123','【店铺位置】本店位于惠阳区-淡水，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！ 【店铺情况】本店现经营猪肚鸡煲 甲鱼鸡煲 重庆烧鸡公 川湘小炒，面积88平米，租金5600元/月，临街一层精装修，招牌醒目展示大气，位置显眼优越，格局方正，门口可以摆八张桌,里面六张，环境舒适，店内设施设备齐全，有三匹空调 ，有5个冰箱 ，还有杀鸡的那些机器都有 ，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。 【转让原因】现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！ ',1,'美容美发-美容院','河北省','唐山市','路北区','其他','经营中','商业街商铺',33,33,'是',0,0,0,'',0,'货梯---------------','办公人群----'),(48,'未审核','未转出','2021-11-25 17:37:36','否','2021-01-01','123','123',123,123,'123','123','【店铺位置】本店位于惠阳区-淡水，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！ 【店铺情况】本店现经营猪肚鸡煲 甲鱼鸡煲 重庆烧鸡公 川湘小炒，面积88平米，租金5600元/月，临街一层精装修，招牌醒目展示大气，位置显眼优越，格局方正，门口可以摆八张桌,里面六张，环境舒适，店内设施设备齐全，有三匹空调 ，有5个冰箱 ，还有杀鸡的那些机器都有 ，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。 【转让原因】现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！ ',123,'美容美发-美容院','河北省','唐山市','路北区','其他','经营中','商业街商铺',33,33,'是',0,0,0,'',0,'货梯---------------','----'),(49,'未审核','未转出','2021-11-25 17:40:57','否','2021-01-01','测试标题-1','123',123,123,'123','123','【店铺位置】本店位于惠阳区-淡水，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n【店铺情况】本店现经营猪肚鸡煲 甲鱼鸡煲 重庆烧鸡公 川湘小炒，面积88平米，租金5600元/月，临街一层精装修，招牌醒目展示大气，位置显眼优越，格局方正，门口可以摆八张桌,里面六张，环境舒适，店内设施设备齐全，有三匹空调 ，有5个冰箱 ，还有杀鸡的那些机器都有 ，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。\r\n【转让原因】现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！ ',88,'餐饮美食-餐馆','河北省','石家庄市','桥东区','平安南大街','经营中','商业街商铺',1,1,'是',0,0,0,'',0,'---------------','----'),(51,'已审核','未转出','2021-11-27 18:46:39','是','2021-11-27','兴宁-朝阳60平旺铺急转 周边商圈成熟人流大、客源稳定设备齐全','兴宁-朝阳虎邱寸',4800,5,'沈老板','13669684071','【店铺位置】\r\n本店位于兴宁-朝阳，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n【店铺情况】\r\n本店现经营理发店，面积60平米，租金4800元/月，临街一层精装修，招牌醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。\r\n【转让原因】\r\n现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！',60,'美容美发-不限','广西壮族自治区','南宁市','兴宁区','其他','经营中','社区底商',1,1,'是',0,0,0,'',3,'--------上水-下水---网络--停车位-','办公人群-学生人群-居民人群--'),(52,'已审核','未转出','2021-11-29 18:54:31','是','2021-11-29','新城区胡家庙71㎡冒菜馆，周边小区批发市场人流大！','胡家庙万年路与长缨东路交叉口',9600,8,'杨先生','13359216118','【店铺位置】\r\n\r\n本店位于新城区胡家庙万年路与长缨东路交叉口，交通便利，地理位罟优越，商圈成熟，周边大型成熟住宅区、多个批发市场、酒店、医院、商场等围绕大型商业综合体，有西京医院、工程大学、石棉总厂家属院、恒基·碧翠锦华、新兴·骏景园、石棉厂小区、福泽坊、汉杰·天赐良苑等等人口居住密集，批发市场众多，流量大消费群体众多，消费档次高！\r\n\r\n【店铺情况】\r\n本店现经营毛记冒菜香锅，面积71平米，租金9600元/月，临街一层精装修，门头醒目，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，适合做凉皮肉夹馍、快餐米饭、黄焖鸡、鸡公煲、特色小吃、串串香、烧烤夜宵、大排档、特色私房菜、火锅等等或美容美发美甲行业等，行业无限制！！整体转让同行接手即可经营。\r\n【转让原因】\r\n现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰员工和顾客，谢谢配合！！',71,'餐饮美食-餐馆','陕西省','西安市','新城区','胡家庙','经营中','临街门面',1,1,'是',0,0,0,'',0,'--------上水-下水---网络-天然气--','办公人群-学生人群-居民人群--'),(53,'已审核','未转出','2021-11-29 19:10:36','是','2021-11-29','雁塔小寨美食城20平档口转让，地理位置优越','雁塔区小寨食为先美食城内',5000,0.1,'刘老板','18201425829','【店铺位置】\r\n本档口位于雁塔区小寨食为先美食城内，交通便利，地理位置优越，商圈成熟，周边大型成熟住宅区、高档写字楼、学校、商场、医院等围绕大型商业综合体，有福满园、朱雀乐府、佳艺小区、西安交大附属医院、大兴善寺、百汇综台市场、长安大学、音乐学院等等人口居住密集，学生、办公、旅游、人群广，流量大消费群体众多，消费档次高!!\r\n\r\n【店铺情况】\r\n本档口现经营一面知缘，主营招牌辣爆小公鸡拌面，面积20平米，租金5000元/月，转让费包含所有的设备，3个半月房租，1万押金。房租一年到期，押金1万退还，压1万付三个月。本档口招牌醒目，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，适合做粉面类、特色小吃、快餐、盖浇饭、黄焖鸡、馄饨、麻辣烫等等各类餐饮小吃，整体转让接手即可经营，完全不用担心人流量问题。\r\n【转让原因】\r\n现因本人另有其他事情处理，无奈低价转让，可实际考察，档口正常营业中，看店请勿扰顾客，谢谢配合！！',20,'餐饮美食-食堂','陕西省','西安市','雁塔区','小寨','经营中','档口摊位',1,1,'否',0,0,0,'',3,'--------上水-下水-外摆区---天然气--','-学生人群-居民人群-旅游人群-'),(54,'已审核','未转出','2021-11-29 19:21:47','是','2021-11-29','青秀区凤岭北38㎡便利店成功转出，有阁楼可住人可空转 有烟证','青秀区凤岭北德瑞花园',6000,5,'刘先生','18241086969','本店位于青秀区凤岭北德瑞花园，地铁口旁交通便利，地理位罟优越，商圈成熟，周边大型住宅区、广场、小学、公园等围绕，有月湾路小学、中鼎·万象东方、华润·幸福里、祥和苑、泽峰花园、逸园小区、花坛广场、石门森林公园等等围绕大型商业综合体，办公人群大，小区密集客流量非常大，周围有广泛的消费群体，消费档次高!',38,'百货超市-便利店','广西壮族自治区','南宁市','青秀区','其他','经营中','社区底商',1,2,'是',0,0,0,'',0,'---------------','----'),(55,'已审核','未转出','2021-11-29 19:29:17','是','2021-11-29','青秀-东葛路120平旺铺急转 装修精致人流大','青秀区东葛路118号万达银座',6000,15,'罗女士','13367710444','本店位于南宁市青秀区 东葛路118号 万达银座，店铺周围成熟社区、学校，广场等围绕，位置优越，商圈成熟，交通便利，人口居住密集，客流量非常大，周围有广泛的消费群体，消费档次高!\r\n现经营美肌之钥，面积120平，房租6000元/月，店铺门头醒目，装修精致，格局方正，可利用空间充足，店内设备齐全。本人在此经营期间，营业期间服务热情，口碑极好，积累了不少稳定客户，附近来往的都知道，不需添置设备，接手即可经营',120,'美容美发-美容院','广西壮族自治区','南宁市','青秀区','其他','经营中','写字楼配套',1,1,'是',0,0,0,'押一付三',6,'--------上水-下水--暖气--天然气--','办公人群--居民人群--'),(56,'已审核','未转出','2021-11-29 19:36:14','是','2021-11-29','青秀埌西菜市场21平临街小吃店，毗邻地铁3号线人流大可外摆','青秀南湖广场埌西综合市场',8300,6,'陶先生','17376020499','本店位于青秀南湖广场埌西综合市场，毗邻地铁3号线，周边大型成熟住宅区、学校、广场等围绕大型商业综合体，交通便利，地理位置优越，商圈成熟，小区集中入住率高，人口居住密集，学校众多，流量大消费群体众多，消费能力强！\r\n本店现经营玉林风味，面积21平米，租金8300元/月，城中村临街一层精装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，可外摆。经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，适合做粉面类、特色小吃、地方菜、炒菜馆、快餐、黄焖鸡等等，整体转让接手即可经营，完全不用担心人流量问题。',21,'餐饮美食-餐馆','广西壮族自治区','南宁市','青秀区','其他','经营中','临街门面',1,1,'是',0,0,0,'押一付三',6,'--------上水-下水----天然气--','-学生人群-居民人群-旅游人群-'),(57,'已审核','已转出','2021-11-29 19:42:08','是','2021-12-01','青秀区建政路临街美容院，7年老店，客源稳定，精装修','青秀区建政路36-41号二楼',6900,5,'周女士','18776933693','本店位于：青秀区建政路36-41号二楼临街店铺，臻享瘦新概念纤体美学馆；临街2楼门面，招牌醒目，面积：150平，租金：6900/月；优势：本店地处青秀区建政路36-41号二楼临街店铺，各种餐饮、商铺聚集有一定引流效益，背靠二轻大院成熟社区，对面是文化大院，文鼎阁和区博物馆宿舍区，附近上万居住户，居民多，年轻人多，人流量大，消费群体集中，位置显著；本店精装修，在二楼美容院，目前生意稳定，老客户多，各项设备齐全，接手即可经营，有意者联系实地考察，非诚勿扰。',150,'美容美发-美容院','广西壮族自治区','南宁市','青秀区','建政路','经营中','临街门面',1,2,'是',0,0,0,'押一付三',4,'--客梯------上水-下水------','办公人群--居民人群-旅游人群-'),(58,'已审核','未转出','2021-11-29 19:48:50','是','2021-11-29','西乡塘-科园大道28平旺铺急转 临街铺面、人流量不用担心','西乡塘-科园大道 广西电力职业基数学院',2600,3.5,'莫老板','15978164835','本店位于西乡塘-科园大道 广西电力职业基数学院，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n本店现经营奶茶小吃，面积28平米，租金2600元/月，临街一层精装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。',28,'餐饮美食-小吃店','广西壮族自治区','南宁市','西乡塘区','其他','经营中','临街门面',1,1,'是',0,0,0,'押一付三',8,'---------------','----'),(59,'已审核','未转出','2021-11-29 19:53:40','是','2021-11-29','安吉60平旺铺，奶茶店+便利店成功转出 有证，靠小学中学','西乡塘安吉',7200,5,'饶先生','13879539234','本店位于西乡塘-安吉 西乡塘区， 周边大型住宅区、学校、医院、商场等围绕，客流量非常大，周围有广泛的消费群体，消费档次高，交通四通八达，十分便利，商圈成熟，人口稠密，发展前景甚好。\r\n本店现经营茶小嘟奶茶店+便利店，面积60平米，租金7200元/月，临街一楼精装修，店内设施设备完善，门头醒目，利用面积大，系统完善，周边商圈超大，盈利状况良好。经营期间，积累了稳定的客源，生意稳定，周围一面朝主街一面朝夜宵摊，有服装店、鞋店、母婴店、夜宵烧烤摊、各种小吃店、菜市场，还有早市疏菜批发，附近有小学、中学稳定居民，固定人群和流动人群多，消费能力强！本店适合做各种店型，接手即可经营!!',60,'百货超市-便利店','广西壮族自治区','南宁市','西乡塘区','安吉','经营中','临街门面',1,1,'是',0,0,0,'押一付三',2,'--------上水-下水-外摆区-----','-学生人群-居民人群--'),(60,'已审核','未转出','2021-11-29 20:05:07','是','2021-12-01','碑林东关南街,社区底商40平旺铺 急转','东关南街陕建一建和平门小区二院-南门',5500,4,'吴老板','15399477318','本店位于碑林东关南街陕建一建和平门小区二院-南门，东临大唐东市、西临秋林，周边大型成熟住宅区、学校、医院、办公楼、广场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n本店现经营汉卤帝熟食店，面积40平米，租金5500元/月，临街一层精装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，社区底商 ，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。',40,'餐饮美食-餐馆','陕西省','西安市','碑林区','东关南街','经营中','社区底商',1,1,'是',6,4,6.5,'押一付六',5,'--------上水-下水-外摆区-----','办公人群-学生人群-居民人群--'),(61,'已审核','未转出','2021-11-29 20:14:23','是','2021-11-29','滨湖新区-万达文旅城158平旺铺超市急转','滨湖新区万达文旅城-万达揽湖苑',10000,12,'陶老板','18010955899','本店位于滨湖新区-万达文旅城 万达揽湖苑， 周边大型住宅区、学校、医院、商场等围绕，客流量非常大，周围有广泛的消费群体，消费档次高，交通四通八达，十分便利，商圈成熟，人口稠密，发展前景甚好。\r\n本店现经营砖逗百货超市，面积158平米，租金 10000元/月，临街一楼精装修，店内设施设备完善，门头醒目，利用面积大，系统完善，周边商圈超大，盈利状况良好。经营期间，积累了稳定的客源，生意稳定，周围固定人群和流动人群多，消费能力强！接手即可经营!!\r\n现因本人另有其他事情处理，无奈低价转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',158,'百货超市-超市','安徽省','合肥市','其他','其他','经营中','社区底商',1,1,'是',0,0,0,'押一付三',8,'--------上水-下水------','--居民人群--'),(62,'已审核','未转出','2021-11-29 20:19:57','是','2021-11-29','包河-高铁南站160平旺铺急转 周边配套高档小区学校','高铁南站合肥滨湖办公服务区',14000,6,'王老板','18297989697','本店位于包河-高铁南站合肥滨湖办公服务区 ，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n本店现经营烤串香地锅鸡，面积160平米，租金14000元/月，临街一层精装修，门头醒目展示大气，位置显眼优越，周边配套高档小区，对面是寿春中学，人均消费水平高，龙虾烧烤生意火爆，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。',160,'餐饮美食-餐馆','安徽省','合肥市','包河区','其他','经营中','临街门面',1,1,'是',0,0,0,'押一付三',9,'--------上水-下水-外摆区-----','--居民人群-旅游人群-'),(63,'已审核','未转出','2021-11-29 20:49:15','是','2021-11-29','渝中-大坪210平旺铺急转,客源稳定','大坪时代天街时代汇三楼',19000,25,'唐老板','13308393313','本店位于渝中-大坪 大坪时代天街时代汇三楼，周边大型成熟住宅区、学校、公园、广场、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n本店现经营影院式足浴SPA，面积210平米，租金19000元/月，新装修，精装修，门头醒目展示大气，位置显眼优越，格局方正，有6个房间和大厅、卫生间，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。',210,'休闲娱乐-足浴','重庆市','重庆市','渝中区','大坪','经营中','写字楼配套',1,1,'是',0,0,0,'押一付三',2,'--客梯------上水-下水------','办公人群--居民人群-旅游人群-'),(64,'已审核','未转出','2021-11-30 20:04:20','是','2021-11-30','青秀-七星桃源20平临街旺铺急转 周边配套设施完善人流大','青秀-七星桃源纬武菜市',7000,13,'黄女士','15994445510','本店位于青秀-七星桃源 纬武菜市， 周边大型成熟住宅区、学校、医院、商场等围绕，客流量非常大，周围有广泛的消费群体，消费档次高，交通四通八达，十分便利，商圈成熟，人口稠密，发展前景甚好。\r\n本店现经营奶茶店，面积20平米，租金7000元/月，临街一楼精装修，店内设施设备完善，招牌醒目，利用面积大，系统完善，周边商圈超大，盈利状况良好。经营期间，积累了稳定的客源，生意稳定，周围酒店，上班族，固定人群和流动人群多，消费能力强！接手即可经营!!',20,'餐饮美食-餐馆','广西壮族自治区','南宁市','青秀区','其他','经营中','临街门面',1,1,'是',4,4,5,'押三付三',40,'--------上水-下水------','办公人群-学生人群-居民人群--'),(65,'已审核','未转出','2021-12-01 15:02:03','是','2021-12-01','经开区-张家堡360平旺铺急转 生意稳定设备齐全 接手营业','经开区-张家堡',10000,28,'	谢培轩','15002923321','【店铺位置】\r\n\r\n本店位于经开区-张家堡，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n\r\n【店铺情况】\r\n\r\n本店现经营茶楼，面积360平米，租金10000元/月，临街精装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。\r\n\r\n【转让原因】\r\n\r\n现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',360,'休闲娱乐-不限','陕西省','西安市','其他','其他','经营中','临街门面',1,2,'是',6,4,16,'押1付6',1,'-扶梯-------上水-下水------','办公人群--居民人群--'),(66,'已审核','未转出','2021-12-01 15:19:32','是','2021-12-01','未央-大明宫101平旺铺急转 周边配套设施完善、临地铁人流大手续齐全','未央-大明宫',3100,1.9,'	黄超','18702915919','【店铺位置】\r\n\r\n本店位于未央-大明宫，周边大型成熟住宅区、学校、医院、商场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n\r\n【店铺情况】\r\n\r\n本店现经营棋牌室，面积101平米，租金3100元/月，新装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。\r\n\r\n【转让原因】\r\n\r\n因自己在上班，顾不到合适的人打理，诚心转让，全新装修，店铺手续齐全，上了美团，口碑好，老客户多。',101,'休闲娱乐-棋牌室','陕西省','西安市','未央区','其他','经营中','临街门面',12,12,'否',6,3,13,'押1付6',1,'-扶梯-客梯------上水-下水--暖气-网络--停车位-','----'),(67,'已审核','未转出','2021-12-01 15:34:29','是','2021-12-01','雁塔38平便利店菜鸟驿站旺铺急转 周边配套设施完善客源广','雁塔区电子信息路',4000,11,'池昊','13259958790','【店铺位置】本店位于雁塔区电子信息路， 周边大型成熟住宅区、学校、医院、商场等围绕，客流量非常大，周围有广泛的消费群体，消费档次高，交通四通八达，十分便利，商圈成熟，人口稠密，发展前景甚好。\r\n\r\n【店铺情况】本店现经营便利店快递，面积38平米，租金 4000元/月，临街一楼精装修，店内设施设备完善，门头醒目，利用面积大，系统完善，周边商圈超大，盈利状况良好。经营期间，积累了稳定的客源，生意稳定，周围酒店，上班族，固定人群和流动人群多，消费能力强！适合做超市、便利店、日用百货、烟酒水果食品、快递等等，接手即可经营!!\r\n\r\n【转让原因】现因本人另有其他事情处理，无奈低价转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',38,'百货超市-便利店','陕西省','西安市','雁塔区','其他','经营中','临街门面',1,1,'是',6,3,9,'押1付3',6,'--------上水-下水---网络---','办公人群-学生人群-居民人群--'),(68,'已审核','未转出','2021-12-01 15:41:44','是','2021-12-01','高新区-软件园20平旺铺急转 周边配套设施完善人流量大、生意稳定','高新区-软件园',2000,2.3,'吴浩斌','18192944587','【店铺位置】本店位于高新区-软件园，店铺周围大型成熟社区、学校、商场等围绕，位置优越，商圈成熟，交通便利，人口居住密集，客流量非常大，周围有广泛的消费群体，消费档次高!\r\n\r\n【店铺情况】现经营美发造型店，面积20平，房租2000元/月，店铺门头醒目，装修精致，格局方正，可利用空间充足，店内设备齐全。本人在此经营期间，营业期间服务热情，口碑极好，积累了不少稳定客户，附近来往的都知道，接手即可经营。\r\n\r\n【转让原因】现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',20,'美容美发-美发店','陕西省','西安市','其他','其他','经营中','临街门面',1,1,'是',5,3,9,'押1付6',6,'--------上水-下水---网络---','办公人群-学生人群-居民人群--'),(69,'已审核','未转出','2021-12-02 11:11:55','是','2021-12-02','青秀临街火爆110平炸酱面馆 装修精致客流量大','邕江宾馆临街4号门面',19000,12,'邓先生','13950953377','【店铺位置】\r\n本店位于青秀区邕江宾馆临街4号门面，靠近邕江，临近广西电信博物馆，周边大型成熟住宅区、学校等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n【店铺情况】\r\n本店现经营老北京炸酱面，面积110平米，租金1.9万元/月，临街精装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。\r\n【转让原因】\r\n现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',110,'餐饮美食-餐馆','广西壮族自治区','南宁市','兴宁区','其他','经营中','临街门面',1,1,'是',7,3.5,15,'押1付6',6,'------排污-排烟-上水-下水------','办公人群-学生人群-居民人群--'),(70,'已审核','未转出','2021-12-02 11:35:03','是','2021-12-02','闽侯上街商贸中心100平服装店 地段佳人流大','闽侯上街商贸中心11号楼',9000,3,'柯美琳','13960842726','【店铺位置】本店位于闽侯上街商贸中心11号楼，初处于商业街中心地段，店铺周围成熟社区、学校等围绕，位置优越，商圈成熟，交通便利，人口居住密集，客流量非常大，周围有广泛的消费群体，消费档次高!\r\n【店铺情况】现经营莎融服装店，面积100平，房租9000元/月，店铺门头醒目，装修精致，格局方正，可利用空间充足，店内设备齐全。本人在此经营期间，营业期间服务热情，口碑极好，积累了不少稳定客户，附近来往的都知道，只转服装类行业的，接手即可经营。\r\n【转让原因】现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',100,'服饰鞋包-服装店','福建省','福州市','闽侯县','其他','经营中','商业街商铺',1,1,'是',8,3,12,'押3付1',24,'---------------','办公人群-学生人群-居民人群--'),(71,'已审核','未转出','2021-12-02 15:51:34','是','2021-12-02','高新科技西路30平奶茶店急转 无行业限制周边万人科技园住宅','高新科技西路余家庄5号楼',1800,11,'陈峰','18691821809','【店铺位置】\r\n本店位于高新科技西路余家庄5号楼，周边大型成熟住宅区、学校、万人科技园等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n【店铺情况】\r\n本店现经营冰菓倾城奶茶店，面积30平米，租金1800元/月，精装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。\r\n【转让原因】\r\n现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',30,'餐饮美食-餐馆','陕西省','西安市','其他','其他','经营中','临街门面',1,1,'是',4,3,8,'押1付3',3,'--------上水-下水------','办公人群-学生人群-居民人群--'),(72,'已审核','未转出','2021-12-02 16:17:21','是','2021-12-02','未央220平火爆旺铺 临近经开第一学校农贸市场人流大',' 凤城一路海璟台北湾南区董家商铺',24000,35,'张晓辉','13892184556','【店铺位置】\r\n本店位于未央区凤城一路海璟台北湾南区董家商铺，周边大型成熟住宅区、学校、农贸市场等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n【店铺情况】\r\n本店现经营小二哥烧烤小龙虾，面积220平米，租金2.4万/月，临街一层精装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。\r\n【转让原因】\r\n现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',220,'餐饮美食-餐馆','陕西省','西安市','未央区','凤城一路','经营中','商业街商铺',1,1,'是',10,3.5,20,'',6,'------排污-排烟-上水-下水------','办公人群-学生人群-居民人群--'),(73,'已审核','未转出','2021-12-02 16:51:58','是','2021-12-02','未央梨园路39平火爆小吃店 不愁人流小区门口位置佳','北二环西段梨园路御园小区',5000,7,'贾先生','15877397237','【店铺位置】\r\n本店位于未央北二环西段梨园路御园小区，临近大兴新区小学，十字路口，周边大型成熟住宅区、康平医院等围绕，交通便利，地理位置优越，商圈成熟，人口居住密集，流量大消费群体众多，消费档次高！\r\n【店铺情况】\r\n本店现经营大秦御鸭坊，面积39平米，租金5000元/月，剩余房租5个月，共2.5万，临街精装修，门头醒目展示大气，位置显眼优越，格局方正，环境舒适，店内设施设备齐全，经营期间，口碑很好，积累了大量稳定的客源，回头客多，客流量大，盈利状况可观，整体转让接手即可经营，完全不用担心人流量问题。\r\n【转让原因】\r\n现因本人另有其他事情处理，无奈特将此店铺转让，可实际考察，店铺正常营业中，看店请勿扰顾客，谢谢配合！！',39,'餐饮美食-小吃店','陕西省','西安市','未央区','其他','经营中','临街门面',1,1,'是',3,3,10,'押1付6',5,'--------上水-下水------','办公人群-学生人群-居民人群--'),(74,'未审核','未转出','2021-12-10 14:24:06','否','2021-01-01','','',0,0,'','','',0,'不限-不限','北京市','北京市','东城区','王府井','经营中','其他',0,0,'否',0,0,0,'押0付0',0,'货梯-扶梯-客梯-可明火-380V-管煤-排污-排烟-上水-下水-外摆区-暖气-网络-天然气-停车位-中央空调','办公人群-学生人群-居民人群-旅游人群-其他');
/*!40000 ALTER TABLE `dinghaopu_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinghaopu_swiper`
--

DROP TABLE IF EXISTS `dinghaopu_swiper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinghaopu_swiper` (
  `dinghaopu_swiper_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '轮播图的ID',
  `dinghaopu_swiper_imageurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片资源的路径',
  `dinghaopu_swiper_targeturl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '目标链接',
  PRIMARY KEY (`dinghaopu_swiper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='小程序的首页轮播图';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinghaopu_swiper`
--

LOCK TABLES `dinghaopu_swiper` WRITE;
/*!40000 ALTER TABLE `dinghaopu_swiper` DISABLE KEYS */;
INSERT INTO `dinghaopu_swiper` VALUES (8,'https://zay159.xyz/upload_images/16385014848qtCe6rjgDnszvNh.png','https://mp.weixin.qq.com/s/C-rNT9ZGAqtLLVy7hK8GnQ'),(9,'https://zay159.xyz/upload_images/1638501532mxUxT5I071AinLA0.jpg','https://mp.weixin.qq.com/s/C-rNT9ZGAqtLLVy7hK8GnQ');
/*!40000 ALTER TABLE `dinghaopu_swiper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinghaopu_user`
--

DROP TABLE IF EXISTS `dinghaopu_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinghaopu_user` (
  `dinghaopu_user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `dinghaopu_user_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `dinghaopu_user_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `dinghaopu_user_cookie` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户的cookie',
  `dinghaopu_user_permission` smallint(3) unsigned NOT NULL DEFAULT '200' COMMENT '用户权限等级，100为root，101能审核修改信息，200仅能查看信息并标记完结及标记推广',
  PRIMARY KEY (`dinghaopu_user_id`),
  UNIQUE KEY `dinghaopu_user_name` (`dinghaopu_user_name`),
  UNIQUE KEY `dinghaopu_user_cookie` (`dinghaopu_user_cookie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='后台用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinghaopu_user`
--

LOCK TABLES `dinghaopu_user` WRITE;
/*!40000 ALTER TABLE `dinghaopu_user` DISABLE KEYS */;
INSERT INTO `dinghaopu_user` VALUES (1,'root','root','9y453IjBCux0HGLjT14Tk2B2TCmqeHYhzNylCa9COYr8FGw3duYRkXv9R9lu7BI20PRUf6nzE1w2OP2chANtspA0fsg8sI1HvXXFgp62iJfYfD64tX8gSjHMIP775Ako',100),(3,'user01','user01','ZAmhISnKrteWV3HkyTlgrTWcd7UtUjVzq2cPWQhnN5SvkThFwulSVlQlHqYQcOEEwBezU0hQFmjnAP3z0YbSVsHBgKHnneu9dIhJeuTExs4HxFiPtj27DnZfMSQm2U0n',101),(4,'user02','user02','I446aJoS5wqCY1evLSw0WNGvldRj8xPP4QmIYuptqERwYiEOuP5IwI2G4XEfQUCG1ikMf3gPwyKsDEcMiiHNe9xNwOQCqMc9khyBc32nC3Mw7jU3dJc2zNQ3sXwvK8fS',101),(5,'user03','user03','9rXa3G8Oip4vetnYzs0G8orLFNzy7fU77Al6s981BlHSqjMo3IfT8BL9wvGzIE4pVqXMVBbJ3ZfmDueOL1tn3PWrIET7qKrOhjgPfA4Vlu9vJFrmrxQzytiqAiXD9ca6',200),(6,'user04','user04',NULL,200);
/*!40000 ALTER TABLE `dinghaopu_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'zay159_xyz'
--

--
-- Dumping routines for database 'zay159_xyz'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-10 14:34:44
