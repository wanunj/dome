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
?>
<div id="header">
  <h1><a href="index.html">瓢城Web俱乐部多用户留言系统</a></h1>
    <ul>
        <li><a href="index.php">首页</a></li>
        <li><a href="register.php">注册</a></li>
        <li><a href="login.php">登陆</a></li>
        <?php
            if (isset($_COOKIE['username'])){
                echo '<li><a href="member.php">'.$_COOKIE['username'].'●个人中心</a></li>';
                echo "\n";
            }else{
                echo '<li><a href="register.php">注册</a></li>';
                echo "\n";
                echo "\t\t";
                echo '<li><a href="login.php">登陆</a></li>';
                echo "\n";
            }
        ?>
        <li>个人中心</li>
        <li>风格</li>
        <li>管理</li>
        <?php
            if (isset($_COOKIE['username'])){
                echo '<li><a href="logout.php">退出</a></li>';
            }
        ?>
    </ul>      
</div>