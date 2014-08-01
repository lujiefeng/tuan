<?php 
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ylife_goods_spec_gallery`;");
E_C("CREATE TABLE `ylife_goods_spec_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`,`spec_id`,`gallery_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>