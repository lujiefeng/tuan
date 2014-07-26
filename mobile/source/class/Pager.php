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

// 更正重写模式下的分页链接
// +----------------------------------------------------------------------
// $Id$
//定义语言常量
define("RECORD_COUNT",$GLOBALS['Ln']["RECORD_COUNT"]);  //条记录
define("PREV_PAGE",$GLOBALS['Ln']["PREV_PAGE"]);  //上一页
define("NEXT_PAGE",$GLOBALS['Ln']["NEXT_PAGE"]);  //下一页
define("FIRST_PAGE",$GLOBALS['Ln']["FIRST_PAGE"]);	//第一页
define("LAST_PAGE",$GLOBALS['Ln']["LAST_PAGE"]);     //最后一页
define("PAGE",$GLOBALS['Ln']["PAGE"]);   //页
define("GO_PREV",$GLOBALS['Ln']["GO_PREV"]);  //上
define("GO_NEXT",$GLOBALS['Ln']["GO_NEXT"]);	//下
define("ORGION_FORMAT","%totalRow% %header% %nowPage%/%totalPage% ".PAGE." %upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end%");
class Pager {
    // 起始行数
    public $firstRow	;
    // 列表每页显示行数
    public $listRows	;
    // 页数跳转时要带的参数
    public $parameter  ;
    // 分页总页面数
    protected $totalPages  ;
    // 总行数
    protected $totalRows  ;
    // 当前页数
    protected $nowPage    ;
    // 分页的栏的总页数
    protected $coolPages   ;
    // 分页栏每页显示的页数
    protected $rollPage   ;
	// 分页显示定制
    protected $config  =	array(
    	'header'=>RECORD_COUNT,
    	'prev'=>PREV_PAGE,
    	'next'=>NEXT_PAGE,
    	'first'=>FIRST_PAGE,
    	'last'=>LAST_PAGE,
    	'theme'=> ORGION_FORMAT
    );

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     +----------------------------------------------------------
     */
    public function __construct($totalRows,$listRows,$parameter='') {
        $this->totalRows = $totalRows;
        $this->parameter = $parameter;
        $this->rollPage = 5;
        $this->listRows = !empty($listRows)?$listRows:a_fanweC('PAGE_LISTROWS');
        $this->totalPages = ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages  = ceil($this->totalPages/$this->rollPage);
        $this->nowPage  = !empty($_GET['p'])?$_GET['p']:1;
        if(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
        $this->firstRow = $this->listRows*($this->nowPage-1);
    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }

    /**
     +----------------------------------------------------------
     * 分页显示输出
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function show() {
        if(0 == $this->totalRows) return '';
        $p = 'p';
        $delim = '-';
        $nowCoolPage      = ceil($this->nowPage/$this->rollPage);
        //$url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;
    	if (isset ( $_SERVER ['HTTP_X_REWRITE_URL'] )) {
			$_SERVER ['REQUEST_URI'] = $_SERVER ['HTTP_X_REWRITE_URL'];
		} //ISAPI_Rewrite 2.x w/ HTTPD.INI configuration
		else if (isset ( $_SERVER ['HTTP_REQUEST_URI'] )) {
			$_SERVER ['REQUEST_URI'] = $_SERVER ['HTTP_REQUEST_URI'];
			//Good to go!
		} //ISAPI_Rewrite isn't installed or not configured
		else {
			//Someone didn't follow the instructions!
			if (isset ( $_SERVER ['SCRIPT_NAME'] ))
				$_SERVER ['HTTP_REQUEST_URI'] = $_SERVER ['SCRIPT_NAME'];
			else
				$_SERVER ['HTTP_REQUEST_URI'] = $_SERVER ['PHP_SELF'];
			if ($_SERVER ['QUERY_STRING']) {
				$_SERVER ['HTTP_REQUEST_URI'] .= '?' . $_SERVER ['QUERY_STRING'];
			}
			
			$_SERVER ['REQUEST_URI'] = $_SERVER ['HTTP_REQUEST_URI'];
		}
        $url  =  $_SERVER['REQUEST_URI'].$this->parameter;
        $parse = parse_url($url);
        if(isset($parse['query'])) {
            parse_str($parse['query'],$params);
            unset($params[$p]);
            $url   =  $parse['path'].'?'.http_build_query($params);
        }
        //上下翻页字符串
        $upRow   = $this->nowPage-1;
        $downRow = $this->nowPage+1;
        if ($upRow>0){
            $upPage="<a href='".$url."&".$p."=$upRow' class='page_ctrl'>".$this->config['prev']."</a>";
        }else{
            $upPage="";
        }

        if ($downRow <= $this->totalPages){
            $downPage="<a href='".$url."&".$p."=$downRow' class='page_ctrl'>".$this->config['next']."</a>";
        }else{
            $downPage="";
        }
        // << < > >>
        if($nowCoolPage == 1){
            $theFirst = "";
            $prePage = "";
        }else{
            $preRow =  $this->nowPage-$this->rollPage;
            
        	if($preRow < 1)
            {
            	$preRow = 1;
            }
            
            $prePage = "<a href='".$url."&".$p."=$preRow' class='page_ctrl'>".GO_PREV.$this->rollPage.PAGE."</a>";
            $theFirst = "<a href='".$url."&".$p."=1' class='page_ctrl'>".$this->config['first']."</a>";
        }
        if($nowCoolPage == $this->coolPages){
            $nextPage = "";
            $theEnd="";
        }else{
            $nextRow = $this->nowPage+$this->rollPage;
            if($nextRow> $this->totalPages)
            {
            	$nextRow = $this->totalPages;
            }
            $theEndRow = $this->totalPages;
            $nextPage = "<a href='".$url."&".$p."=$nextRow' class='page_ctrl'>".GO_NEXT.$this->rollPage.PAGE."</a>";
            $theEnd = "<a href='".$url."&".$p."=$theEndRow' class='page_ctrl'>".$this->config['last']."</a>";
        }
        // 1 2 3 4 5
        $linkPage = "";
        for($i=1;$i<=$this->rollPage;$i++){
            $page=($nowCoolPage-1)*$this->rollPage+$i;
            if($page!=$this->nowPage){
                if($page<=$this->totalPages){
                   $linkPage .= "&nbsp;<a href='".$url."&".$p."=$page'>&nbsp;".$page."&nbsp;</a>";
                    
                }else{
                    break;
                }
            }else{
                if($this->totalPages != 1){
                    $linkPage .= "&nbsp;<span class='current'>".$page."</span>";
                }
            }
        }
        $pageStr	 =	 str_replace(
            array('%header%','%nowPage%','%totalRow%','%totalPage%','%upPage%','%downPage%','%first%','%prePage%','%linkPage%','%nextPage%','%end%'),
            array($this->config['header'],$this->nowPage,$this->totalRows,$this->totalPages,$upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd),$this->config['theme']);
        return $pageStr;
    }

}


?>