<?php
/**
* TestGuest Version1.0
* ================================================
* Copy 2017-4-9
* Web: http://www.yc60.com
* ================================================
* Author: Lee
* Date: 2017-4-9
*/
// 防止非法调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}

//转换成硬路径常量
define('ROOT_PATH',substr(dirname(__FILE__),0,-8));

//拒绝PHP低版本
if(PHP_VERSION<'4.1.0'){
    exit('Version is to Low!');
}
?>