<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_vote_group`;");
E_C("CREATE TABLE `fanwe_vote_group` (
  `id` int(11) NOT NULL auto_increment,
  `item_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL default '0',
  `vote_count` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>