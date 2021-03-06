<?php
// +----------------------------------------------------------------------
// | Fanwe 多语商城建站系统 (Build on ThinkPHP)
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 云淡风轻(97139915@qq.com)
// +----------------------------------------------------------------------

if (!defined('THINK_PATH')) exit();
require './global/common.php';

function getTabeSize($a,$b) {
    return byte_format($a+$b);
}
function byte_format($size, $dec=2)
{
	$a = array("B", "KB", "MB", "GB", "TB", "PB");
	$pos = 0;
	while ($size >= 1024) {
		 $size /= 1024;
		   $pos++;
	}
	return round($size,$dec)." ".$a[$pos];
}
//公共函数


function sysConfL($key)
{
	if(preg_match("/TITLE_DEFAULT_LANG_/",$key,$res))
	{
	 	$key = str_replace("TITLE_DEFAULT_LANG_","",$key);
	 	return $key;
	}
	return L($key);
}
function userGroupName($group_id)
{
	return D("UserGroup")->where("id=".$group_id)->getField("name_".DEFAULT_LANG_ID);	
}
function getCityName($city_id)
{
	return M("GroupCity")->where("id=".$city_id)->getField('name');
}
function get_client_ip() {
	if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" ))
		$ip = getenv ( "HTTP_CLIENT_IP" );
	else if (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" ))
		$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
	else if (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" ))
		$ip = getenv ( "REMOTE_ADDR" );
	else if (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" ))
		$ip = $_SERVER ['REMOTE_ADDR'];
	else
		$ip = "unknown";
	return ($ip);
}

// 缓存文件
function cmssavecache($name = '', $fields = '') {
	$Model = D ( $name );
	$list = $Model->select ();
	$data = array ();
	foreach ( $list as $key => $val ) {
		if (empty ( $fields )) {
			$data [$val [$Model->getPk ()]] = $val;
		} else {
			// 获取需要的字段
			if (is_string ( $fields )) {
				$fields = explode ( ',', $fields );
			}
			if (count ( $fields ) == 1) {
				$data [$val [$Model->getPk ()]] = $val [$fields [0]];
			} else {
				foreach ( $fields as $field ) {
					$data [$val [$Model->getPk ()]] [] = $val [$field];
				}
			}
		}
	}
	$savefile = cmsgetcache ( $name );
	// 所有参数统一为大写
	$content = "<?php\nreturn " . var_export ( array_change_key_case ( $data, CASE_UPPER ), true ) . ";\n?>";
	file_put_contents ( $savefile, $content );
}

function cmsgetcache($name = '') {
	return DATA_PATH . '~' . strtolower ( $name ) . '.php';
}
function getStatus($status, $imageShow = true) {
	switch ($status) {
		case 0 :
			$showText = L("FORBID");
			$showImg = '<IMG SRC="' . APP_TMPL_PATH . '/ThemeFiles/Images/locked.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="'.L("FORBID").'">';
			break;

		case 1 :
			$showText = L("NORMAL");
			$showImg = '<IMG SRC="' . APP_TMPL_PATH . '/ThemeFiles/Images/ok.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="'.L("NORMAL").'">';
			break;
	}
	return ($imageShow === true) ?  $showImg  : $showText;

}

function getMailStatus($status) {
	switch ($status) {
		case 0 :
			$showText = L("MAIL_STATUS_0");
			break;

		case 1 :
			$showText = L("MAIL_STATUS_1");		
			break;
	}
	return $showText;

}
function getDefaultStyle($style) {
	if (empty ( $style )) {
		return 'blue';
	} else {
		return $style;
	}

}
function IP($ip = '', $file = 'UTFWry.dat') {
	$_ip = array ();
	if (isset ( $_ip [$ip] )) {
		return $_ip [$ip];
	} else {
		import ( "ORG.Net.IpLocation" );
		$iplocation = new IpLocation ( $file );
		$location = $iplocation->getlocation ( $ip );
		$_ip [$ip] = $location ['country'] . $location ['area'];
	}
	return $_ip [$ip];
}

function getNodeName($id) {
	if (Session::is_set ( 'nodeNameList' )) {
		$name = Session::get ( 'nodeNameList' );
		return $name [$id];
	}
	$Group = D ( "Node" );
	$list = $Group->getField ( 'id,name' );
	$name = $list [$id];
	Session::set ( 'nodeNameList', $list );
	return $name;
}



function showStatus($status, $id) {
	switch ($status) {
		case 0 :
			$info = '<a href="javascript:resume(' . $id . ')">'.L("RESUME").'</a>';
			break;
		case 2 :
			$info = '<a href="javascript:pass(' . $id . ')">'.L("PASS").'</a>';
			break;
		case 1 :
			$info = '<a href="javascript:forbid(' . $id . ')">'.L("FORBID").'</a>';
			break;
		case - 1 :
			$info = '<a href="javascript:recycle(' . $id . ')">'.L("RECYCLE").'</a>';
			break;
	}
	return $info;
}

function showStatusPayment($status, $id) {
	if(M("Payment")->where("id=".$id)->getField("class_name")!="Cod")
	{
	switch ($status) {
		case 0 :
			$info = '<a href="javascript:resume(' . $id . ')">'.L("RESUME").'</a>';
			break;
		case 1 :
			$info = '<a href="javascript:forbid(' . $id . ')">'.L("FORBID").'</a>';
			break;

	}
	return $info;
	}
	else
	return '';
}
function showStatusJq($status, $id) {
	switch ($status) {
		case 0 :
			$info = '<a href="javascript:resumeJq(' . $id . ')">'.L("RESUME").'</a>';
			break;
		case 2 :
			$info = '<a href="javascript:passJq(' . $id . ')">'.L("PASS").'</a>';
			break;
		case 1 :
			$info = '<a href="javascript:forbidJq(' . $id . ')">'.L("FORBID").'</a>';
			break;
		case - 1 :
			$info = '<a href="javascript:recycleJq(' . $id . ')">'.L("RECYCLE").'</a>';
			break;
	}
	return $info;
}

function getInputType($status) {
	switch ($status) {
		case 0 :
			$info = L("INPUT_TYPE_0");
			break;
		case 1 :
			$info = L("INPUT_TYPE_1");
			break;
	}
	return $info;
}

/**
 +----------------------------------------------------------
 * 获取登录验证码 默认为4位数字
 +----------------------------------------------------------
 * @param string $fmode 文件名
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function build_verify($length = 4, $mode = 1) {
	return rand_string ( $length, $mode );
}


function sort_by($array, $keyname = null, $sortby = 'asc') {
	$myarray = $inarray = array ();
	# First store the keyvalues in a seperate array
	foreach ( $array as $i => $befree ) {
		$myarray [$i] = $array [$i] [$keyname];
	}
	# Sort the new array by
	switch ($sortby) {
		case 'asc' :
			# Sort an array and maintain index association...
			asort ( $myarray );
			break;
		case 'desc' :
		case 'arsort' :
			# Sort an array in reverse order and maintain index association
			arsort ( $myarray );
			break;
		case 'natcasesor' :
			# Sort an array using a case insensitive "natural order" algorithm
			natcasesort ( $myarray );
			break;
	}
	# Rebuild the old array
	foreach ( $myarray as $key => $befree ) {
		$inarray [] = $array [$key];
	}
	return $inarray;
}

/**
	 +----------------------------------------------------------
 * 产生随机字串，可用来自动生成密码
 * 默认长度6位 字母和数字混合 支持中文
	 +----------------------------------------------------------
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
	 +----------------------------------------------------------
 * @return string
	 +----------------------------------------------------------
 */
function rand_string($len = 6, $type = '', $addChars = '') {
	$str = '';
	switch ($type) {
		case 0 :
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars;
			break;
		case 1 :
			$chars = str_repeat ( '0123456789', 3 );
			break;
		case 2 :
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . $addChars;
			break;
		case 3 :
			$chars = 'abcdefghijklmnopqrstuvwxyz' . $addChars;
			break;
		default :
			// 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
			$chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789' . $addChars;
			break;
	}
	if ($len > 10) { //位数过长重复字符串一定次数
		$chars = $type == 1 ? str_repeat ( $chars, $len ) : str_repeat ( $chars, 5 );
	}
	if ($type != 4) {
		$chars = str_shuffle ( $chars );
		$str = substr ( $chars, 0, $len );
	} else {
		// 中文随机字
		for($i = 0; $i < $len; $i ++) {
			$str .= msubstr ( $chars, floor ( mt_rand ( 0, mb_strlen ( $chars, 'utf-8' ) - 1 ) ), 1 );
		}
	}
	return $str;
}
function pwdHash($password, $type = 'md5') {
	return md5($password);
}

function checkUrl($url)
{
	if(strtolower(substr($url,0,7))=="http://")
	return TRUE;
	else 
	return false;
}
function gtZero($id)
{
	return $id>0;
}



function genGoodsSn($sn)
{
	if($sn)
	{
		return $sn;
	}
	else 
	{
		$sn = fanweC("SN_PREFIX").toDate('ymdhis', gmtTime());
		$i = 1;
		while(D("Goods")->where("sn='".$sn."'")->count()>0||D("GoodsSpecItem")->where("sn='".$sn."'")->count()>0){
			$sn = fanweC("SN_PREFIX").toDate('ymdhis', gmtTime()).$i;
			$i = $i + 1;
		}
		
		return $sn;
	}
}

/**
 *  将一个用户自定义时区的日期转为GMT时间戳
 *
 * @access  public
 * @param   string      $str
 *
 * @return  integer
 */
function localStrToTime($str)
{
    $timezone = intval(fanweC('TIME_ZONE'));
	//$timezone = 8; 
	$time = strtotime($str) - $timezone * 3600;
    return $time;
}

/**
 * 当天的最大日期数字值
 *
 * @param unknown_type $str
 * @return unknown
 */
function localStrToTimeMax($str)
{
   if($str!='')
   {
	   $str = date("Y-m-d H:i:s",strtotime($str));
	   return localStrToTime($str);
   }
   else
   {
   		return 0;
   }
}

/**
 * 当天的最小日期数字值
 *
 * @param unknown_type $str
 * @return unknown
 */
function localStrToTimeMin($str)
{
	if($str!='')
	{
	   $str = date("Y-m-d H:i:s",strtotime($str));
	   return localStrToTime($str);		
	}
	else
	{
		return 0;
	}

}

/**
 * 将日期数字 返回成日期格式
 *
 * @param unknown_type $str
 * @return unknown
 */
function timeToLocalStr($time, $format = 'Y-m-d H:i:s') {
	return toDate ($time, $format );
}


//将重量转换为标准重量
function toBaseWeight($weight,$weight_id)
{
	$weight_radio = D("Weight")->where("id=".$weight_id)->getField("radio");
	return $weight*$weight_radio;
}
//将标准重量转换为当前重量
function fromBaseWeight($weight,$weight_id)
{
	$weight_radio = D("Weight")->where("id=".$weight_id)->getField("radio");
	return round($weight/$weight_radio,4);
}

function checkDateFormat($dateStr)
{
	if(preg_match ("/\b\d{4}-\d{2}-\d{2}\b/i", $dateStr)==1)
	return true;
	else
	return false;
}

function parseToTimeSpan($dateStr)
{
	if($dateStr)
	{
		$dataArr = explode("-",$dateStr);
		return mktime(0,0,0,intval($dataArr[1]),intval($dataArr[2]),intval($dataArr[0]));	
	}
	else 
	{
		return 0;
	}
}

function parseToTimeSpanFull($dateStr)
{
	if($dateStr)
	{
		$arr = explode(" ",$dateStr);
		$dataArr = explode("-",$arr[0]);
		$timeArr = explode(":",$arr[1]);
		
		return mktime(intval($timeArr[0]),intval($timeArr[1]),intval($timeArr[2]),intval($dataArr[1]),intval($dataArr[2]),intval($dataArr[0]));	
	}
	else 
	{
		return 0;
	}
}

function getArticleCateType($type)
{
	switch($type)
	{
		case '0':
			return L("ARTICLE_CATE_TYPE_0");
		case '1':
			return L("ARTICLE_CATE_TYPE_1");
		case '2':
			return L("ARTICLE_CATE_TYPE_2");
		case '3':
			return L("ARTICLE_CATE_TYPE_3");
		case '4':
			return L("ARTICLE_CATE_TYPE_4");
	}
}

function getOrderStatus($status)
{
	switch($status)
	{
		case '0':
			return L('ORDER_STATUS_0');
		case '1':
			return L('ORDER_STATUS_1');
		case '2':
			return L('ORDER_STATUS_2');
		case '3':
			return L('ORDER_STATUS_3');
		case '4':
			return L('ORDER_STATUS_4');
		case '5':
			return L('ORDER_STATUS_5');
	}
}

function getOrderEdit($id,$status)
{	
	$status = explode("_",$status);
	$money_status = intval($status[0]);
	$goods_status = intval($status[1]);
	$order_info = M("Order")->getById($id);
	$order_goods = M("Goods")->getById(M("OrderGoods")->where("order_id=".$id)->getField("rec_id"));
	
	if(($order_goods['is_group_fail']==1||$order_goods['promote_end_time']<gmtTime())&&(M("GroupBond")->where("order_id='".$order_info['sn']."' and use_time = 0 and end_time >".gmtTime())->count()==0) )
	{
		return "<a href='javascript:showOrder(".$id.");'>". L('_EDIT_DATA')."</a> <a href='javascript:foreverdelorder(".$id.");'>". L('_DELETE_DATA')."</a> ";	
	}
	elseif (($money_status > 0&&$money_status<4) || ($goods_status > 0&&$money_status<4&&$money_status>0)){
		return "<a href='javascript:showOrder(".$id.");'>". L('VIEW')."</a>";
	}
	else{
		return "<a href='javascript:showOrder(".$id.");'>". L('VIEW')."</a> <a href='javascript:foreverdelorder(".$id.");'>". L('_DELETE_DATA')."</a> ";	
	}
	
}

function getOrderGoodsStatus($status)
{	
	return L('ORDER_GOODS_STATUS_'.$status);
}


function getOrderMoneyStatus($status)
{	
	return L('ORDER_MONEY_STATUS_'.$status);
}
function getUserInchargeMoneyStatus($status)
{	
	return L('USER_INCHARGE_MONEY_STATUS_'.$status);
}
function checkDiscount($discount)
{
	if($discount <=0||$discount>1)
	{
		return false;
	}
	else 
		return true;
}
function priceFormat($num)
{
	return 	sprintf(fanweC("BASE_CURRENCY_UNIT"),number_format(round($num,2),2));
}
function priceVal($num)
{
	return str_replace(",","",number_format(round($num,2),2));
}
function getRegionName($arr)
{
	return $arr['name'];
}
function getNavType($type)
{
	switch($type)
	{
		case '1':
			return L('NAV_TYPE_1');
		case '2':
			return L('NAV_TYPE_2');
		case '3':
			return L('NAV_TYPE_3');	
			
	}
}
function getLinkType($type)
{
	switch($type)
	{
		case '1':
			return L('LINK_TYPE_1');
		case '2':
			return L('LINK_TYPE_2');
		case '0':
			return L('LINK_TYPE_0');
			
	}	
}

function getLogResult($rs)
{
	if($rs==1)
		return L('LOG_SUCCESS');
	else 
		return L('LOG_FAILED');
}

function getLang($var)
{
	return L("LOG_".$var);
}

function getAuthType($type)
{
	switch($type)
	{
		case '1':
			return L('AUTH_TYPE_1');
		case '2':
			return L('AUTH_TYPE_2');
		case '0':
			return L('AUTH_TYPE_0');
			
	}		
}
function getNode($arr,$field)
{
	if($field=="auth_type")
	{
		return getAuthType ($arr[$field]);
	}
	else
	return $arr[$field];
}
function getAdvType($type)
{
	switch($type)
	{
		case '1':
			return L('ADV_TYPE_1');
		case '2':
			return L('ADV_TYPE_2');
		case '3':
			return L('ADV_TYPE_3');

			
	}		
}
function getUserName($user_id)
{
	if(D("User")->where("id=".$user_id)->getField("user_name"))
	{
		return D("User")->where("id=".$user_id)->getField("user_name");
	}
	else 
	{
		return L("NO_USER");
	}
}
function getRUserName($user_id)
{
	if(D("User")->where("id=".$user_id)->getField("user_name"))
	{
		return D("User")->where("id=".$user_id)->getField("user_name");
	}
	else 
	{
		return "无推荐人";
	}
}
function check_mail($mail)
{
	if(!preg_match("/\w+@\w+\.\w{2,}\b/",$mail))
	   	{
		   			return false;
	   	}
	   	else 
	   	{
	   		return true;
	   	}
}

function check_time($timestr)
{
	if(preg_match("/\d{4}-\d{1,2}-\d{1,2} \d{1,2}:\d{1,2}:\d{1,2}/",$timestr))
	{
		return true;
	}
	else 
	{
		return false;
	}
}
function formatScore($score)
{
	return $score." ".L("SCORE_UNIT");
}

function countScore($score)
{
	return $score*fanweC("SCORE_RADIO");
	
}
function showStatusIncharge($status, $id) {
	switch ($status) {
		case 0 :
			$info = '<a href="javascript:resumeIncharge(' . $id . ')">'.L("CONFIRM").'</a>';
			break;
		case 1 :
			$info = '<a href="javascript:forbidIncharge(' . $id . ')">'.L("CANCEL").'</a>';
			break;
	}
	return $info;
}
function showStatusUncharge($status, $id) {
	switch ($status) {
		case 0 :
			$info = '<a href="javascript:resumeUncharge(' . $id . ')">'.L("CONFIRM").'</a>';
			break;
		case 1 :
			$info = '<a href="javascript:forbidUncharge(' . $id . ')">'.L("CANCEL").'</a>';
			break;
	}
	return $info;
}
function getPaymentName($payment_id)
{

	$default_lang_id = D("LangConf")->where("lang_name='".C('DEFAULT_LANG')."'")->getField("id");	
	$payment_info = D("Payment")->getById($payment_id);
	return $payment_info['name_'.$default_lang_id];
}
function getGoodsCateName($cate_id)
{
	$default_lang_id = D("LangConf")->where("lang_name='".C('DEFAULT_LANG')."'")->getField("id");	
	return D("GoodsCate")->where("id=".$cate_id)->getField("name_".$default_lang_id);
}
function getSort($sort,$goods_id)
{
	$str = "<span onclick='changeSort(this,".$goods_id.")' title='".L("CLICK_TO_CHANGE")."'>".$sort."</span>";
	return $str;
}
function getGoodsName($goods_id)
{
	$default_lang_id = D("LangConf")->where("lang_name='".C('DEFAULT_LANG')."'")->getField("id");	
	$goods_name = D("Goods")->where("id=".$goods_id." and status in (0,1)")->getField("name_".$default_lang_id);
	$str = "<a href='".U("Goods/edit",array("id"=>$goods_id))."' title='".L("VIEW_GOODS_DETAIL")."'>".$goods_name."</a>";
	return $str;
}
function getGoodsNameNoHref($goods_id)
{
	$default_lang_id = D("LangConf")->where("lang_name='".C('DEFAULT_LANG')."'")->getField("id");	
	$goods_name = D("Goods")->where("id=".$goods_id." and status in (0,1)")->getField("name_".$default_lang_id);
	
	return $goods_name;
}
function getScoreGoodsScore($score,$goods_id)
{
	$str = "<span onclick='changeScore(this,".$goods_id.")' title='".L("CLICK_TO_CHANGE")."'>".$score."</span>";
	return $str;
}
function getScoreGoodsStock($stock,$goods_id)
{
	$str = "<span onclick='changeStock(this,".$goods_id.")' title='".L("CLICK_TO_CHANGE")."'>".$stock."</span>";
	return $str;
}


function unescape($str,$charcode="") {
	$text = preg_replace_callback("/%u[0-9A-Za-z]{4}/","toUtf8",$str);
	if (empty($charcode)) {
	return $text;
	} else {
	return mb_convert_encoding($text, $charcode, "utf-8");
	}
}
function toUtf8($ar) {
	$c = "";
	foreach($ar as $val) {
	$val = intval(substr($val,2),16);
	if ($val < 0x7F){ // 0000-007F
	$c .= chr($val);
	} elseif ($val < 0x800) { // 0080-0800
	$c .= chr(0xC0 | ($val / 64));
	$c .= chr(0x80 | ($val % 64));
	} else { // 0800-FFFF
	$c .= chr(0xE0 | (($val / 64) / 64));
	$c .= chr(0x80 | (($val / 64) % 64));
	$c .= chr(0x80 | ($val % 64));
	}
	}
	return $c;
}
function showNavStatus($status,$id)
{
//	if(D("Nav")->where("id=".$id)->getField("is_fix")==0)
//	{	
		switch ($status) {
			case 0 :
				$info = '<a href="javascript:resume(' . $id . ')">'.L("RESUME").'</a>';
				break;
			case 2 :
				$info = '<a href="javascript:pass(' . $id . ')">'.L("PASS").'</a>';
				break;
			case 1 :
				$info = '<a href="javascript:forbid(' . $id . ')">'.L("FORBID").'</a>';
				break;
			case - 1 :
				$info = '<a href="javascript:recycle(' . $id . ')">'.L("RECYCLE").'</a>';
				break;
		}
		return $info;	
//	}
//	else
//	{
//		return '';
//	}
}

function showNavDel($id)
{
//	if(D("Nav")->where("id=".$id)->getField("is_fix")==0)
//	{	
		$info = '<a href="javascript:foreverdel(' . $id . ')">'.L("DELETE").'</a>';
		return $info;	
//	}
//	else
//	{
//		return '';
//	}
}
function getAdmName($id)
{
	return M("Admin")->where("id=".$id)->getField("adm_name");
}

function getHiddenBox($id)
{
	return $id."<input type='hidden' name='hiddenid[]' value='".$id."' />";
}

function get_mail_tmpl_status($name)
{
	if(fanweC("GROUP_MAIL_TMPL") == $name)
	{
		return '正在使用';
	}
	else
	{
		return "<a href='javascript:use_tmpl(\"".$name."\");'>使用该模板</a>";
	}
}

function formatPrice($price, $radio)
{
	$price = round(floatval($price),2);
	$price = sprintf(fanweC("BASE_CURRENCY_UNIT"),$price);
	return $price;
}
function formatWeight($weight,$goods_id)
{
	$weight_id = D("Goods")->where("id=".$goods_id)->getField("weight_unit");
	$weight_item = M("Weight")->getById($weight_id);
	$weight = round($weight/$weight_item['radio'],4);
	return $weight." ".$weight_item['name_'.FANWE_LANG_ID];
}
function checkArticleUName($uname)
{
	$id = intval($_REQUEST['id']);
	if(M("Article")->where("u_name='".$uname."' and id <> $id")->count()==0)
	{
		return true;	
	}
	else
	return false;
}
function checkGoodsUName($uname)
{
	$id = intval($_REQUEST['id']);
	if(M("Goods")->where("u_name='".$uname."' and id <> $id")->count()==0)
	{
		return true;	
	}
	else
	return false;	
}
function get_role_name($id)
{
	$admin = M("Admin")->getById($id);
	if($admin['adm_name'] == fanweC("SYS_ADMIN"))
	{
		return "<span style='color:#f30;'>默认管理员</span>";
	}
	else
	return M("Role")->where("id=".$admin['role_id'])->getField("name");
}
function getDepartName($id)
{
	return M("SuppliersDepart")->where("id=".$id)->getField("depart_name");
}
function getEvcType($type)
{
	if($type==0)
	return '代金券';
	if($type==1)
	return '充值券';
}
function getCommentStatus($score)
{
	if($score==3)
	return "好评";
	
	if($score==2)
	return "中评";
	
	if($score==1)
	return "差评";
}

function getSupplierName($supplier_id)
{
	return "<a href='".u("Suppliers/edit",array("id"=>$supplier_id))."'>".M("Suppliers")->where("id=".$supplier_id)->getField("name")."</a>";
}

function getSuppliersCateName($cate_id)
{
	return M("SuppliersCate")->where("id=".$cate_id)->getField("name");
}
function getIsPaid($is_paid)
{
	if($is_paid==0) return "未支付";
	if($is_paid==1) return "已支付";
}
function get_user_group($group_id)
{
	return M("UserGroup")->where("id=".$group_id)->getField("name_1");
}
function getDeliveryRefer($order_id)
{
	if(intval($order_id)>0)
	{
		return "拼购运单：<a href='".u("Order/show",array("id"=>$order_id))."' target='_blank'>".M("Order")->where("id=".$order_id)->getField("sn")."</a>";
	}
	else 
	return '';
}
function getDeliveryOrderList($order_id)
{
	$list = M("Order")->where("delivery_refer_order_id=".$order_id)->findAll();
	$html = "";
	if($list)
	{
		
		foreach($list as $k=>$v)
		{
			$html.="<br />拼购运单的订单: <a href='".u("Order/show",array("id"=>$v['id']))."' target='_blank'>".$v['sn']."</a>";
		}	
	}
	return $html;
}
function msubstr($str, $start=0, $length=10, $charset="utf-8", $suffix=true)
{
    if(function_exists("mb_substr"))
    {
        $slice =  mb_substr($str, $start, $length, $charset);
        if($suffix&$slice!=$str) return $slice."…";
    	return $slice;
    }
    elseif(function_exists('iconv_substr')) {
        return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix&&$slice!=$str) return $slice."…";
    return $slice;
}
/*又拍云 图片地址替换 为本地地址*/
function upyun2host(&$url){
    $url = strtr($url, array('/upyun'=>''));
}
/*本地地址 图片地址替换 为又拍云*/
function host2upyun(&$url){
    $url = '/upyun'.$url;
}
function getCouponRegion($quan_id){
	return D("CouponRegion")->where("id=$quan_id")->getField('name');
}
/*商家结算*/
function show_table_substr($word,$cut=20)
{
	return "<span title='".$word."'>".msubstr($word,0,$cut)."</span>";
}
function get_balance_status($status)
{
	return l("BALANCE_".$status);
}
/*获取发货状态*/
function get_dstatus($id)
{ 
                $sql_str =  'SELECT a.*,'.
					'       b.sn as order_sn,'.
                                         '       b.goods_status as goods_status,'.
					'       b.order_total_price as final_amount,'.
					'       c.name_1 as fname,'.
					'       e.name as express_name,'.
					'       d.user_name as mname'.
					'  FROM '.C("DB_PREFIX").'order_consignment a'.
					'  LEFT OUTER JOIN '.C("DB_PREFIX").'order b ON a.order_id = b.id'.
					'  LEFT OUTER JOIN '.C("DB_PREFIX").'delivery c ON a.delivery_id = c.id'.
					'  LEFT OUTER JOIN '.C("DB_PREFIX").'user d ON b.user_id = d.id'.
					'  LEFT OUTER JOIN '.C("DB_PREFIX").'express e ON a.express_id = e.id '.
					'  where b.id ='.$id.
					' ORDER BY a.create_time desc';
                $order_incharge_list =  $GLOBALS['db']->getRow($sql_str);
                //var_dump($order_incharge_list);exit;
		if($order_incharge_list)
		{	
			return L('ORDER_GOODS_STATUS_'.$order_incharge_list[goods_status])."，发货单号：".$order_incharge_list['express_name'].$order_incharge_list['delivery_code']."，发货时间：".toDate($order_incharge_list['create_time'])."</span>";
		}
                else
		return "未发货";
}
/**
 * 结算
 * @param unknown_type $rel_ids 结算的数据ID数组
 * @param unknown_type $deal_id 项目编号
 * @param memo 备注 
 */
function do_balance($rel_ids,$deal_id,$memo="")
{
	$deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."goods where id = ".$deal_id);
	$now = gmtTime();
	if($deal_info['type_id']==0)
	{ 
		$sql = "update ".DB_PREFIX."group_bond set is_balance = 2,balance_time = ".$now.",balance_memo = '".$memo."' where id in (".implode(",",$rel_ids).") and is_balance <> 2";
		$GLOBALS['db']->query($sql);	
		//同步更新订单商品
		$sql_item = "select doi.* from ".DB_PREFIX."order_goods as doi where doi.id in(select distinct(dc.order_goods_id) as item_id from ".DB_PREFIX."group_bond as dc where dc.id in (".implode(",",$rel_ids)."))";
		$item_list = $GLOBALS['db']->getAll($sql_item);
		foreach($item_list as $k=>$v)
		{
			if($deal_info['is_order_sms']==1)
			{
				//按单
				$GLOBALS['db']->query("update ".DB_PREFIX."order_goods set is_balance = 2,balance_time = ".$now.",balance_memo = '".$memo."' where id = ".$v['id']." and is_balance <> 2");
			}
			else
			{
				if($GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."group_bond where order_goods_id = ".$v['id']." and is_balance = 2")==$v['number'])
				{
					//全部	
					$GLOBALS['db']->query("update ".DB_PREFIX."order_goods set is_balance = 2,balance_time = ".$now.",balance_memo = '".$memo."' where id = ".$v['id']." and is_balance <> 2");			
				}
				else
				{
					//部份
					$GLOBALS['db']->query("update ".DB_PREFIX."order_goods set is_balance = 3,balance_time = ".$now.",balance_memo = '".$memo."' where id = ".$v['id']." and is_balance <> 2");			
				}
			}
		}		
	}
	else
	{
		$sql = "update ".DB_PREFIX."order_goods set is_balance = 2,balance_time = ".$now.",balance_memo = '".$memo."' where id in (".implode(",",$rel_ids).") and is_balance <> 2";
		$GLOBALS['db']->query($sql);
	}
}

?>