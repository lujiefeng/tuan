<?php if (!defined('THINK_PATH')) exit();?>
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
<table id="checkList" class="list" cellpadding=0 cellspacing=0 ><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('checkList')"></th><th width="6%"><a href="javascript:sortBy('id','<?php echo ($sort); ?>','index')" title="按照<?php echo (L("ID")); ?><?php echo ($sortType); ?> "><?php echo (L("ID")); ?><?php if(($order)  ==  "id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('goods_id','<?php echo ($sort); ?>','index')" title="按照团购编号<?php echo ($sortType); ?> ">团购编号<?php if(($order)  ==  "goods_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="200"><a href="javascript:sortBy('goods_name','<?php echo ($sort); ?>','index')" title="按照团购名称<?php echo ($sortType); ?> ">团购名称<?php if(($order)  ==  "goods_name"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('sn','<?php echo ($sort); ?>','index')" title="按照序列号<?php echo ($sortType); ?> ">序列号<?php if(($order)  ==  "sn"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('password','<?php echo ($sort); ?>','index')" title="按照密码<?php echo ($sortType); ?> ">密码<?php if(($order)  ==  "password"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('end_time','<?php echo ($sort); ?>','index')" title="按照过期时间<?php echo ($sortType); ?> ">过期时间<?php if(($order)  ==  "end_time"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('use_time','<?php echo ($sort); ?>','index')" title="按照使用时间<?php echo ($sortType); ?> ">使用时间<?php if(($order)  ==  "use_time"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('order_id','<?php echo ($sort); ?>','index')" title="按照订单号<?php echo ($sortType); ?> ">订单号<?php if(($order)  ==  "order_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('user_id','<?php echo ($sort); ?>','index')" title="按照会员名<?php echo ($sortType); ?> ">会员名<?php if(($order)  ==  "user_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_valid','<?php echo ($sort); ?>','index')" title="按照已发放给会员<?php echo ($sortType); ?> ">已发放给会员<?php if(($order)  ==  "is_valid"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="80"><a href="javascript:sortBy('send_count','<?php echo ($sort); ?>','index')" title="按照短信发送次数<?php echo ($sortType); ?> ">短信发送次数<?php if(($order)  ==  "send_count"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('depart_id','<?php echo ($sort); ?>','index')" title="按照确定部门名称<?php echo ($sortType); ?> ">确定部门名称<?php if(($order)  ==  "depart_id"): ?><img src="__TMPL__ThemeFiles/Images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bond): ++$i;$mod = ($i % 2 )?><tr class="row" onmouseover="over(event)" onmouseout="out(event)" onclick="change(event)" ><td><?php if(($bond['level'] == '0')or($bond['level'] > 0)): ?><?php else: ?><input type="checkbox" class="key" name="key"	value="<?php echo ($bond["id"]); ?>" <?php if($bond['checked']): ?>checked="checked"<?php endif; ?> ><?php endif; ?></td><td><?php echo ($bond["id"]); ?>&nbsp;</td><td><?php echo ($bond["goods_id"]); ?>&nbsp;</td><td><?php echo ($bond["goods_name"]); ?>&nbsp;</td><td><?php echo ($bond["sn"]); ?>&nbsp;</td><td><?php echo ($bond["password"]); ?>&nbsp;</td><td><?php echo (toDate($bond["end_time"])); ?>&nbsp;</td><td><?php echo (toDate($bond["use_time"])); ?>&nbsp;</td><td><?php echo (getOrderId($bond["order_id"],$goods['order_id'])); ?>&nbsp;</td><td><?php echo (getUserName($bond["user_id"])); ?>&nbsp;</td><td><?php echo (getStatus($bond["is_valid"])); ?>&nbsp;</td><td><?php echo ($bond["send_count"]); ?>&nbsp;</td><td><?php echo (getDepartName($bond["depart_id"])); ?>&nbsp;</td><td><a href="javascript:edit('<?php echo ($bond["id"]); ?>')"><?php echo (L("_EDIT_DATA")); ?></a>&nbsp;<a href="javascript:foreverdel('<?php echo ($bond["id"]); ?>')"><?php echo (L("_DELETE_DATA")); ?></a>&nbsp;<a href="javascript:send_sms('<?php echo ($bond["id"]); ?>')">发送短信</a>&nbsp;<a href="javascript:send_mail('<?php echo ($bond["id"]); ?>')">发送邮件</a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table>
<!-- Think 系统列表组件结束 -->
 