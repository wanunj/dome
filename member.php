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
session_start();
// 定义常量，用来指定本页内容
define('SCRIPT','member');

// 定义常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';   //转换成硬路径，速度更快

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>多用户留言系统--博友</title>
    <?php
    require ROOT_PATH.'includes/title.inc.php';
    ?>
</head>
<body>
<?php
require ROOT_PATH.'includes/header.inc.php';
?>

<div id="member">
    <?php
    require ROOT_PATH.'includes/member.inc.php';
    ?>

    <div id="member_main">
        <h2>会员管理中心</h2>
        <dl>
            <dd>用 户 名：王军</dd>
            <dd>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：男</dd>
            <dd>头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像：face/m01.gif</dd>
            <dd>电子邮件：23456@q.com</dd>
            <dd>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页：http:www.hao123.com</dd>
            <dd>Q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q：546122345</dd>
            <dd>注册时间：2017-4-15 10:10:10</dd>
            <dd>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份：管理员</dd>
        </dl>
    </div>
</div>

<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
