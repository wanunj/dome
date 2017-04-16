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
    //防止恶意注册,!我测试的
    _check_code(isset($_POST['code']),isset($_SESSION['code']));
    // 引入验证文件
    include ROOT_PATH.'includes/login.func.php';
    //接受数据
    $_clean=array();
    $_clean['username']=_check_username($_POST['username'],2,20);
    $_clean['password']=_check_password($_POST['password'],6);
    $_clean['time']=_check_time($_POST['time']);
    //在数据库验证
    if (!!$_rows = _fetch_array("SELECT tg_username,tg_uniqid FROM tg_user WHERE tg_username='{$_clean['username']}' and tg_password='{$_clean['password']}' and tg_active='' LIMIT 1")) {
        _close();
        _session_destroy();
        _location(null,'index.php');
    }else{
        _close();
        _session_destroy();
        _location('用户名密码不正确或者该账户未被激活！','login.php');
    }
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