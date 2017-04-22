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

//是否正常登陆
if (isset($_COOKIE['username'])){
    //获取数据
    $_rows=_fetch_array("SELECT tg_username,tg_sex,tg_face,tg_email,tg_url,tg_qq,tg_level,tg_reg_time FROM tg_user WHERE tg_username='{$_COOKIE['username']}' LIMIT 1");
    if ($_rows){
        $_html=array();
        $_html['username']=$_rows['tg_username'];
        $_html['sex']=$_rows['tg_sex'];
        $_html['face']=$_rows['tg_face'];
        $_html['email']=$_rows['tg_email'];
        $_html['url']=$_rows['tg_url'];
        $_html['qq']=$_rows['tg_qq'];
        $_html['reg_time']=$_rows['tg_reg_time'];
        switch ($_rows['tg_level']){
            case 0:
                $_html['level']='普通会员';
                break;
            case 1:
                $_html['level']='管理员';
                break;
            default:
                $_html['level']='出错';
        }
        $_html=_html($_html);
    }else{
        _alert_back('此用户不存在！');
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
        <h2>会员管理中心</h2>
        <dl>
            <dd>用 户 名：<?php echo $_html['username']?></dd>
            <dd>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<?php echo $_html['sex']?></dd>
            <dd>头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像：<?php echo $_html['face']?></dd>
            <dd>电子邮件：<?php echo $_html['email']?></dd>
            <dd>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页：<?php echo $_html['url']?></dd>
            <dd>Q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q：<?php echo $_html['qq']?></dd>
            <dd>注册时间：<?php echo $_html['reg_time']?></dd>
            <dd>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份：<?php echo $_html['level']?></dd>
        </dl>
    </div>
</div>

<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
