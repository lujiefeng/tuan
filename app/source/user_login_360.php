<?php

include_once (VENDOR_PATH . 'user_login/360/Hao360Auth.php');
define("APP_KEY", a_fanweC('360_KEY'));       // input your key
define("APP_SECRET", a_fanweC('360_SECRET')); //input you secret
if ($_REQUEST['oauth_360'] == '1') {
    session_start();
    $callback = 'http://' . $_SERVER['HTTP_HOST'] . __ROOT__ . "/index.php?m=user&a=login_360&goods_id=" . intval($_REQUEST ['id']);


    $authSvc = new Hao360Auth();
    $token = $authSvc->getRequestToken();
//var_dump($token);
    if ($token["oauth_token"]) {
        $_SESSION['request_token'] = $token;
        $authorizeUrl = $authSvc->getAuthorizeURL($token['oauth_token'], $callback);
        header("Location:$authorizeUrl");
    } else {
        //错误了,可以定义跳转到对应错误页面
        echo " AUTH FAIL ! \r\n";
        echo $token["msg"];
    }
} else {
    $is_360 = qihu_info();
    $u_id = $_SESSION['qid'];
    $user_data = $GLOBALS['db']->getRow("select * from " . DB_PREFIX . "user where 360_id = '" . $_SESSION['qid'] . "' and 360_id <> 0");
    $names = $GLOBALS['db']->getRow("select * from " . DB_PREFIX . "user where user_name = '" . trim($_SESSION['qname']) . "' ");
    $has_name = empty($names) ? 0 : 1;
    if (!$user_data && !$has_name) {
        $data ['user_name'] = trim($_SESSION ['qname']);
        $data ['user_pwd'] = trim($_SESSION ['qmail']);
        $data ['email'] = trim($_SESSION ['qmail']);
        $data ['360_id'] = trim($_SESSION ['qid']);
        $data ['status'] = 1;
        $data ['last_ip'] = $_SESSION['CLIENT_IP'];
        $data ['score'] = intval(a_fanweC("DEFAULT_SCORE"));
        $data ['status'] = a_fanweC('USER_AUTO_REG');
        $data ['create_time'] = a_gmtTime();
        $data ['update_time'] = a_gmtTime();
        $data ['group_id'] = a_fanweC("DEFAULT_USER_GROUP");

        $code = a_fanweC('INTEGRATE_CODE');
        if (empty($code))
            $code = 'fanwe';
        if ($code == 'ucenter') {
            $users = & init_users3_1();
            $users->need_sync = false;
            $is_add = $users->add_user(trim($data['user_name']), trim($data['user_pwd']), trim($data ['email']));
            if ($is_add) {
                $user_id_arr = $users->get_profile_by_name($_REQUEST ['user_name']);
                $data ['ucenter_id'] = $user_id_arr ['id'];
            }
        }
        $GLOBALS ['db']->autoExecute(DB_PREFIX . "user", addslashes_deep($data), 'INSERT');
        $rs = intval($GLOBALS ['db']->insert_id());
	    if($rs)
		{
			$score = intval ( $data ['score'] );
			$money = floatval ( $data ['money'] );
			if(!function_exists("s_user_money_log"))
			{
				require_once ROOT_PATH.'app/source/func/com_order_pay_func.php';
			}
			if ($money > 0)
				s_user_money_log ( $rs, $rs, 'User', $money, a_L ( "USER_ADD_USER" ), true );
		
			if ($score > 0)
				s_user_score_log ( $rs, $rs, 'User', $score, a_L ( "USER_ADD_USER" ), true );
		}
        $user_data = $GLOBALS['db']->getRow("select * from " . DB_PREFIX . "user where 360_id = '" . $_SESSION['qid'] . "' and 360_id <> 0");
    }

    if ($user_data) {
    	
        include_once(ROOT_PATH . 'app/source/func/com_user_func.php');
        user_do_login($user_data);
        exit;
    } else {
        $extend_fields = $GLOBALS ['db']->getAllCached("SELECT * FROM " . DB_PREFIX . "user_field where is_show = 1 order by sort desc");
        foreach ($extend_fields as $k => $v) {
            $extend_fields [$k] ['val_scope'] = explode(",", $v ['val_scope']);
        }
        $GLOBALS ['tpl']->assign("extend_fields", $extend_fields);

        $sql = "select id from " . DB_PREFIX . "article where type=1 and status=1";
        $id = $GLOBALS ['db']->getOneCached($sql);
        $agreement_url = a_u("Article/show", 'id-' . $id);

        $city_list = getGroupCityList();
        $GLOBALS ['tpl']->assign("city_list", $city_list);


        $GLOBALS ['tpl']->assign("agreement_url", $agreement_url);
        $GLOBALS ['tpl']->assign('redirect', $_REQUEST ['redirect']);
        $GLOBALS ['tpl']->assign('goods_id', $_REQUEST ['id']);

        $GLOBALS ['tpl']->assign('user_api_field_name', '360_id');
        $GLOBALS ['tpl']->assign('user_api_field_value', intval($_SESSION['qid']));

        //输出主菜单
        $GLOBALS ['tpl']->assign("main_navs", assignNav(2));
        //输出城市
        $GLOBALS ['tpl']->assign("city_list", getGroupCityList());
        //输出帮助
        $GLOBALS ['tpl']->assign("help_center", assignHelp());


        //$user=array('qid'=> $_SESSION['qid'],'qname'=> $_SESSION['qname'],'qmail'=> $_SESSION['qmail']);
        //print_r($user);
        //$GLOBALS ['tpl']->assign ( "user", $user );
        $GLOBALS ['tpl']->assign("help_center", assignHelp());

        $data = array('navs' => array(array('name' => a_L("HC_PLEASE_REG_OR_REGISTER"), 'url' => '')), 'keyword' => '', 'content' => '');



        assignSeo($data);
        $GLOBALS['tpl']->display('Inc/user/login_sync.moban');
    }
}

