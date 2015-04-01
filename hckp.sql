/*
Navicat MySQL Data Transfer

Source Server         : http://182.92.219.85
Source Server Version : 50537
Source Host           : 182.92.219.85:3306
Source Database       : hckp

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2015-04-02 00:26:43
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `trst_profession_city`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_city`;
CREATE TABLE `trst_profession_city` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parents` varchar(255) DEFAULT NULL,
  `verifyCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trst_profession_city
-- ----------------------------

-- ----------------------------
-- Table structure for `trst_profession_customer`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_customer`;
CREATE TABLE `trst_profession_customer` (
  `tp_c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '货主唯一id自增',
  `tp_c_name` varchar(255) NOT NULL COMMENT '货主名称',
  `tp_c_user` varchar(255) NOT NULL COMMENT '货主联系人',
  `tp_c_phone` varchar(255) NOT NULL COMMENT '货主联系电话',
  `tp_c_address` varchar(255) NOT NULL COMMENT '货主地址',
  `tp_c_fax` varchar(255) NOT NULL COMMENT '传真',
  `ts_u_id` int(11) NOT NULL COMMENT '创建人',
  UNIQUE KEY `tp_c_id` (`tp_c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trst_profession_customer
-- ----------------------------

-- ----------------------------
-- Table structure for `trst_profession_driver`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_driver`;
CREATE TABLE `trst_profession_driver` (
  `tp_d_id` varchar(10) NOT NULL DEFAULT '' COMMENT 'tp_d_id司机id',
  `ts_u_id` varchar(10) DEFAULT NULL COMMENT 'ts_u_id 用户id',
  `tp_d_idcard` text COMMENT '身份证图片地址',
  `tp_d_drilic` text COMMENT '行驶证地址',
  PRIMARY KEY (`tp_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trst_profession_driver
-- ----------------------------

-- ----------------------------
-- Table structure for `trst_profession_driver_gps`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_driver_gps`;
CREATE TABLE `trst_profession_driver_gps` (
  `tp_dg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `tp_d_id` int(11) NOT NULL COMMENT '司机id',
  `tp_dg_city` varchar(50) NOT NULL COMMENT '司机当前城市',
  `tp_dg_gps` varchar(30) NOT NULL COMMENT '定位的经纬度 如：204.00,123.99',
  `tp_dg_time` int(11) NOT NULL COMMENT '定位的时间int值',
  UNIQUE KEY `tp_dg_id` (`tp_dg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trst_profession_driver_gps
-- ----------------------------
INSERT INTO `trst_profession_driver_gps` VALUES ('14', '1001', '上海', '23.33,366.3', '1427904670');
INSERT INTO `trst_profession_driver_gps` VALUES ('15', '1001', '上海', '23.33,366.3', '1427904674');
INSERT INTO `trst_profession_driver_gps` VALUES ('16', '1001', '上海', '23.33,366.3', '1427904675');
INSERT INTO `trst_profession_driver_gps` VALUES ('17', '1001', '上海', '23.33,366.3', '1427904676');
INSERT INTO `trst_profession_driver_gps` VALUES ('18', '1001', '上海', '23.33,366.3', '1427904677');
INSERT INTO `trst_profession_driver_gps` VALUES ('19', '1001', '上海', '23.33,366.3', '1427904678');
INSERT INTO `trst_profession_driver_gps` VALUES ('20', '1001', '上海', '23.33,366.3', '1427904958');
INSERT INTO `trst_profession_driver_gps` VALUES ('21', '1001', '上海', '23.33,366.3', '1427905243');
INSERT INTO `trst_profession_driver_gps` VALUES ('22', '1001', '上海', '23.33,366.3', '1427905305');
INSERT INTO `trst_profession_driver_gps` VALUES ('23', '1001', '上海', '23.33,366.3', '1427905358');

-- ----------------------------
-- Table structure for `trst_profession_o_tc`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_o_tc`;
CREATE TABLE `trst_profession_o_tc` (
  `tp_otc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `tp_c_id` int(11) NOT NULL COMMENT 'tp_c_id 货主id',
  `tp_c_name` varchar(255) NOT NULL COMMENT 'tp_c_name货主冗余',
  `tp_u_id` int(11) NOT NULL COMMENT '运输公司订单确认人',
  `tp_tc_id` int(11) NOT NULL COMMENT '运输公司id',
  UNIQUE KEY `tp_otc_id` (`tp_otc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='运输公司委托单关联表';

-- ----------------------------
-- Records of trst_profession_o_tc
-- ----------------------------

-- ----------------------------
-- Table structure for `trst_profession_order`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_order`;
CREATE TABLE `trst_profession_order` (
  `tp_o_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'tpo_id 属于自增唯一id',
  `tp_o_sn` varchar(255) NOT NULL COMMENT '前的委托单号',
  `tp_o_target_sn` varchar(255) NOT NULL COMMENT '目标的委托单号',
  `tp_o_category` int(2) NOT NULL COMMENT '运输方式 1:整车;2:零担 ',
  `tp_o_type` int(2) NOT NULL COMMENT '运输方式 1:公路;2:铁路;3:空运;4:航运',
  `tp_o_nature` int(2) NOT NULL COMMENT '运输性质 1:普通;2:加急',
  `tp_o_price` varchar(30) NOT NULL COMMENT '委托总价',
  `tp_o_loaddate` date NOT NULL COMMENT '装货日期',
  `tp_o_loadhour` int(2) NOT NULL COMMENT '装货的小时要求',
  `tp_o_reachdate` date NOT NULL COMMENT '到达日期',
  `tp_o_reachhour` varchar(2) NOT NULL COMMENT '到达小时',
  `tp_o_time` int(11) NOT NULL COMMENT '委托单录入时间',
  `tp_o_user` varchar(255) NOT NULL COMMENT '委托单录入的人员,名称冗余',
  `tp_o_status` int(2) NOT NULL COMMENT '委托单状态 0:未提交,1:已提交,2:车队确定,3:已分配完成,4:已开始运输,5:已运输完成 6：确定完成',
  `tp_o_remark` text NOT NULL COMMENT '备注说明',
  `tp_o_loadaddress` varchar(255) NOT NULL COMMENT '发货地址',
  `tp_o_loaduser` varchar(50) NOT NULL COMMENT '发货联系人',
  `tp_o_loadphone` varchar(255) NOT NULL COMMENT '发货人电话',
  `tp_o_getorg` varchar(255) NOT NULL COMMENT '收货单位',
  `tp_o_getaddress` varchar(255) NOT NULL COMMENT '收货地址',
  `tp_o_getuser` varchar(255) NOT NULL COMMENT '收货联系人',
  `tp_o_getphone` varchar(255) NOT NULL COMMENT '收货联系人电话',
  `tp_o_start_city` varchar(30) NOT NULL COMMENT '发货城市',
  `tp_o_end_city` varchar(30) NOT NULL COMMENT '收货城市',
  UNIQUE KEY `tp_o_id` (`tp_o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trst_profession_order
-- ----------------------------

-- ----------------------------
-- Table structure for `trst_profession_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_order_goods`;
CREATE TABLE `trst_profession_order_goods` (
  `tp_og_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一自增id',
  `tp_o_id` int(11) NOT NULL COMMENT '委托单id',
  `tp_og_name` varchar(255) NOT NULL COMMENT '货物名称',
  `tp_og_style` int(2) NOT NULL COMMENT '货物规格 1;常规;2;....',
  `tp_og_weight` varchar(30) NOT NULL COMMENT '预计运输重量',
  `tp_og_category` int(2) NOT NULL COMMENT '商品性质 config',
  `tp_og_goodspack` int(2) NOT NULL COMMENT '包装性质 config',
  `tp_og_nums` varchar(20) NOT NULL COMMENT '件数',
  `tp_og_price` varchar(255) NOT NULL COMMENT '单价',
  `tp_og_other_price` varchar(255) NOT NULL COMMENT '其它费用',
  `tp_og_all_price` varchar(255) NOT NULL COMMENT '总价',
  UNIQUE KEY `tp_og_id` (`tp_og_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='委托单货物表';

-- ----------------------------
-- Records of trst_profession_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `trst_profession_pricelist`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_pricelist`;
CREATE TABLE `trst_profession_pricelist` (
  `tp_p_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一自增的id',
  `tp_c_id` int(11) NOT NULL COMMENT '货主id',
  `tp_tc_id` int(11) NOT NULL COMMENT '运输公司id',
  `tp_start_city` varchar(255) NOT NULL COMMENT '发货城市',
  `tp_end_city` varchar(255) NOT NULL COMMENT '收货城市',
  `tp_p_price` varchar(255) NOT NULL COMMENT '单价/T',
  `tp_p_style` int(2) NOT NULL COMMENT '商品规格 1:常规:2:(待定)',
  `tp_p_start_date` date NOT NULL COMMENT '应用开始时间 ',
  `tp_p_end_date` date NOT NULL COMMENT '应用结束时间 无为一直可用',
  UNIQUE KEY `tp_p_id` (`tp_p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='货主价格清单表';

-- ----------------------------
-- Records of trst_profession_pricelist
-- ----------------------------

-- ----------------------------
-- Table structure for `trst_profession_tcompany`
-- ----------------------------
DROP TABLE IF EXISTS `trst_profession_tcompany`;
CREATE TABLE `trst_profession_tcompany` (
  `tp_tc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '运输公司id自增',
  `tp_tc_name` varchar(255) NOT NULL COMMENT '运输公司名称',
  `tp_tc_phone` varchar(255) NOT NULL COMMENT '电话',
  `tp_tc_fax` varchar(255) NOT NULL COMMENT '传真',
  `tp_tc_user` varchar(30) NOT NULL COMMENT '联系人',
  `tp_tc_taxcertificate` varchar(255) NOT NULL COMMENT '税务登记证图片url',
  `tp_tc_orgcode` varchar(255) NOT NULL COMMENT '机构代码证url',
  `tp_tc_busilicense` varchar(255) NOT NULL COMMENT '营业执照图片地址',
  `tp_tc_trsplicense` varchar(255) NOT NULL COMMENT '运输许可证图片地址',
  `tp_tc_type` int(2) NOT NULL COMMENT '类型0：常规;1;危险品',
  `tp_u_id` int(11) NOT NULL COMMENT '公司信息创建人',
  UNIQUE KEY `tp_tc_id` (`tp_tc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trst_profession_tcompany
-- ----------------------------

-- ----------------------------
-- Table structure for `trst_system_user`
-- ----------------------------
DROP TABLE IF EXISTS `trst_system_user`;
CREATE TABLE `trst_system_user` (
  `ts_u_id` int(255) NOT NULL AUTO_INCREMENT COMMENT '用户真实名',
  `ts_u_phone` varchar(255) NOT NULL,
  `ts_u_username` varchar(255) NOT NULL,
  `ts_u_password` varchar(255) NOT NULL,
  `ts_u_type` varchar(255) NOT NULL COMMENT '1:货主,2:车队,3:司机,',
  `ts_real_name` varchar(255) NOT NULL,
  `ts_u_headpic` varchar(255) NOT NULL COMMENT '用户的头像地址头',
  `ts_u_regtime` int(11) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`ts_u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trst_system_user
-- ----------------------------
INSERT INTO `trst_system_user` VALUES ('1', '15026912738', 'dayunlong', 'c0c5439a2bfa0fb3fb13790c7b41c255', '1', '耿军', '', '0');
