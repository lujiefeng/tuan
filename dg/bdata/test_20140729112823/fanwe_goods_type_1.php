<?php 
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_goods_type`;");
E_C(\"CREATE TABLE `fanwe_goods_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_1` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>