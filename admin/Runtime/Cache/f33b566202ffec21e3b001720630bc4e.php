<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($SHOP_NAME); ?>团购管理系统</title>
<link rel="stylesheet" type="text/css" href="__TMPL__ThemeFiles/Css/style.css" />
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/Base.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/prototype.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/mootools.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/common.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/Util/ImageLoader.js"></script>
<script type='text/javascript' charset='utf-8' src='__TMPL__ThemeFiles/Js/kindeditor/kindeditor.js'></script>
<script type='text/javascript' charset='utf-8' src='__TMPL__ThemeFiles/Js/kindeditor/lang/zh_CN.js'></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var ROOT_PATH = '__ROOT__';
var admin_file = '<?php echo fanweC("ADMIN_FILE_NAME");?>';
var APP	 =	 '__APP__';
var PUBLIC = '__TMPL__ThemeFiles';
ThinkAjax.image = [	 '__TMPL__ThemeFiles/Images/loading2.gif', '__TMPL__ThemeFiles/Images/ok.gif','__TMPL__ThemeFiles/Images/update.gif' ]
ImageLoader.add("__TMPL__ThemeFiles/Images/bgline.gif","__TMPL__ThemeFiles/Images/bgcolor.gif","__TMPL__ThemeFiles/Images/titlebg.gif");
ImageLoader.startLoad();
var VAR_MODULE = '<?php echo c('VAR_MODULE');?>';
var VAR_ACTION = '<?php echo c('VAR_ACTION');?>';
var CURR_MODULE = '<?php echo ($module_name); ?>';
//-->
</script>
<script language="JavaScript">
//定义JS中使用的语言变量
var VIEW = '<?php echo (L("VIEW")); ?>';
var CONFIRM_DELETE = '<?php echo (L("CONFIRM_DELETE")); ?>';
var CONFIRM_DELETE_IMAGE = '<?php echo (L("CONFIRM_DELETE_IMAGE")); ?>';
var NO_SELECT = '<?php echo (L("NO_SELECT")); ?>';
var CHOOSE_RECYCLE_ITEM = '<?php echo (L("CHOOSE_RECYCLE_ITEM")); ?>';
var SELECT_EDIT_ITEM = '<?php echo (L("SELECT_EDIT_ITEM")); ?>';
var SELECT_DEL_ITEM	=	'<?php echo (L("SELECT_DEL_ITEM")); ?>';
var CONFIRM_DELETE_FILE = '<?php echo (L("CONFIRM_DELETE_FILE")); ?>';
var CONFIRM_FOREVER_DELETE = '<?php echo (L("CONFIRM_FOREVER_DELETE")); ?>';
var CONFIRM_DELETE_USER_DATA = '<?php echo (L("CONFIRM_DELETE_USER_DATA")); ?>';
var CONFIRM_RESTORE = '<?php echo (L("CONFIRM_RESTORE")); ?>';
var ATTR_PRICE	=	'<?php echo L("ATTR_PRICE");?>';
var ATTR_STOCK	=	'<?php echo L("ATTR_STOCK");?>';

//ThinkAjax.send(ROOT_PATH+'/services/ajax.php?run=autoSendMail','',doDelete);
//ThinkAjax.send(ROOT_PATH+'/services/ajax.php?run=autoSend','',doDelete);
</script>
</head>

<body onload="loadBar(0)">

