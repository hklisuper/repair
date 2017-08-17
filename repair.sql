# Host: localhost  (Version: 5.5.53)
# Date: 2017-05-16 21:26:01
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "re_admin"
#

DROP TABLE IF EXISTS `re_admin`;
CREATE TABLE `re_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL DEFAULT '' COMMENT '账号',
  `pwd` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `img_name` varchar(50) NOT NULL DEFAULT '' COMMENT '头像名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "re_admin"
#

INSERT INTO `re_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','');

#
# Structure for table "re_bill"
#

DROP TABLE IF EXISTS `re_bill`;
CREATE TABLE `re_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_info` varchar(50) NOT NULL DEFAULT '' COMMENT '用户信息',
  `img_name` varchar(20) NOT NULL DEFAULT '' COMMENT '维修产品图片名称',
  `text` text NOT NULL COMMENT '用户的维修描述',
  `local` varchar(20) NOT NULL DEFAULT '' COMMENT '用户申请维修地点',
  `fsort` varchar(10) DEFAULT NULL COMMENT '维修产品类别',
  `ftype` varchar(5) DEFAULT NULL COMMENT '维修产品型号',
  `staff_name` varchar(10) DEFAULT NULL COMMENT '接单员工',
  `user_name` varchar(20) NOT NULL DEFAULT '' COMMENT '维修单对应用户',
  `status` varchar(5) DEFAULT '0' COMMENT '维修单接单状态',
  `trace` varchar(20) DEFAULT NULL COMMENT '维修记录 1',
  `date` date DEFAULT NULL COMMENT '创建时间',
  `title` varchar(20) DEFAULT NULL COMMENT '标题',
  `staff_done` varchar(20) DEFAULT NULL COMMENT '已派工人',
  `tellnum` varchar(20) DEFAULT NULL COMMENT '电话',
  `tranti` varchar(255) DEFAULT NULL COMMENT '约定时间',
  `remark` varchar(255) DEFAULT NULL COMMENT '评分',
  `money` varchar(255) DEFAULT NULL COMMENT '结算价钱',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "re_bill"
#

INSERT INTO `re_bill` VALUES (1,'111','1111','','111',NULL,'111','111','111','0',NULL,'2016-05-21','111','1111',NULL,NULL,NULL,'222'),(2,'222','222','','222',NULL,'22','222','22','1',NULL,NULL,'222',NULL,NULL,NULL,NULL,NULL),(3,'333','333','','3333',NULL,NULL,'333','23123','2',NULL,NULL,'333',NULL,NULL,NULL,NULL,NULL),(4,'','','111','4444444',NULL,'qweqw',NULL,'1111','0',NULL,NULL,'1111',NULL,'33333333',NULL,NULL,NULL);

#
# Structure for table "re_com"
#

DROP TABLE IF EXISTS `re_com`;
CREATE TABLE `re_com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL DEFAULT '0' COMMENT '维修单id',
  `date` date NOT NULL DEFAULT '0000-00-00' COMMENT '评论日期',
  `com` varchar(255) NOT NULL DEFAULT '' COMMENT '评论文字',
  `score` varchar(255) DEFAULT NULL COMMENT '评分',
  `imgpath` varchar(255) DEFAULT NULL COMMENT '头像',
  `name` varchar(255) DEFAULT NULL COMMENT '评价人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

#
# Data for table "re_com"
#

INSERT INTO `re_com` VALUES (1,0,'2017-06-01','你好哈哈航','1','ventor.png','123456'),(2,2,'2017-06-01','你好','2','ventor.png','123456'),(3,2,'2017-06-01','你好','3','ventor.png',NULL),(4,2,'2017-06-01','你好','3',NULL,NULL),(5,2,'2017-06-01','你好','3',NULL,NULL),(6,2,'2017-06-01','你好','3',NULL,NULL),(7,2,'2017-06-01','你好','3',NULL,NULL),(8,2,'2017-06-01','你好','3',NULL,NULL),(9,2,'2017-06-01','你好','3',NULL,NULL),(10,2,'2017-06-01','你好','3',NULL,NULL),(11,0,'2017-04-21','333','',NULL,'admin'),(12,0,'2017-04-21','333','',NULL,'admin'),(13,0,'2017-04-21','333','',NULL,'admin'),(14,0,'2017-04-21','333','',NULL,'admin'),(15,0,'2017-04-21','333','',NULL,'admin'),(16,0,'2017-04-21','333','',NULL,'admin'),(17,0,'2017-04-21','333','',NULL,'admin'),(18,0,'2017-04-21','531245132','','ventor.png','admin');

#
# Structure for table "re_group"
#

DROP TABLE IF EXISTS `re_group`;
CREATE TABLE `re_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Gname` varchar(20) NOT NULL DEFAULT '' COMMENT '组名',
  `Gleader` varchar(20) NOT NULL DEFAULT '' COMMENT '组长姓名',
  `R_sort` int(11) NOT NULL DEFAULT '0' COMMENT '维修产品类别',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '组id',
  `remark` varchar(30) DEFAULT NULL COMMENT '备注',
  `date` date DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "re_group"
#

INSERT INTO `re_group` VALUES (1,'2','李响',0,0,'3',NULL),(2,'李响','李响',0,0,'李响','2017-01-26'),(3,'球球','球球',0,0,'球球','2017-02-13'),(4,'AAAAaaaaaaaa','aaaa',0,0,'aaaaa','2017-02-13'),(5,'小六','李响',0,0,'李响','2017-02-14');

#
# Structure for table "re_gsort"
#

DROP TABLE IF EXISTS `re_gsort`;
CREATE TABLE `re_gsort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Gsort` varchar(10) NOT NULL DEFAULT '0' COMMENT '组类别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "re_gsort"
#

INSERT INTO `re_gsort` VALUES (1,'111'),(2,'222');

#
# Structure for table "re_msg"
#

DROP TABLE IF EXISTS `re_msg`;
CREATE TABLE `re_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `time` date DEFAULT NULL COMMENT '时间',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `isread` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='消息';

