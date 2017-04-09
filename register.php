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
    <title>多用户留言系统--注册</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/1/basic.css">
    <link rel="stylesheet" type="text/css" href="style/1/register.css">
</head>
<body>
<?php
    require ROOT_PATH.'includes/header.inc.php';
?>

<div id="register">
    <h2>会员注册</h2>
    <form action="post.php" method="post">
        <dl>
            <dt>请认真填写以下内容</dt>
            <dd>用&nbsp;&nbsp;户&nbsp;名：<input type="text" name="username" class="text">(*必填，至少两位)</dd>
            <dd>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" class="text">(*必填，至少六位)</dd>
            <dd>确认密码：<input type="password" name="notpassword" class="text">(*同上)</dd>
            <dd>密码提示：<input type="text" name="passt" class="text">(*必填，至少两位)</dd>
            <dd>密码回答：<input type="text" name="passd" class="text">(*必填，至少两位)</dd>
            <dd>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<input type="radio" name="sex" value="男" checked="checked">男<input type="radio" name="sex" value="女">女</dd>
            <dd class="face"><img src="face/m01.gif" alt="头像选择" onclick="javascript:window.open('face.php','face','width=400,height=400,top=0,left=0')"></dd>
            <dd>电子邮件：<input type="text" name="email" class="text"></dd>
            <dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q Q：<input type="text" name="qq" class="text"></dd>
            <dd>主页地址：<input type="text" name="url" class="text" value="http://"></dd>
            <dd>验&nbsp;&nbsp;证&nbsp;码：<input type="text" name="yzm" class="text yzm"></dd>
            <dd><input type="submit" class="submit" value="注册"></dd>
        </dl>
    </form>
</div>

<?php
    require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>