<div id="loader" ><?php echo (L("PAGE_LOADING")); ?></div>
<table id="checkList" class="list" cellpadding=0 cellspacing=0 ><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('checkList')"></th><th width="40"><a href="javascript:sortBy('id','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("ID")); ?><?php echo ($sortType); ?> "><?php echo (L("ID")); ?><?php if(($order)  ==  "id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('name_1','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("GOODS_NAME")); ?><?php echo ($sortType); ?> "><?php echo (L("GOODS_NAME")); ?><?php if(($order)  ==  "name_1"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('score_goods','<?php echo ($sort); ?>','index')" title="按照支付方式<?php echo ($sortType); ?> ">支付方式<?php if(($order)  ==  "score_goods"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('cate_id','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("GOODS_CATE")); ?><?php echo ($sortType); ?> "><?php echo (L("GOODS_CATE")); ?><?php if(($order)  ==  "cate_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('shop_price','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("SHOP_PRICE")); ?><?php echo ($sortType); ?> "><?php echo (L("SHOP_PRICE")); ?><?php if(($order)  ==  "shop_price"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('promote_end_time','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("PROMOTE_END_TIME")); ?><?php echo ($sortType); ?> "><?php echo (L("PROMOTE_END_TIME")); ?><?php if(($order)  ==  "promote_end_time"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('group_user','<?php echo ($sort); ?>','index')" title="按照最低人数<?php echo ($sortType); ?> ">最低人数<?php if(($order)  ==  "group_user"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('buy_count','<?php echo ($sort); ?>','index')" title="按照团购人数<?php echo ($sortType); ?> ">团购人数<?php if(($order)  ==  "buy_count"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('virtual_count','<?php echo ($sort); ?>','index')" title="按照虚拟人数<?php echo ($sortType); ?> ">虚拟人数<?php if(($order)  ==  "virtual_count"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('suppliers_id','<?php echo ($sort); ?>','index')" title="按照供货商<?php echo ($sortType); ?> ">供货商<?php if(($order)  ==  "suppliers_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('city_id','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("GROUPCITY")); ?><?php echo ($sortType); ?> "><?php echo (L("GROUPCITY")); ?><?php if(($order)  ==  "city_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('quan_id','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("COUPON_REGION")); ?><?php echo ($sortType); ?> "><?php echo (L("COUPON_REGION")); ?><?php if(($order)  ==  "quan_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('sort','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("SORT")); ?><?php echo ($sortType); ?> "><?php echo (L("SORT")); ?><?php if(($order)  ==  "sort"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('id','<?php echo ($sort); ?>','index')" title="按照订单操作<?php echo ($sortType); ?> ">订单操作<?php if(($order)  ==  "id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('type_id','<?php echo ($sort); ?>','index')" title="按照团购券<?php echo ($sortType); ?> ">团购券<?php if(($order)  ==  "type_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): ++$i;$mod = ($i % 2 )?><tr class="row" onmouseover="over(event)" onmouseout="out(event)" onclick="change(event)" ><td><?php if(($goods['level'] == '0')or($goods['level'] > 0)): ?><?php else: ?><input type="checkbox" class="key" name="key"	value="<?php echo ($goods["id"]); ?>" <?php if($goods['checked']): ?>checked="checked"<?php endif; ?> ><?php endif; ?></td><td><?php echo ($goods["id"]); ?>&nbsp;</td><td><a href="javascript:edit('<?php echo (addslashes($goods["id"])); ?>')" title="<?php echo (strip_tags($goods["name_1"])); ?>"><?php echo (msubstr($goods["name_1"])); ?></a>&nbsp;</td><td><?php echo (get_is_score($goods["score_goods"])); ?>&nbsp;</td><td><?php echo (getGoodsCateName($goods["cate_id"])); ?>&nbsp;</td><td><?php echo (priceFormat($goods["shop_price"])); ?>&nbsp;</td><td><?php echo (toDate($goods["promote_end_time"])); ?>&nbsp;</td><td><?php echo ($goods["group_user"]); ?>&nbsp;</td><td><?php echo (A('Goods')->showOrderList($goods["buy_count"],$goods['id'])); ?>&nbsp;</td><td><?php echo ($goods["virtual_count"]); ?>&nbsp;</td><td><?php echo (A('Suppliers')->getSuppliersName($goods["suppliers_id"])); ?>&nbsp;</td><td><?php echo (A('GroupCity')->getGroupCityName($goods["city_id"])); ?>&nbsp;</td><td><?php echo (getCouponRegion($goods["quan_id"])); ?>&nbsp;</td><td><?php echo (getSort($goods["sort"],$goods['id'])); ?>&nbsp;</td><td><?php echo (A('Goods')->getOrderEditLink($goods["id"])); ?>&nbsp;</td><td><?php echo (A('Goods')->getGroupBondLink($goods["type_id"],$goods['id'])); ?>&nbsp;</td><td><a href="javascript:statistics('<?php echo ($goods["id"]); ?>')">统计</a>&nbsp;<a href="javascript: showGoods('<?php echo ($goods["id"]); ?>')">预览</a>&nbsp;<a href="javascript: edit('<?php echo ($goods["id"]); ?>')"><?php echo (L("_EDIT_DATA")); ?></a>&nbsp;<a href="javascript: delData('<?php echo ($goods["id"]); ?>')"><?php echo (L("_DELETE_DATA")); ?></a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table>
<!-- Think 系统列表组件结束 -->
 