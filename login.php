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
define('SCRIPT','login');

// 定义常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';   //转换成硬路径，速度更快

//开始处理登录状态
if ($_GET['action']=='login'){
    exit('123456');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>多用户留言系统--登录</title>
    <?php
    require ROOT_PATH.'includes/title.inc.php';
    ?>
    <script type="text/javascript" src="js/code.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<?php
require ROOT_PATH.'includes/header.inc.php';
?>

<div id="login">
    <h2>登录</h2>
    <form action="login.php?action=login" name="login" method="post">
        <dl>
            <dd>用&nbsp;&nbsp;户&nbsp;&nbsp;名：<input type="text" name="username" class="text"></dd>
            <dd>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" class="text"></dd>
            <dd>保&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;留：<input type="radio" name="time" value="0" checked="checked"> 不保留&nbsp;
                                            <input type="radio" name="time" value="1""> 一天&nbsp;
                                            <input type="radio" name="time" value="2""> 一周&nbsp;
                                            <input type="radio" name="time" value="3""> 一月
            </dd>
            <dd>验&nbsp;&nbsp;证&nbsp;&nbsp;码：<input type="text" name="code" class="text code"><img src="code.php" id="code" /></dd>
            <dd><input type="submit" value="登录" class="button"> <input type="button" value="注册" id="location" class="button location"></dd>
        </dl>
    </form>
</div>

<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>