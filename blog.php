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
define('SCRIPT','blog');

// 定义常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';   //转换成硬路径，速度更快

//分页模块
$_page = $_GET['page'];
$_pagesize = 10;
$_pagenum = ($_page - 1) * $_pagesize;
//首页要得到所有的数据总和
$_num=mysql_num_rows(_query("SELECT tg_id FROM tg_user"));
$_pagheabsolute=ceil($_num/$_pagesize);
//从数据库提取数据获取结果集
$_result=_query("SELECT tg_username,tg_sex,tg_face FROM tg_user ORDER BY tg_reg_time DESC LIMIT $_pagenum,$_pagesize;");

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

<div id="blog">
    <h2>博友列表</h2>
    <?php while (!!$_rows=_fetch_array_list($_result)){?>
    <dl>
        <dd class="user"><?php echo $_rows['tg_username']?>(<?php echo $_rows['tg_sex']?>)</dd>
        <dt><img src="<?php echo $_rows['tg_face']?>" alt="哈哈"></dt>
        <dd class="message">发消息</dd>
        <dd class="friend">加为好友</dd>
        <dd class="guest">写留言</dd>
        <dd class="flower">给她送花</dd>
    </dl>
    <?php }?>
    <div id="page_num">
        <ul>
            <?php for ($i=0;$i<$_pagheabsolute;$i++) {
                if ($_page==($i+1)){
                    echo '<li><a href="blog.php?page='.($i+1).'" class="selected">'.($i+1).'</a></li>';
                }else{
                    echo '<li><a href="blog.php?page='.($i+1).'">'.($i+1).'</a></li>';
                }
            } ?>
        </ul>
    </div>
</div>


<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
