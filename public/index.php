<?php
//定义常量
define("ROOT_PATH",dirname(dirname(__FILE__)));  //框架根目录
define("STORAGE_PATH",ROOT_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR);      //存储目录
define('VENDOR_PATH',ROOT_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR);
//核心文件
define('CORE_PATH',ROOT_PATH . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
//配置文件路劲
define('CONFIG_PATH',ROOT_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
//是否开启错误提示，true 开启 否则 false
define('DEBUG',true);

//载入自动加载文件
require VENDOR_PATH . 'autoload.php';

if (DEBUG) {
    $whoops = new \Whoops\Run;
    $optionTitle = "框架出错了";
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($optionTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_errors','on');
}else{
    ini_set('display_errors','off');
}
//设定时区
date_default_timezone_set('PRC');

//载入服务容器
require CORE_PATH . 'app.php';

