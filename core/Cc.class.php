<?php
include_once(SYSTEM_ROOT . 'base.php');
header('Cache-Control: no-store, no-cache, must-revalidate');
error_reporting(0);
header('Pragma: no-cache');
error_reporting(0);
if (($is_defend==true || CC_Defender==3)) {
    if ((!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])!='xmlhttprequest')) {
        include_once(SYSTEM_ROOT . 'txprotect.php');
    }
    if ((CC_Defender==1 && check_spider()==false)) {
    }
    if (((CC_Defender==1 && check_spider()==false) || CC_Defender==3)) {
        cc_defender();
    }
}
function x_real_ip()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all("#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s", $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] as $xip) {
            if (!preg_match("#^(10|172\.16|192\.168)\.#", $xip)) {
                $ip = $xip;
            } else {
            }
        }
    } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } else {
        if ((isset($_SERVER['HTTP_X_REAL_IP']) && preg_match("/^([0-9]{1,3}\.){3}[0-9]{1,3}$/", $_SERVER['HTTP_X_REAL_IP']))) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        }
    }
    return $ip;
}
function check_spider()
{
    $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if (strpos($useragent, 'baiduspider')!==false) {
        return 'baiduspider';
    }
    if (strpos($useragent, 'googlebot')!==false) {
        return 'googlebot';
    }
    if (strpos($useragent, '360spider')!==false) {
        return '360spider';
    }
    if (strpos($useragent, 'soso')!==false) {
        return 'soso';
    }
    if (strpos($useragent, 'bing')!==false) {
        return 'bing';
    }
    if (strpos($useragent, 'yahoo')!==false) {
        return 'yahoo';
    }
    if (strpos($useragent, 'sohu-search')!==false) {
        return 'Sohubot';
    }
    if (strpos($useragent, 'sogou')!==false) {
        return 'sogou';
    }
    if (strpos($useragent, 'youdaobot')!==false) {
        return 'YoudaoBot';
    }
    if (strpos($useragent, 'robozilla')!==false) {
        return 'Robozilla';
    }
    if (strpos($useragent, 'msnbot')!==false) {
        return 'msnbot';
    }
    if (strpos($useragent, 'lycos')!==false) {
        return 'Lycos';
    }
    if (!strpos($useragent, 'ia_archiver')===false) {
    } elseif (!strpos($useragent, 'iaarchiver')===false) {
        return 'alexa';
    }
    if (strpos($useragent, 'archive.org_bot')!==false) {
        return 'Archive';
    }
    if (strpos($useragent, 'sitebot')!==false) {
        return 'SiteBot';
    }
    if (strpos($useragent, 'gosospider')!==false) {
        return 'gosospider';
    }
    if (strpos($useragent, 'gigabot')!==false) {
        return 'Gigabot';
    }
    if (strpos($useragent, 'yrspider')!==false) {
        return 'YRSpider';
    }
    if (strpos($useragent, 'gigabot')!==false) {
        return 'Gigabot';
    }
    if (strpos($useragent, 'wangidspider')!==false) {
        return 'WangIDSpider';
    }
    if (strpos($useragent, 'foxspider')!==false) {
        return 'FoxSpider';
    }
    if (strpos($useragent, 'docomo')!==false) {
        return 'DoCoMo';
    }
    if (strpos($useragent, 'yandexbot')!==false) {
        return 'YandexBot';
    }
    if (strpos($useragent, 'sinaweibobot')!==false) {
        return 'SinaWeiboBot';
    }
    if (strpos($useragent, 'catchbot')!==false) {
        return 'CatchBot';
    }
    if (strpos($useragent, 'surveybot')!==false) {
        return 'SurveyBot';
    }
    if (strpos($useragent, 'dotbot')!==false) {
        return 'DotBot';
    }
    if (strpos($useragent, 'purebot')!==false) {
        return 'Purebot';
    }
    if (strpos($useragent, 'ccbot')!==false) {
        return 'CCBot';
    }
    if (strpos($useragent, 'mlbot')!==false) {
        return 'MLBot';
    }
    if (strpos($useragent, 'adsbot-google')!==false) {
        return 'AdsBot-Google';
    }
    if (strpos($useragent, 'ahrefsbot')!==false) {
        return 'AhrefsBot';
    }
    if (strpos($useragent, 'spbot')!==false) {
        return 'spbot';
    }
    if (strpos($useragent, 'augustbot')!==false) {
        return 'AugustBot';
    }
    return false;
}
function cc_defender()
{
    $iptoken = md5(x_real_ip() . date('Ymd')) . md5(time() . rand(11111, 99999));
    if ((!isset($_COOKIE['sec_defend']) || substr($_COOKIE['sec_defend'], 0, 32)!==substr($iptoken, 0, 32))) {
        if (!$_COOKIE['sec_defend_time']) {
            $_COOKIE['sec_defend_time'] = 0;
        }
        $sec_defend_time = $_COOKIE['sec_defend_time'] + 1;
        include_once(SYSTEM_ROOT . 'hieroglyphy.class.php');
        $x = new hieroglyphy();
        $setCookie = $x->hieroglyphyString($iptoken);
        header('Content-type:text/html;charset=utf-8');
        if ($sec_defend_time >= 10) {
            exit('浏览器不支持COOKIE或者不正常访问！');
        }
        echo '<html><head><meta http-equiv="pragma" content="no-cache"><meta http-equiv="cache-control" content="no-cache"><meta http-equiv="content-type" content="text/html;charset=utf-8"><title>正在加载中</title><script>function setCookie(name,value){var exp = new Date();exp.setTime(exp.getTime() + 60*60*1000);document.cookie = name + "="+ escape (value).replace(/\+/g, \'%2B\') + ";expires=" + exp.toGMTString() + ";path=/";}function getCookie(name){var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");if(arr=document.cookie.match(reg))return unescape(arr[2]);else return null;}var sec_defend_time=getCookie(\'sec_defend_time\')||0;sec_defend_time++;setCookie(\'sec_defend\',' . $setCookie . ');setCookie(\'sec_defend_time\',sec_defend_time);if(sec_defend_time>1)window.location.href="./index.php";else window.location.reload();</script></head><body></body></html>';
        exit(0);
    } elseif (isset($_COOKIE['sec_defend_time'])) {
        setcookie('sec_defend_time', '', time() - 604800, '/');
    }
}
?>