#
# Data for table "re_msg"
#

INSERT INTO `re_msg` VALUES (1,'111',NULL,'11111',1),(2,'222',NULL,'22222',1);

#
# Structure for table "re_product"
#

DROP TABLE IF EXISTS `re_product`;
CREATE TABLE `re_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_sort` varchar(20) NOT NULL DEFAULT '0' COMMENT '产品类别id',
  `pro_type` varchar(20) NOT NULL DEFAULT '' COMMENT '产品型号',
  `img_name` varchar(255) NOT NULL DEFAULT '0' COMMENT '产品图片名称',
  `buyer` varchar(20) NOT NULL DEFAULT '' COMMENT '产品购买者',
  `p_local` varchar(255) DEFAULT NULL COMMENT '设备所在地',
  `buyer_mob` varchar(11) DEFAULT NULL,
  `pinfo` varchar(255) DEFAULT NULL COMMENT '产品描述',
  `name` varchar(255) DEFAULT NULL COMMENT '设备名',
  `buyer_add` varchar(255) DEFAULT NULL COMMENT '联系人地址',
  `utell` varchar(255) DEFAULT NULL COMMENT '联系人电话',
  `ctime` date DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

#
# Data for table "re_product"
#

INSERT INTO `re_product` VALUES (6,'AAAI','','0','0',NULL,'123456','555','555',NULL,NULL,'2017-04-21'),(7,'AAAI','','0','李响',NULL,'2147483647','66','66',NULL,NULL,'2017-04-21'),(8,'AAAI','','0','0',NULL,'123456','7777','77',NULL,NULL,'2017-04-21'),(9,'AAAI','','0','0',NULL,'123456','444','444',NULL,NULL,'2017-04-21'),(10,'AAAI','','0','李响',NULL,'2147483647','222','222','地址',NULL,'2017-04-21'),(11,'AAAI','','0','111',NULL,'123456','222','22','1354345',NULL,'2017-04-29'),(12,'AAAI','','0','111',NULL,'123456','222','22','1354345',NULL,'2017-04-29'),(13,'AAAI','','0','111',NULL,'123456','222','22','1354345',NULL,'2017-04-29'),(14,'AAAI','','0','111',NULL,'123456','43434','44','1354345',NULL,'2017-04-29'),(15,'AAAI','','0','111',NULL,'123456','55555','555','1354345',NULL,'2017-04-29'),(16,'AAAI','','0','111',NULL,'123456','发嗲','发扥a三扥','1354345',NULL,'2017-04-29'),(17,'AAAI','','0','111',NULL,'123456','发扥adf','2法萨芬','1354345',NULL,'2017-04-29'),(18,'AAAI','','0','111',NULL,'123456',' 扥a ',' 发送扥','1354345',NULL,'2017-04-29'),(19,'AAAI','','0','111',NULL,'123456','打分 ','放大森','1354345',NULL,'2017-04-29'),(20,'AAAI','','0','111',NULL,'123456','扥a三扥','贼贼','1354345',NULL,'2017-04-29'),(21,'AAAI','','0','111',NULL,'123456','扥as','扥a三扥DSA ','1354345',NULL,'2017-04-29'),(22,'AAAI','','0','111',NULL,'123456','as发撒 ','发扥','1354345',NULL,'2017-04-29'),(23,'AAAI','','0','111',NULL,'123456','放大 ','发送扥','1354345',NULL,'2017-04-29'),(24,'AAAI','','0','111',NULL,'123456','aaa','aaa','1354345',NULL,'2017-04-29'),(25,'AAAI','','0','111',NULL,'123456','扥a三扥 ','AAAA','1354345',NULL,'2017-04-29'),(26,'AAAI','','0','111',NULL,'123456','滴滴滴','滴滴滴','1354345',NULL,'2017-04-29'),(27,'AAAI','','0','111',NULL,'123456','滴滴滴','滴滴滴','1354345',NULL,'2017-04-29'),(28,'AAAI','','0','111',NULL,'123456','扥a','发扥','1354345',NULL,'2017-04-29'),(29,'AAAI','','/E:\\softinstall\\phpstudy2\\WWW\\thinkphp\\public/../p','111',NULL,'123456','点点滴滴','吞吞吐吐','1354345',NULL,'2017-04-30'),(30,'AAAI','','E:\\softinstall\\phpstudy2\\WWW\\thinkphp\\public/../public/qrimg/test4ddb970812b1847bb81e4aec5308ea60.png','111',NULL,'123456','发扥','球球','1354345',NULL,'2017-04-30'),(31,'AAAI','','E:\\softinstall\\phpstudy2\\WWW\\thinkphp\\public/../public/qrimg/test4344efc5b55c742b352c20a2aa62158a.png','111',NULL,'123456','啊的 ','打分','1354345',NULL,'2017-04-30'),(33,'AAAI','','/qrimg/testa6f5cde365f4d90738dcc60d07bffcbf.png','111',NULL,'123456','aaaaa','aaaa','1354345',NULL,'2017-04-30'),(34,'AAAI','','/qrimg/testc472928a3d5ec51f459b13e2868ab900.png','111',NULL,'123456','4312413','2134214','1354345',NULL,'2017-05-15');

