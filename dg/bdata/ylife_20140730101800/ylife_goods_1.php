<?php 
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ylife_goods`;");
E_C("CREATE TABLE `ylife_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_1` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `suppliers_id` int(11) NOT NULL,
  `click_count` int(11) NOT NULL,
  `cost_price` float(10,4) NOT NULL,
  `shop_price` float(10,4) NOT NULL,
  `market_price` float(10,4) NOT NULL,
  `promote_price` float(10,4) NOT NULL,
  `promote_begin_time` int(11) NOT NULL,
  `promote_end_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `goods_type` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL,
  `brief_1` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `is_best` tinyint(1) NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `seokeyword_1` varchar(255) NOT NULL,
  `seocontent_1` varchar(255) NOT NULL,
  `goods_desc_1` text NOT NULL,
  `small_img` varchar(255) NOT NULL,
  `big_img` varchar(255) NOT NULL,
  `origin_img` varchar(255) NOT NULL,
  `define_small_img` varchar(255) NOT NULL,
  `is_define_small_img` tinyint(1) NOT NULL,
  `is_inquiry` tinyint(1) NOT NULL,
  `weight` float(10,4) NOT NULL,
  `spec_type` varchar(255) NOT NULL,
  `weight_unit` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `web_reviews` text NOT NULL,
  `goods_reviews` text NOT NULL,
  `min_user_time` int(11) NOT NULL DEFAULT '0',
  `special_note` text NOT NULL,
  `max_bought` int(11) NOT NULL,
  `is_group_fail` tinyint(1) NOT NULL DEFAULT '0',
  `complete_time` int(11) NOT NULL DEFAULT '0',
  `buy_count` int(11) NOT NULL DEFAULT '0',
  `group_user` int(11) NOT NULL DEFAULT '0',
  `user_count` int(11) NOT NULL DEFAULT '0',
  `earnest_money` float(10,4) NOT NULL DEFAULT '0.0000',
  `group_bond_end_time` int(11) NOT NULL DEFAULT '0',
  `expand1` text,
  `expand2` text,
  `expand3` text,
  `expand4` text,
  `goods_show_name` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `referrals` int(11) NOT NULL,
  `close_referrals` tinyint(4) NOT NULL,
  `goods_short_name` varchar(255) NOT NULL,
  `fail_buy_count` int(10) DEFAULT '0',
  `free_delivery_amount` float(10,4) DEFAULT '0.0000',
  `allow_combine_delivery` tinyint(1) DEFAULT '0',
  `allow_sms` tinyint(1) DEFAULT '0',
  `virtual_count` int(10) DEFAULT '0',
  `score_goods` tinyint(1) DEFAULT '0',
  `is_preview` tinyint(1) DEFAULT '0',
  `all_show` tinyint(1) DEFAULT '0',
  `extend_cate_id` int(11) DEFAULT '0',
  `is_order_sms` tinyint(1) DEFAULT '0',
  `is_first_referral` tinyint(1) DEFAULT '0' COMMENT '不算第一次购买;0:否；1:是',
  `referral_money` float(10,4) DEFAULT '0.0000' COMMENT '购买商品返金额',
  `fix_delivery_money` float(10,4) DEFAULT '0.0000' COMMENT '本商品加收快递费',
  `no_api` tinyint(1) DEFAULT '0' COMMENT '1:不在导航api中显示',
  `no_show_index` tinyint(1) DEFAULT '0' COMMENT '1:不在首页中显示',
  `bond_pw_prefix` varchar(50) DEFAULT NULL COMMENT '团购券密码前缀',
  `interval_time` int(10) DEFAULT '0' COMMENT '每隔多长时间,自动添加多少虚拟购买人数',
  `interval_num` int(10) DEFAULT '0' COMMENT '每隔多长时间,自动添加多少虚拟购买人数',
  `bond_sn_prefix` varchar(50) DEFAULT NULL COMMENT '团购券序号前缀',
  `seo_title` varchar(255) DEFAULT '',
  `shelves_price` float(10,4) NOT NULL,
  `profit` float(10,4) NOT NULL,
  `quan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inx_goods_001` (`is_group_fail`,`buy_count`,`promote_end_time`,`group_user`),
  KEY `inx_goods_002` (`is_group_fail`,`promote_end_time`),
  KEY `inx_goods_003` (`status`,`promote_begin_time`,`promote_end_time`,`city_id`),
  KEY `inx_goods_004` (`sort`,`id`),
  KEY `inx_goods_005` (`sort`),
  KEY `inx_goods_106` (`promote_begin_time`,`promote_end_time`),
  KEY `inx_goods_108` (`no_api`),
  KEY `index_1` (`status`,`type_id`,`score_goods`,`promote_begin_time`,`promote_end_time`,`is_preview`,`cate_id`,`extend_cate_id`,`no_show_index`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8");
E_D("replace into `ylife_goods` values('114','缘始陶艺单人体验套餐','DIY_1406250082','1','18','10','0','0.0000','0.0000','10.0000','0.0000','1406249880','1407545880','1406250082','1406511330','0','0','0','商品简介','0','0','0','0','1','1','陶艺体验、','','商品描述','/Public/upload/goods/small/201407/53d6195e5d3ed.jpg','/Public/upload/goods/big/201407/53d6195e5d3ed.jpg','/Public/upload/goods/origin/201407/53d6195e5d3ed.jpg','','0','0','0.0000','','5','5','本站点评在哪里','商品点评','0','','0','2','1406249880','10','0','6','0.0000','0','','','',NULL,'','','0','0','','0','0.0000','0','1','0','0','1','0','0','0','0','0.0000','0.0000','1','0','','0','0','','陶艺体验','0.1000','0.0000','6');");
E_D("replace into `ylife_goods` values('115','缘始陶艺双人','DIY_1406251410','1','18','10','0','0.0000','0.0000','0.0000','0.0000','1406251320','1407547320','1406251410','1406583747','0','0','0','','0','0','0','0','1','2','','','','/Public/upload/goods/small/201407/53d60bf331abc.jpg','/Public/upload/goods/big/201407/53d60bf331abc.jpg','/Public/upload/goods/origin/201407/53d60bf331abc.jpg','','0','0','0.0000','','5','0','','','0','','0','2','1406251320','3','0','2','0.0000','0','','','',NULL,'','','0','0','','0','0.0000','0','1','0','0','1','0','0','0','0','0.0000','0.0000','1','0','','0','0','','陶艺','0.0000','0.0000','6');");
E_D("replace into `ylife_goods` values('116','无形单人','DIY_1406251765','1','18','11','0','0.0000','0.0000','0.0000','0.0000','1406251680','1407547680','1406251765','1406511301','0','0','0','','0','0','0','0','1','3','','','','/Public/upload/goods/small/201407/53d60be0915bc.jpg','/Public/upload/goods/big/201407/53d60be0915bc.jpg','/Public/upload/goods/origin/201407/53d60be0915bc.jpg','','0','0','0.0000','','5','0','','','0','','0','2','1406251680','0','0','0','0.0000','0','','','',NULL,'','','0','0','无形','0','0.0000','0','1','0','0','1','0','1','0','0','0.0000','0.0000','1','0','','0','0','','无形','0.0000','0.0000','9');");
E_D("replace into `ylife_goods` values('117','无形双人','DIY_1406251983','1','18','11','0','0.0000','0.0000','0.0000','0.0000','1406251920','1407547920','1406251983','1406511291','0','0','0','这里是商品简介','0','0','0','0','1','4','','','这里是商品描述','/Public/upload/goods/small/201407/53d6193165e51.jpg','/Public/upload/goods/big/201407/53d6193165e51.jpg','/Public/upload/goods/origin/201407/53d6193165e51.jpg','','0','0','0.0000','','5','0','这里是商品信息','这里是商品点评','0','','0','2','1406251920','0','0','0','0.0000','0','','这里是抽奖公告内容','这里是扩展字段3',NULL,'','','0','0','','0','0.0000','0','1','0','0','1','0','0','0','0','0.0000','0.0000','1','0','','0','0','','陶艺','0.0000','0.0000','10');");

require("../../inc/footer.php");
?>