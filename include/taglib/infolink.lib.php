<?php   if(!defined('DEDEINC')) exit('Request Error!');
/**
 * 分类信息地区与类型快捷链接
 *
 * @version        $Id: infolink.lib.php 1 9:29 2010年7月6日Z tianya $
 * @package        DedeCMS.Taglib
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
 
/*>>dede>>
<name>分类信息地区与类型快捷链接</name>
<type>全局标记</type>
<for>V55,V56,V57</for>
<description>调用分类信息地区与类型快捷链接</description>
<demo>
{dede:infolink /}
</demo>
<attributes>
</attributes> 
>>dede>>*/
 
require_once(DEDEINC.'/enums.func.php');
require_once(DEDEDATA.'/enums/nativeplace.php');
require_once(DEDEDATA.'/enums/infotype.php');
require_once(DEDEDATA.'/enums/itemtype.php'); //修改处
require_once(DEDEDATA.'/enums/investment.php'); //修改处

function lib_infolink(&$ctag,&$refObj)
{
    global $dsql,$nativeplace,$infotype,$itemtype,$investment,$hasSetEnumJs,$cfg_cmspath,$cfg_mainsite; //修改处
    global $em_nativeplaces,$em_infotypes,$em_itemtypes,$em_investments; //修改处
    
    //属性处理
    //$attlist="row|12,titlelen|24";
    //FillAttsDefault($ctag->CAttribute->Items,$attlist);
    //extract($ctag->CAttribute->Items, EXTR_SKIP);
    
    $cmspath = ( (empty($cfg_cmspath) || !preg_match("#\/$#", $cfg_cmspath)) ? $cfg_cmspath.'/' : $cfg_cmspath );
    $baseurl = preg_replace("#\/$#", '', $cfg_mainsite).$cmspath;
    
    $smalltypes = '';
    if( !empty($refObj->TypeLink->TypeInfos['smalltypes']) ) {
        $smalltypes = explode(',', $refObj->TypeLink->TypeInfos['smalltypes']);
    }
    
    if(empty($refObj->Fields['typeid'])) {
        $row = $dsql->GetOne("SELECT id FROM `#@__arctype` WHERE channeltype='-8' And reid = '0' ");
        $typeid = (is_array($row) ? $row['id'] : 0);
    }
    else {
        $typeid = $refObj->Fields['typeid'];
    }
    
    $innerText = trim($ctag->GetInnerText());
    if(empty($innerText)) $innerText = GetSysTemplets("info_link.htm");
    $ctp = new DedeTagParse();
    $ctp->SetNameSpace('field','[',']');
    $ctp->LoadSource($innerText);

    $revalue = $seli = '';
    $channelid = ( empty($refObj->TypeLink->TypeInfos['channeltype']) ? -8 : $refObj->TypeLink->TypeInfos['channeltype'] );
    
    $fields = array('nativeplace'=>'','infotype'=>'','itemtype'=>'','investment'=>'','typeid'=>$typeid,
                    'channelid'=>$channelid,'linkallplace'=>'','linkalltype'=>'');//修改处
    
    $fields['nativeplace'] = $fields['infotype'] = $fields['itemtype'] = $fields['investment'] = '';//修改处
    
	
	$fields['linkallplace'] = "<a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&infotype={$infotype}&itemtype={$itemtype}&investment={$investment}'>不限</a>";//修改处
    $fields['linkalltype'] = "<a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$nativeplace}&itemtype={$itemtype}&investment={$investment}'>不限</a>";//修改处
	/*$fields['linkallitemtype'] = "<a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$nativeplace}&infotype={$infotype}&investment={$investment}'>全部</a>";//修改处
	$fields['linkallinvestment'] = "<a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$nativeplace}&infotype={$infotype}&itemtype={$itemtype}'>全部</a>";//修改处*/
	
//修改片段开始
if(empty($itemtype))
 { 
$fields['linkallitemtype'] .= " <span>全部</span>"; 
} 
else {
$fields['linkallitemtype'] .= " <a href='{$baseurl}list-1{$investment}.html'>全部</a>";
}
if(empty($investment))
 { 
$fields['linkallinvestment'] .= " <span>全部</span>"; 
} 
else {
$fields['linkallinvestment'] .= " <a href='{$baseurl}list-2{$itemtype}.html'>全部</a>";
} 
//修改片段结束

    
    //地区链接
   if(empty($nativeplace))
    {
        foreach($em_nativeplaces as $eid=>$em)
        {
            if($eid % 500 != 0) continue;
            $fields['nativeplace'] .= " <a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$eid}&infotype={$infotype}&itemtype={$itemtype}'>{$em}</a>\r\n";
        }
    }
    else
    {
        $sontype = ( ($nativeplace % 500 != 0) ? $nativeplace : 0 );
        $toptype = ( ($nativeplace % 500 == 0) ? $nativeplace : ( $nativeplace-($nativeplace%500) ) );
		//2011-6-21 修改地区列表的一个小空格 论坛http://bbs.dedecms.com/371492.html(by：织梦的鱼)
        $fields['nativeplace'] = "<a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$toptype}&infotype={$infotype}&itemtype={$itemtype}'> <b>{$em_nativeplaces[$toptype]}</b></a> &gt;&gt; ";
        foreach($em_nativeplaces as $eid=>$em)
        {
            if($eid < $toptype+1 || $eid > $toptype+499) continue;
            if($eid == $nativeplace) {
                $fields['nativeplace'] .= " <b>{$em}</b>\r\n";
            }
            else {
                $fields['nativeplace'] .= " <a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$eid}&infotype={$infotype}&itemtype={$itemtype}'>{$em}</a>\r\n";
          }
      }
    }
/* 省份地区同时显示foreach($em_nativeplaces as $eid=>$em)
{
if($eid % 500 != 0) continue;
$fields['nativeplace'] .= " <a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$eid}'>{$em}</a>\r\n";
}
//地区链接
if(empty($nativeplace))
{
foreach($em_nativeplaces as $eid=>$em)
{
if($eid > 999 ) continue;
$fields['diqu'] .= " <a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$eid}'>{$em}</a>\r\n";
} 

}
else
{
$sontype = ( ($nativeplace % 500 != 0) ? $nativeplace : 0 );
$toptype = ( ($nativeplace % 500 == 0) ? $nativeplace : ( $nativeplace-($nativeplace%500) ) );

foreach($em_nativeplaces as $eid=>$em)
{
if($eid < $toptype+1 || $eid > $toptype+499) continue;
if($eid == $nativeplace) {
$fields['diqu'] .= " <b><a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$nativeplace}'>{$em}</a></b>\r\n";
}
else {
$fields['diqu'] .= " <a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&nativeplace={$eid}'>{$em}</a>\r\n";
}
}
}*/
    //小分类链接
    if(empty($infotype) || is_array($smalltypes))
    {
        
        foreach($em_infotypes as $eid=>$em)
        {
            if(!is_array($smalltypes) && $eid % 500 != 0) continue;
            if(is_array($smalltypes) && !in_array($eid, $smalltypes)) continue;
            if($eid == $infotype) 
            {
                $fields['infotype'] .= " <b>{$em}</b>\r\n";
            }
            else {
                $fields['infotype'] .= " <a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&infotype={$eid}&nativeplace={$nativeplace}&itemtype={$itemtype}'>{$em}</a>\r\n";
            }
        }
    }
    else
    {
        $sontype = ( ($infotype % 500 != 0) ? $infotype : 0 );
        $toptype = ( ($infotype % 500 == 0) ? $infotype : ( $infotype-($infotype%500) ) );
        $fields['infotype'] .= "<a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&infotype={$toptype}&nativeplace={$nativeplace}&itemtype={$itemtype}'><b>{$em_infotypes[$toptype]}</b></a> &gt;&gt; ";
        foreach($em_infotypes as $eid=>$em)
        {
            if($eid < $toptype+1 || $eid > $toptype+499) continue;
            if($eid == $infotype) {
                $fields['infotype'] .= " <b>{$em}</b>\r\n";
            }
            else {
                $fields['infotype'] .= " <a href='{$baseurl}plus/list.php?channelid={$channelid}&tid={$typeid}&infotype={$eid}&nativeplace={$nativeplace}&itemtype={$itemtype}'>{$em}</a>\r\n";
          }
      }
    }
 
//修改片段开始
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 499 || $eid > 500 ) continue;
if($eid == $itemtype) { 
$fields['item01'] .= " <span><b>{$em}</b></span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item01'] .= " <b><a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a></b>\r\n";
$fields['nowitem'] .= "";
} 
}
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 501 || $eid > 999 ) continue;
if($eid == $itemtype) { 
$fields['item01'] .= " <span>{$em}</span>";
$fields['nowitem'] .= "{$em}"; 
} 
else {
$fields['item01'] .= " <a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a>\r\n";
$fields['nowitem'] .= "";
} 
}


