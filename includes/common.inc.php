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

//创建一个自动转义的常量  mysql 扩展的版本可以使用 mysql_get_client_info() 函数获得
define('GPC',mysqli_get_client_info());

//拒绝PHP低版本
if(PHP_VERSION<'4.1.0'){
    exit('Version is to Low!');
}

//引入核心函数库
require ROOT_PATH.'includes/global.func.php';

// 执行耗时
define('START_TIME',_runtime());


//数据库连接
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','12345678');
define('DB_NAME','testguest');

//创建数据库连接
$_conn=@mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败');

//选择数据库
mysql_select_db(DB_NAME) or die('指定数据库不存在');

//选择字符集
mysql_query('SET NAMES UTF8') or die('字符集设置错误');





?>