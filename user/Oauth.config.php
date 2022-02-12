<?php
/**
 * 彩虹聚合登录SDK
 * 1.0
**/

// API地址
$Oauth_config['apiurl'] = $conf['qqhulian'];

// APPID
$Oauth_config['appid'] = $conf['qqhulianpid'];

// APPKEY
$Oauth_config['appkey'] = $conf['qqhuliankey'];

// 登录成功返回地址
$Oauth_config['callback'] = 'http://'.$_SERVER['HTTP_HOST'].'/user/qq.php';