foreach($em_itemtypes as $eid=>$em)
{
if($eid < 999 || $eid > 1000 ) continue;
if($eid == $itemtype) { 
$fields['item02'] .= " <span><b>{$em}</b></span>";
$fields['nowitem'] .= "{$em}"; 
} 
else {
$fields['item02'] .= " <b><a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a></b>\r\n";
$fields['nowitem'] .= "";
} 
}
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 1001 || $eid > 1499 ) continue;
if($eid == $itemtype) { 
$fields['item02'] .= " <span>{$em}</span>";
$fields['nowitem'] .= "{$em}"; 
} 
else {
$fields['item02'] .= " <a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a>\r\n";
$fields['nowitem'] .= "";
} 
}


foreach($em_itemtypes as $eid=>$em)
{
if($eid < 1499 || $eid > 1500 ) continue;
if($eid == $itemtype) { 
$fields['item03'] .= " <span><b>{$em}</b></span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item03'] .= " <b><a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a></b>\r\n";
$fields['nowitem'] .= "";
} 
}
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 1501 || $eid > 1999 ) continue;
if($eid == $itemtype) { 
$fields['item03'] .= " <span>{$em}</span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item03'] .= " <a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a>\r\n";
$fields['nowitem'] .= "";
} 
}


foreach($em_itemtypes as $eid=>$em)
{
if($eid < 1999 || $eid > 2000 ) continue;
if($eid == $itemtype) { 
$fields['item04'] .= " <span><b>{$em}</b></span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item04'] .= " <b><a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a></b>\r\n";
$fields['nowitem'] .= "";
} 
}
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 2001 || $eid > 2499 ) continue;
if($eid == $itemtype) { 
$fields['item04'] .= " <span>{$em}</span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item04'] .= " <a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a>\r\n";
$fields['nowitem'] .= "";
} 
}


