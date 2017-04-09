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
// 定义常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>多用户留言系统</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/1/basic.css">
    <link rel="stylesheet" type="text/css" href="style/1/index.css">
</head>
<body>
<?php
    require './includes/header.inc.php';
?>
    <div id="list">
        <h2>帖子列表</h2>
    </div>
    <div id="user">
        <h2>新进会员</h2>
    </div>
    <div id="pics">
        <h2>最新图片</h2>
    </div>
<?php
    require './includes/footer.inc.php';
?>
</body>
</html>