function qihu_info() {
    $is_360 = 0;
    if (!empty($_REQUEST['oauth_token']) && !empty($_REQUEST['oauth_verifier'])) {

        $h = new Hao360Auth($_SESSION['request_token']['oauth_token'], $_SESSION['request_token']['oauth_token_secret']);
        $accessToken = $h->getAccessToken($_REQUEST['oauth_verifier']);

        $oauth_token = $accessToken["oauth_token"];
        $oauth_secret = $accessToken["oauth_token_secret"];
        $_SESSION["access_token"] = array('oauth_token' => $oauth_token, 'oauth_token_secret' => $oauth_secret);
        $errorno = $accessToken["error_no"];
        if (!empty($errorno)) {
            //可以对应跳转到错误页面
            echo " AUTH FAIL !";
            echo $accessToken["msg"];
            return false;
        } elseif (!empty($oauth_token) && !empty($oauth_secret)) {
            if (empty($accessToken["qmail"])) {
                $accessToken["qmail"] = $accessToken["qname"];
            } elseif (empty($accessToken["qname"])) {
                $accessToken["qname"] = $accessToken["qmail"];
            }
            $_SESSION['qid'] = $accessToken["qid"];
            $_SESSION['qname'] = $accessToken["qname"];
            $_SESSION['qmail'] = $accessToken["qmail"];
            return true;
        }
    } elseif (!empty($_REQUEST['qid']) && (!empty($_REQUEST['qname']) || !empty($_REQUEST['qmail'])) && !empty($_REQUEST['sign']) && ($_REQUEST['from'] == 'hao360')) {
        include_once(ROOT_PATH . 'lib/config.php');


        if (empty($_REQUEST["qmail"])) {
            $_REQUEST["qmail"] = $_REQUEST["qname"];
        } elseif (empty($_REQUEST["qname"])) {
            $_REQUEST["qname"] = $_REQUEST["qmail"];
        }
        $_SESSION['qid'] = $_REQUEST["qid"];
        $_SESSION['qname'] = $_REQUEST["qname"];
        $_SESSION['qmail'] = $_REQUEST["qmail"];
        return true;
    } else {
        return false;
    }
}

function &init_users3_1() {
    $set_modules = false;
    static $cls = null;
    if ($cls != null) {
        return $cls;
    }
    $code = a_fanweC('INTEGRATE_CODE');
    if (empty($code))
        $code = 'fanwe';
    $code = $code . '3';
    include_once (VENDOR_PATH . 'integrates3/' . $code . '.php');
    $cfg = unserialize(a_fanweC('INTEGRATE_CONFIG'));
    $cls = new $code($cfg);

    return $cls;
}

?>