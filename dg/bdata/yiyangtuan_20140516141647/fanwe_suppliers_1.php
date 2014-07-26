<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_suppliers`;");
E_C("CREATE TABLE `fanwe_suppliers` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `web` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `map` mediumtext NOT NULL,
  `tel` varchar(200) NOT NULL,
  `operating` varchar(200) NOT NULL,
  `bus` mediumtext NOT NULL,
  `brief` mediumtext NOT NULL,
  `desc` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `codebar` varchar(50) NOT NULL default 'BCGcode39',
  `resolution` tinyint(1) NOT NULL default '1' COMMENT '1,2,3',
  `pwd` varchar(255) NOT NULL,
  `last_ip` varchar(50) NOT NULL,
  `bond_tmpl` text NOT NULL,
  `h_pwd_groupbond` tinyint(1) default '0',
  `api_address` varchar(255) NOT NULL,
  `xpoint` varchar(255) NOT NULL,
  `ypoint` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL default '',
  `address_2` varchar(255) NOT NULL default '',
  `address_3` varchar(255) NOT NULL default '',
  `address_4` varchar(255) NOT NULL default '',
  `address_5` varchar(255) NOT NULL default '',
  `map_1` varchar(255) NOT NULL default '',
  `map_2` varchar(255) NOT NULL default '',
  `map_3` varchar(255) NOT NULL default '',
  `map_4` varchar(255) NOT NULL default '',
  `map_5` varchar(255) NOT NULL default '',
  `cate_id` int(10) default '0',
  `is_brand` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`),
  KEY `cate_id` (`cate_id`),
  KEY `is_brand` (`is_brand`),
  KEY `sort` (`sort`),
  KEY `index_1` (`cate_id`,`is_brand`),
  KEY `index_2` (`cate_id`,`is_brand`,`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_suppliers` values('9','临沂零度科技','','','','','','','','    郑州零度电子科技有限公司山东区域总代理驻临沂办事处,本公司致力于LED灯系列高端产品的研究与开发，是一家独立专业新技术、新软件、新产品研发、设计、生产和销售于一体的高科技企业。公司主要产品有多功能空间感应LED双亮度神奇灯泡系列、LED吸顶灯、LED声光控灯、LED人体感应灯、LED日光灯管、LED驱动电路、LED射灯杯、LED发光管、1新相关产品的开发和设计，具有独特的技术和发明专利, 产品极具竞争优势。产品广泛应用于商场、酒店宾馆洗浴城卡拉OK俱乐部节电装修工程、机关单位商业大楼走廊过道轮廓城市亮化工程，家庭装饰、客厅、楼梯过道、墙壁灯、卫生间、地下室、草坪绿地。。。。。。 目标：只要有灯光的地方，就有零度电子科技公司的品牌！','&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;郑州零度电子科技有限公司山东区域总代理驻临沂办事处,本公司致力于LED灯系列高端产品的研究与开发，是一家独立专业新技术、新软件、新产品研发、设计、生产和销售于一体的高科技企业。公司主要产品有多功能空间感应LED双亮度神奇灯泡系列、LED吸顶灯、LED声光控灯、LED人体感应灯、LED日光灯管、LED驱动电路、LED射灯杯、LED发光管、1新相关产品的开发和设计，具有独特的技术和发明专利, 产品极具竞争优势。产品广泛应用于商场、酒店宾馆洗浴城卡拉OK俱乐部节电装修工程、机关单位商业大楼走廊过道轮廓城市亮化工程，家庭装饰、客厅、楼梯过道、墙壁灯、卫生间、地下室、草坪绿地。。。。。。 目标：只要有灯光的地方，就有零度电子科技公司的品牌！','1','BCGcode39','1','','','<div style=\"margin:0px auto;font-size:14px;\">\r\n	<table cellspacing=\"0\" cellpadding=\"0\">\r\n		<tbody>\r\n			<tr>\r\n				<td width=\"57%\">\r\n					<img alt=\"\" src=\"./Public/upload/kind/201312/529c4b87b2445.gif\" />\r\n				</td>\r\n				<td style=\"font-family:verdana;font-size:22px;font-weight:bolder;\" width=\"43%\">\r\n					#{\$bond.sn}<br />\r\n{\$bond.password}\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height=\"8\" colspan=\"2\">\r\n					<br />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#000000\" height=\"1\" colspan=\"2\">\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height=\"8\" colspan=\"2\">\r\n					<br />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:微软雅黑;font-size:28px;font-weight:bolder;\" colspan=\"2\">\r\n					{\$bond.goods_name}\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"2\">\r\n					&nbsp;\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"400\">\r\n					贵宾<br />\r\n{\$user.user_name}<br />\r\n有效期<br />\r\n					<p>\r\n						截止至:{\$bond.end_time_format}\r\n					</p>\r\n商家名称：<br />\r\n{\$suppliers.name}<br />\r\n商家电话：<br />\r\n{\$suppliers.tel}<br />\r\n商家地址:<br />\r\n{\$suppliers.address}<br />\r\n交通路线:<br />\r\n{\$suppliers.bus}<br />\r\n营业时间：<br />\r\n{\$suppliers.operating}<br />\r\n				</td>\r\n				<td>\r\n					<div>\r\n					</div>\r\n<br />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<br />\r\n				</td>\r\n				<td align=\"middle\">\r\n					<br />\r\n条码：<br />\r\n{\$suppliers.barcode}\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>','0','','','','','','','','','','','','','','4','0','3');");
E_D("replace into `fanwe_suppliers` values('2','南国醉湘','','','朝阳区曙光西里甲6号院时间国际中心9-22号(浦发银行后)','http://ditu.google.cn/maps?f=q&source=s_q&hl=zh-CN&geocode=&q=%E5%8D%97%E5%9B%BD%E9%86%89%E6%B9%98&sll=39.938133,116.394857&sspn=0.008638,0.019205&g=%E8%A5%BF%E5%9F%8E%E5%8C%BA%E5%89%8D%E6%B5%B7%E4%B8%9C%E6%B2%BF10%E5%8F%B7&brcurrent=3,0x35f1ab433e8791bb:0xc67273dafbbc1aa1,0,0x35f1abee23736947:0xd7bb8b3026d0813a%3B5,0,0&ie=UTF8&hq=%E5%8D%97%E5%9B%BD%E9%86%89%E6%B9%98&hnear=%E5%8C%97%E4%BA%AC%E5%B8%82%E8%A5%BF%E5%9F%8E%E5%8C%BA%E5%89%8D%E6%B5%B7%E4%B8%9C%E6%B2%BF10%E5%8F%B7&ll=39.963241,116.42993&spn=0.034537,0.076818&z=14&iwloc=A','010-84440289','11:00 - 22:00','','','<div style=\"text-indent:25px;\">南国醉湘是一家经营正宗湘菜的餐厅。位于三元西桥时间国际大厦，分为一二两层。招牌菜包括干锅香酥鸭、开口笑鱼头王、益阳黄焖鸡、干锅甲鱼等。欢迎喜好湘菜的各界朋友光临。 <p style=\"line-height:150%;text-indent:0px;\"></p>\r\n<center><img src=\"http://img.lashou.com/tuangou/nanguozuixiang/fanguan.jpg\" border=\"0\" /></center><p></p>\r\n</div>','1','BCGcode39','1','','','<div style=\"border:1px solid #000000;padding:10px;margin:0px auto;width:600px;font-size:14px;\"><table class=\"dataEdit\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"57%\"><img src=\"./Public/upload/kind/201005/4bfe13b58c1ca.gif\" alt=\"\" border=\"0\" /></td>\r\n<td style=\"font-weight:bolder;font-size:22px;font-family:verdana;\" width=\"43%\">#{\$bond.sn}<br />\r\n{\$bond.password}</td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td colspan=\"2\" bgcolor=\"#000000\" height=\"1\"></td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"font-weight:bolder;font-size:28px;height:50px;padding:5px;font-family:微软雅黑;\" colspan=\"2\">{\$bond.goods_name}</td>\r\n</tr>\r\n<tr><td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;padding-right:20px;\" width=\"400\">贵宾<br />\r\n{\$user.user_name}<br />\r\n有效期<br />\r\n截止至:{\$bond.end_time_format}<br />\r\n商家电话：<br />\r\n{\$suppliers.tel}<br />\r\n商家地址:<br />\r\n{\$suppliers.address}<br />\r\n交通路线:<br />\r\n{\$suppliers.bus}<br />\r\n营业时间：<br />\r\n{\$suppliers.operating}<br />\r\n</td>\r\n<td><div id=\"map_canvas\" style=\"width:255px;height:255px;\"></div>\r\n<br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;\"><br />\r\n</td>\r\n<td align=\"center\"><br />\r\n条码：<br />\r\n{\$suppliers.barcode}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>','0','','','','','','','','','','','','','','4','0','0');");
E_D("replace into `fanwe_suppliers` values('3','星巴克咖啡','http://www.starbucks.cn/','','','','','请咨询各门店','','','巴克（Starbucks） 是美国一家连锁咖啡公司的名称，1971年成立，为全球最大的咖啡连锁店，其总部坐落美国华盛顿州西雅图市。除咖啡外，星巴克亦有茶、馅皮饼及蛋糕等商品。星巴克在全球范围内已经有近12,000间分店遍布北美、南美洲、欧洲、中东及太平洋区。 <p style=\"line-height:200%;\"><b>【兑换券展示】</b>请参见下面的扫描图，效果不太好^_^<br />\r\n</p>\r\n<p style=\"line-height:150%;text-indent:0px;\"></p>\r\n<center><img src=\"http://img.lashou.com/tuangou/xingbake/duihuanquan.jpg\" border=\"0\" /></center>','1','BCGcode39','1','','','<div style=\"border:1px solid #000000;padding:10px;margin:0px auto;width:600px;font-size:14px;\"><table class=\"dataEdit\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"57%\"><img src=\"./Public/upload/kind/201005/4bfe13b58c1ca.gif\" alt=\"\" border=\"0\" /></td>\r\n<td style=\"font-weight:bolder;font-size:22px;font-family:verdana;\" width=\"43%\">#{\$bond.sn}<br />\r\n{\$bond.password}</td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td colspan=\"2\" bgcolor=\"#000000\" height=\"1\"></td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"font-weight:bolder;font-size:28px;height:50px;padding:5px;font-family:微软雅黑;\" colspan=\"2\">{\$bond.goods_name}</td>\r\n</tr>\r\n<tr><td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;padding-right:20px;\" width=\"400\">贵宾<br />\r\n{\$user.user_name}<br />\r\n有效期<br />\r\n截止至:{\$bond.end_time_format}<br />\r\n商家电话：<br />\r\n{\$suppliers.tel}<br />\r\n商家地址:<br />\r\n{\$suppliers.address}<br />\r\n交通路线:<br />\r\n{\$suppliers.bus}<br />\r\n营业时间：<br />\r\n{\$suppliers.operating}<br />\r\n</td>\r\n<td><div id=\"map_canvas\" style=\"width:255px;height:255px;\"></div>\r\n<br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;\"><br />\r\n</td>\r\n<td align=\"center\"><br />\r\n条码：<br />\r\n{\$suppliers.barcode}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>','0','','','','','','','','','','','','','','4','0','0');");
E_D("replace into `fanwe_suppliers` values('4','悦和越南料理','','','朝阳区金汇路8-9号世界城商业街E座122号铺(近世贸天街)','http://ditu.google.cn/maps?q=%E6%82%A6%E5%92%8C%E8%B6%8A%E5%8D%97%E6%B2%B3%E7%B2%89%E5%BA%97&hl=zh-CN&cd=1&ei=dbGpS6agIYOQkQXq972uCA&ie=UTF8&view=map&cid=7180209416326832262&ved=0CBwQpQY&hq=%E6%82%A6%E5%92%8C%E8%B6%8A%E5%8D%97%E6%B2%B3%E7%B2%89%E5%BA%97&hnear=&ll=39.920335,116.452053&spn=0.008228,0.019205&z=16&iwloc=A&brcurrent=3,0x35f1ace74bdf9bf9:0xb5e7099aab3991a6,0,0x35f1abee23736947:0xd7bb8b3026d0813a%3B5,0,0','010-85907981','','','','悦和越南料理店，紧邻<a href=\"http://www.lashou.com/index.php?id=23#tianjie\"><u><font color=\"#0066cc\">世贸天街</font></u></a>，为广大用户提供正宗美味的越南料理。 <p style=\"line-height:150%;text-indent:0px;\"></p>\r\n<center><a href=\"http://img.lashou.com/tuangou/yuehe/dianpujieshao.jpg\" target=\"_new\"><img alt=\"点击查看大图\" src=\"http://img.lashou.com/tuangou/yuehe/dianpu.jpg\" jquery1269412070335=\"4\" border=\"0\" /></a></center>','1','BCGcode39','1','','','<div style=\"border:1px solid #000000;padding:10px;margin:0px auto;width:600px;font-size:14px;\"><table class=\"dataEdit\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"57%\"><img src=\"./Public/upload/kind/201005/4bfe13b58c1ca.gif\" alt=\"\" border=\"0\" /></td>\r\n<td style=\"font-weight:bolder;font-size:22px;font-family:verdana;\" width=\"43%\">#{\$bond.sn}<br />\r\n{\$bond.password}</td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td colspan=\"2\" bgcolor=\"#000000\" height=\"1\"></td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"font-weight:bolder;font-size:28px;height:50px;padding:5px;font-family:微软雅黑;\" colspan=\"2\">{\$bond.goods_name}</td>\r\n</tr>\r\n<tr><td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;padding-right:20px;\" width=\"400\">贵宾<br />\r\n{\$user.user_name}<br />\r\n有效期<br />\r\n截止至:{\$bond.end_time_format}<br />\r\n商家电话：<br />\r\n{\$suppliers.tel}<br />\r\n商家地址:<br />\r\n{\$suppliers.address}<br />\r\n交通路线:<br />\r\n{\$suppliers.bus}<br />\r\n营业时间：<br />\r\n{\$suppliers.operating}<br />\r\n</td>\r\n<td><div id=\"map_canvas\" style=\"width:255px;height:255px;\"></div>\r\n<br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;\"><br />\r\n</td>\r\n<td align=\"center\"><br />\r\n条码：<br />\r\n{\$suppliers.barcode}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>','0','','','','','','','','','','','','','','4','0','0');");
E_D("replace into `fanwe_suppliers` values('5','西夏部落','','','宣武区永安路175-4号','http://ditu.google.com/maps?f=q&source=s_q&hl=zh-CN&geocode=&q=%E8%A5%BF%E5%A4%8F%E9%83%A8%E8%90%BD&sll=39.905523,116.408386&sspn=1.011314,1.771545&brcurrent=3,0x35f04d9a47c6dc6b:0x868c7b7da7c153f6,0,0x35f04d998bd7dd77:0x5edd87e0349f18ae%3B5,0,0&ie=UTF8&hq=%E8%A5%BF%E5%A4%8F%E9%83%A8%E8%90%BD&hnear=&ll=39.893802,116.385384&spn=0.032926,0.076818&z=14&iwloc=A','010-63174525','','永安路 (149 米)   6路, 15路, 105路电车, 687路空调','','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;良子健身中关村店坐落于中关村中心区域的辉煌时代大厦，前揽中关村广场，后拥北四环，营业面积4000平方米，房间98个。<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;良子健身独创的“良子”健身保健技术手法和先进的管理模式，目前在全国同行业处于领先水平。公司以<font color=\"green\">“良家子女，用良药，凭精良技术，靠优良服务，挣的是良心钱”</font>为家训；以“开健康服务之先河，创自然疗法之奇迹”为良子人的追求，实行半军事化管理。服务上实行统一形象、手法、礼仪、服装、培训，聘请知名的专职教授统一培训。 <br />','1','BCGcode39','1','','','<div style=\"border:1px solid #000000;padding:10px;margin:0px auto;width:600px;font-size:14px;\"><table class=\"dataEdit\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"57%\"><img src=\"./Public/upload/kind/201005/4bfe13b58c1ca.gif\" alt=\"\" border=\"0\" /></td>\r\n<td style=\"font-weight:bolder;font-size:22px;font-family:verdana;\" width=\"43%\">#{\$bond.sn}<br />\r\n{\$bond.password}</td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td colspan=\"2\" bgcolor=\"#000000\" height=\"1\"></td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"font-weight:bolder;font-size:28px;height:50px;padding:5px;font-family:微软雅黑;\" colspan=\"2\">{\$bond.goods_name}</td>\r\n</tr>\r\n<tr><td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;padding-right:20px;\" width=\"400\">贵宾<br />\r\n{\$user.user_name}<br />\r\n有效期<br />\r\n截止至:{\$bond.end_time_format}<br />\r\n商家电话：<br />\r\n{\$suppliers.tel}<br />\r\n商家地址:<br />\r\n{\$suppliers.address}<br />\r\n交通路线:<br />\r\n{\$suppliers.bus}<br />\r\n营业时间：<br />\r\n{\$suppliers.operating}<br />\r\n</td>\r\n<td><div id=\"map_canvas\" style=\"width:255px;height:255px;\"></div>\r\n<br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;\"><br />\r\n</td>\r\n<td align=\"center\"><br />\r\n条码：<br />\r\n{\$suppliers.barcode}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>','0','','','','','','','','','','','','','','4','0','0');");
E_D("replace into `fanwe_suppliers` values('6','梵雅红酒体验坊','http://www.vwe99.com','/Public/upload/attachment/201007/4c2c34a85d8a1.jpg','北京市朝阳区东三环中路39号建外SOHO西区10号楼商铺三层1030','http://map.baidu.com/?newmap=1&l=18&c=12964978,4825505&s=s%26wd%3D%E6%A2%B5%E9%9B%85%E7%BA%A2%E9%85%92%E4%BD%93%E9%AA%8C%E5%9D%8A%26c%3D131%26src%3D0%26wd2%3D%26sug%3D0&sc=0','010-51289169','','','供应商的介绍','供应商的详细描述<br />','1','BCGcode39','1','5fc988e70310af19475690a51952cc87','127.0.0.1','<div style=\"border:1px solid #000000;padding:10px;margin:0px auto;width:600px;font-size:14px;\"><table class=\"dataEdit\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"57%\"><img src=\"./Public/upload/kind/201005/4bfe13b58c1ca.gif\" alt=\"\" border=\"0\" /></td>\r\n<td style=\"font-weight:bolder;font-size:22px;font-family:verdana;\" width=\"43%\">#{\$bond.sn}<br />\r\n{\$bond.password}</td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td colspan=\"2\" bgcolor=\"#000000\" height=\"1\"></td>\r\n</tr>\r\n<tr><td colspan=\"2\" height=\"8\"><br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"font-weight:bolder;font-size:28px;height:50px;padding:5px;font-family:微软雅黑;\" colspan=\"2\">{\$bond.goods_name}</td>\r\n</tr>\r\n<tr><td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;padding-right:20px;\" width=\"400\">贵宾<br />\r\n{\$user.user_name}<br />\r\n有效期<br />\r\n截止至:{\$bond.end_time_format}<br />\r\n商家电话：<br />\r\n{\$suppliers.tel}<br />\r\n商家地址:<br />\r\n{\$suppliers.address}<br />\r\n交通路线:<br />\r\n{\$suppliers.bus}<br />\r\n营业时间：<br />\r\n{\$suppliers.operating}<br />\r\n</td>\r\n<td><div id=\"map_canvas\" style=\"width:255px;height:255px;\"></div>\r\n<br />\r\n</td>\r\n</tr>\r\n<tr><td style=\"line-height:22px;\"><br />\r\n</td>\r\n<td align=\"center\"><br />\r\n条码：<br />\r\n{\$suppliers.barcode}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>','1','北京市朝阳区东三环中路39号建外SOHO西区10号楼商铺','116.4614106','39.913238','','','','','','','','','','','4','0','0');");
E_D("replace into `fanwe_suppliers` values('7','索珞化妆品','金六路','/Public/upload/attachment/201312/52a6e07fbed61.jpg','临沂兰山','','9*99','9-12','','一直从事专业线化妆品八年的历程，本着诚信为导向，服务为宗旨的目标。希望为每一位爱美的朋友提供更加全方位的服务。\r\n联系人电话：18854405558\r\n联系人QQ：707322859  573873125','<p>\r\n	<strong><span style=\"font-size:18px;\"><u>为每一位客户提供最满意的服务！！</u></span></strong>\r\n</p>\r\n<p>\r\n	<strong><span style=\"font-size:18px;\"><u>一款来自法国V1技术 破译植物DNA遗传密码 引领世界化妆品新方向的索珞化妆品</u></span></strong>\r\n</p>\r\n<p>\r\n	<strong><span style=\"font-size:18px;\"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u></span></strong><strong><span style=\"font-size:18px;\"><u>————&nbsp;</u></span></strong><strong><span style=\"font-size:18px;\"><u>用了才知道</u></span></strong>\r\n</p>','1','BCGcode39','1','e10adc3949ba59abbe56e057f20f883e','112.53.68.13','<div style=\"margin:0px auto;font-size:14px;\">\r\n	<table cellspacing=\"0\" cellpadding=\"0\">\r\n		<tbody>\r\n			<tr>\r\n				<td width=\"57%\">\r\n					<img alt=\"\" src=\"./Public/upload/kind/201312/529c4b87b2445.gif\" /> \r\n				</td>\r\n				<td style=\"font-family:verdana;font-size:22px;font-weight:bolder;\" width=\"43%\">\r\n					#{\$bond.sn}<br />\r\n{\$bond.password}\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height=\"8\" colspan=\"2\">\r\n					<br />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#000000\" height=\"1\" colspan=\"2\">\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height=\"8\" colspan=\"2\">\r\n					<br />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:微软雅黑;font-size:28px;font-weight:bolder;\" colspan=\"2\">\r\n					{\$bond.goods_name}\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"2\">\r\n					&nbsp;\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"400\">\r\n					贵宾<br />\r\n{\$user.user_name}<br />\r\n有效期<br />\r\n					<p>\r\n						截止至:{\$bond.end_time_format}\r\n					</p>\r\n商家名称：<br />\r\n{\$suppliers.name}<br />\r\n商家电话：<br />\r\n{\$suppliers.tel}<br />\r\n商家地址:<br />\r\n{\$suppliers.address}<br />\r\n交通路线:<br />\r\n{\$suppliers.bus}<br />\r\n营业时间：<br />\r\n{\$suppliers.operating}<br />\r\n				</td>\r\n				<td>\r\n					<div>\r\n					</div>\r\n<br />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<br />\r\n				</td>\r\n				<td align=\"middle\">\r\n					<br />\r\n条码：<br />\r\n{\$suppliers.barcode}\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>','0','','','','','','','','','','','','','','4','1','1');");

require("../../inc/footer.php");
?>