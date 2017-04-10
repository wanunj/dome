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
// 防止非HTML页面调用
if(!defined('SCRIPT')){
    exit('Script Error!');
}

?>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="style/1/basic.css">
<link rel="stylesheet" type="text/css" href="style/1/<?php echo SCRIPT?>.css">
