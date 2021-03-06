<?php 
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ylife_ecv_type`;");
E_C("CREATE TABLE `ylife_ecv_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `use_start_date` int(11) NOT NULL DEFAULT '0',
  `use_end_date` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) DEFAULT '0',
  `use_count` int(10) DEFAULT '0',
  `exchange` tinyint(1) DEFAULT '0',
  `exchange_score` int(10) DEFAULT '0',
  `exchange_limit` int(10) DEFAULT '0',
  `gen_count` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `ylife_ecv_type` values('1','10元代金券','10.00','1283279849','1315075052','1','0','1','0','0','0','2');");
E_D("replace into `ylife_ecv_type` values('2','10元充值券','10.00','1280601487','1315075092','1','1','1','0','0','0','2');");

require("../../inc/footer.php");
?>