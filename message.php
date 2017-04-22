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
// 定义常量，用来指定本页内容
define('SCRIPT','message');

// 定义常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';   //转换成硬路径，速度更快
//判断是否登录
if (!isset($_COOKIE['username'])){
    _alert_close('请先登录！');
}
//获取数据
if (isset($_GET['id'])){
    if (!!$_rows=_fetch_array("SELECT tg_username FROM tg_user WHERE tg_id={$_GET['id']} LIMIT 1")){
        $_html=array();
        $_html['touser']=$_rows['tg_username'];
        $_html=_html($_html);
    }else{
        _alert_close('不存在此用户！');
    }
}else{
    _alert_close('非法操作！');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>>多用户留言系统--短信</title>
    <?php
    require ROOT_PATH.'includes/title.inc.php';
    ?>
    <script type="text/javascript" src="js/code.js"></script>
    <script type="text/javascript" src="js/message.js"></script>
</head>
<body>

<div id="message">
    <h3>写短信</h3>
    <form>
        <dl>
            <dd><input type="text" value="<?php echo $_html['touser']?>" class="text"></dd>
            <dd><textarea name="content"></textarea></dd>
            <dd>验&nbsp;&nbsp;证&nbsp;&nbsp;码：<input type="text" name="code" class="text code"><img src="code.php" id="code" /><input type="submit" class="submit" value="发送短信"></dd>
        </dl>
    </form>
</div>

</body>
</html>