foreach($em_itemtypes as $eid=>$em)
{
if($eid < 2499 || $eid > 2500 ) continue;
if($eid == $itemtype) { 
$fields['item05'] .= " <span><b>{$em}</b></span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item05'] .= " <b><a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a></b>\r\n";
$fields['nowitem'] .= "";
} 
}
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 2501 || $eid > 2999 ) continue;
if($eid == $itemtype) { 
$fields['item05'] .= " <span>{$em}</span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item05'] .= " <a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a>\r\n";
$fields['nowitem'] .= "";
} 
}


foreach($em_itemtypes as $eid=>$em)
{
if($eid < 2999 || $eid > 3000 ) continue;
if($eid == $itemtype) { 
$fields['item06'] .= " <span><b>{$em}</b></span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item06'] .= " <b><a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a></b>\r\n";
$fields['nowitem'] .= "";
} 
}
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 3001 || $eid > 3499 ) continue;
if($eid == $itemtype) { 
$fields['item06'] .= " <span>{$em}</span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item06'] .= " <a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a>\r\n";
$fields['nowitem'] .= "";
} 
}


foreach($em_itemtypes as $eid=>$em)
{
if($eid < 3499 || $eid > 3500 ) continue;
if($eid == $itemtype) { 
$fields['item07'] .= " <span><b>{$em}</b></span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item07'] .= " <b><a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a></b>\r\n";
$fields['nowitem'] .= "";
} 
}
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 3501 || $eid > 3999 ) continue;
if($eid == $itemtype) { 
$fields['item07'] .= " <span>{$em}</span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item07'] .= " <a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a>\r\n";
$fields['nowitem'] .= "";
} 
}


foreach($em_itemtypes as $eid=>$em)
{
if($eid < 3999 || $eid > 4000 ) continue;
if($eid == $itemtype) { 
$fields['item08'] .= " <span><b>{$em}</b></span>";
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item08'] .= " <b><a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a></b>\r\n";
$fields['nowitem'] .= "";
} 
}
foreach($em_itemtypes as $eid=>$em)
{
if($eid < 4001 || $eid > 4499 ) continue;
if($eid == $itemtype) { 
$fields['item08'] .= " <span>{$em}</span>"; 
$fields['nowitem'] .= "{$em}";
} 
else {
$fields['item08'] .= " <a href='{$baseurl}list-2{$eid}-1{$investment}.html'>{$em}</a>\r\n";
$fields['nowitem'] .= "";
} 
}

//投资金额
foreach($em_investments as $eid=>$em)
{
if($eid < 499 ) continue;
if($eid == $investment) { 
$fields['investment'] .= " <span>{$em}</span>"; 
$fields['nowprice'] .= "{$em}";
} 
else {
$fields['investment'] .= " <a href='{$baseurl}list-1{$eid}-2{$itemtype}.html'>{$em}</a>\r\n";
$fields['nowprice'] .= "";
} 
}
//修改片段结束			   


    
    if(is_array($ctp->CTags))
    {
        foreach($ctp->CTags as $tagid=>$ctag)
        {
            if(isset($fields[$ctag->GetName()])) {
                $ctp->Assign($tagid,$fields[$ctag->GetName()]);
            }
        }
        $revalue .= $ctp->GetResult();
    }
    
    return $revalue;
}