#
# Structure for table "re_psort"
#

DROP TABLE IF EXISTS `re_psort`;
CREATE TABLE `re_psort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '产品类别',
  `pdetail` text COMMENT '设备组类描述',
  `date` date DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "re_psort"
#

INSERT INTO `re_psort` VALUES (1,'AAAI','156d153af1w5ef135 w135fgaw45e1f\n','2016-04-04'),(2,'啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊','啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊','2017-02-18');

#
# Structure for table "re_sendman"
#

DROP TABLE IF EXISTS `re_sendman`;
CREATE TABLE `re_sendman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `status` varchar(20) DEFAULT NULL COMMENT '职务',
  `scope` varchar(20) DEFAULT NULL COMMENT '范围',
  `date` date DEFAULT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

#
# Data for table "re_sendman"
#

INSERT INTO `re_sendman` VALUES (2,'123','求','球球','2017-02-16'),(3,'Qwest','qweeqwer','eqrweqrqwerwere','2017-02-16'),(4,'dfasd da','aaaaaaaaa','ad','2017-03-09'),(5,'dff','fddd','fdfsfa','2017-03-09'),(6,'fdasdfd','fdfasdf','fdafdafsdf','2017-03-09'),(7,'dfasdfas','fadfasdf','fdafsdfsaf','2017-03-09'),(8,'qqqqqqqqqqqq','qqqqqqqqqq','qqqqqqqqqqqq','2017-03-09'),(9,'qqqqqqqqqqqqq','wwwwwwwwwwqq','wwwwwwwwwwwwwww','2017-03-09'),(10,'eeeeeeee','eeerrrrr','rrrrrrwwww','2017-03-09'),(11,'ewfew','fadsf','zdfasd','2017-03-09'),(12,'dfasdf ','dfasdfas','df dafasf','2017-03-09'),(13,'z','zzzz','zzzzzzzz','2017-03-09');

#
# Structure for table "re_staff"
#

