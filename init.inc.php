<?php

// 开启 session
session_start();
// 设置时区
date_default_timezone_set('Asia/Shanghai');
// 设置utf-8编码
header('Content-Type: text/html; charset=UTF-8');
// 网站根目录
define('ROOT_PATH',dirname(__FILE__));
// 引入配置
require ROOT_PATH.'/config/profile.inc.php';
// 自动加载
spl_autoload_register(function($_className){
    if (substr($_className,-6) == 'Action') {
        require ROOT_PATH.'/action/'.$_className.'.class.php';
    } elseif (substr($_className,-5) == 'Model') {
        require ROOT_PATH.'/model/'.$_className.'.class.php';
    } else {
        require ROOT_PATH.'/includes/'.$_className.'.class.php';
    }
});
// 设置不缓存
$_cache = new Cache(['code','chekup','static','upload','register','feedback','cast','firendlink','search']);
// 实例化模板类
$_tpl = new Templates($_cache);
// 初始化
require 'common.inc.php';
