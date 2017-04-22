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
define('SCRIPT','member_message_detail');

// 定义常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';   //转换成硬路径，速度更快

//判断是否登录
if (!isset($_COOKIE['username'])){
    _alert_back('请先登录！');
}

if (isset($_GET['id'])){
    //获取数据
    $_rows=_fetch_array("SELECT tg_fromuser,tg_content,tg_date FROM tg_message WHERE tg_id='{$_GET['id']}' LIMIT 1");
    if ($_rows){
    $_html=array();
    $_html['fromuser']=$_rows['tg_fromuser'];
    $_html['content']=$_rows['tg_content'];
    $_html['date']=$_rows['tg_date'];
    $_html=_html($_html);
    }else{
        _alert_back('短信不存在!');
    }
}else{
    _alert_back('非法登陆');
}
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
        <h2>短信详情</h2>
        <dl>
            <dd>发&nbsp;&nbsp;信&nbsp;&nbsp;人：<?php echo $_html['fromuser']?></dd>
            <dd>内&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;容：<strong><?php echo $_html['content']?></strong></dd>
            <dd>发信时间：<?php echo $_html['date']?></dd>
            <dd class="button"><input type="button" value="返回列表" onclick="javascript:history.back()"><input type="button" value="删除短信"></dd>
        </dl>
    </div>
</div>

<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