DROP TABLE IF EXISTS `re_staff`;
CREATE TABLE `re_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '员工姓名',
  `pwd` varchar(50) NOT NULL DEFAULT '' COMMENT '员工密码',
  `sex` varchar(2) NOT NULL DEFAULT '' COMMENT '员工性别',
  `account` varchar(20) NOT NULL DEFAULT '' COMMENT '员工账号',
  `status` varchar(20) NOT NULL DEFAULT '' COMMENT '员工身份',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '组id',
  `img_name` varchar(255) NOT NULL DEFAULT '' COMMENT '员工头像',
  `date` char(1) DEFAULT NULL COMMENT '添加日期',
  `scope` varchar(20) DEFAULT NULL COMMENT '范围',
  `mobile` varchar(11) DEFAULT NULL COMMENT '电话',
  `done` varchar(255) DEFAULT NULL COMMENT '历史订单',
  `wechat` varchar(255) DEFAULT NULL COMMENT '微信',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `longtitude` varchar(255) DEFAULT NULL COMMENT '纬度',
  `latitude` varchar(255) DEFAULT NULL COMMENT '经度',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "re_staff"
#

INSERT INTO `re_staff` VALUES (1,'滴滴滴','21232f297a57a5a743894a0e4a801fc3','','123456','AAA',0,'/staffimg/20170427/f227d6171ebfeaa8da942a3854619d99.jpg','2','馆咯咯哒E文','13047115721',NULL,'444444444','1229877912@qq.com',NULL,NULL),(2,'滴滴滴','','','','调度',0,'','2','调度','2222',NULL,NULL,NULL,NULL,NULL),(4,'123','','','','123123',0,'','2','123','3333',NULL,NULL,NULL,NULL,NULL),(5,'123','','','','123',0,'','2','123','4444',NULL,NULL,NULL,NULL,NULL),(6,'3423432','','','','32423',2,'',NULL,NULL,'13047115721',NULL,NULL,NULL,NULL,NULL),(7,'1111','','','','1111',6,'',NULL,NULL,'13333333333',NULL,NULL,NULL,NULL,NULL),(8,'111','','','','111',2,'',NULL,NULL,'13047115721',NULL,NULL,NULL,NULL,NULL),(9,'222','','','','222',2,'/staffimg/20170425\\d',NULL,NULL,'13333333333',NULL,NULL,NULL,NULL,NULL),(10,'11','','','','444',8,'/staffimg/20170425\\9f780a0b659cc88d5b855c07bb793e90.png',NULL,NULL,'13344445555',NULL,NULL,NULL,NULL,NULL),(11,'小刘','','','','333',9,'',NULL,NULL,'13344445555',NULL,NULL,NULL,NULL,NULL);

#
# Structure for table "re_users"
#

DROP TABLE IF EXISTS `re_users`;
CREATE TABLE `re_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(11) NOT NULL DEFAULT '0' COMMENT '账号',
  `name` varchar(11) NOT NULL DEFAULT '0' COMMENT '姓名',
  `pwd` varchar(32) NOT NULL DEFAULT '0' COMMENT '密码',
  `wechat` varchar(20) DEFAULT NULL COMMENT '微信',
  `mobile` char(11) DEFAULT NULL COMMENT '手机号',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `date` date DEFAULT NULL COMMENT '创建日期',
  `sessid` varchar(255) DEFAULT NULL COMMENT '唯一标示符',
  `imgpath` varchar(255) DEFAULT NULL COMMENT '图像地址',
  `daddr` varchar(255) DEFAULT NULL COMMENT '详细地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

#
# Data for table "re_users"
#

INSERT INTO `re_users` VALUES (4,'111','111','111',NULL,'123456','123456@abc.com',NULL,'1354345',NULL,NULL,NULL,NULL),(5,'123456','李响','21232f297a57a5a743894a0e4a801fc3',NULL,'2147483647',NULL,NULL,'地址',NULL,NULL,NULL,NULL),(10,'0','AA','0',NULL,'AA',NULL,NULL,'调度',NULL,NULL,NULL,NULL),(11,'0','扥扥撒扥','0',NULL,'房东方扥',NULL,NULL,'扥a',NULL,NULL,NULL,NULL),(14,'0','aaaa','0',NULL,'aaa',NULL,NULL,'aaaa',NULL,NULL,NULL,NULL),(15,'0','aaa','0',NULL,'aaaa',NULL,NULL,'aaaa','2017-04-18',NULL,NULL,NULL),(16,'0','dddd','0',NULL,'dddd',NULL,NULL,'dddd','2017-02-18',NULL,NULL,NULL),(17,'0','444','0',NULL,'444',NULL,NULL,NULL,'2017-04-24',NULL,NULL,NULL),(18,'0','333','0',NULL,'333',NULL,NULL,NULL,'2017-04-24',NULL,NULL,NULL);
