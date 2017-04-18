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
if (isset($_GET['page'])){
    $_page = $_GET['page'];
    if (empty($_page)||$_page<0||!is_numeric($_page)){
        $_page=1;
    }else{
        $_page=intval($_page);
    }
}else{
    $_page=1;
}

$_pagesize = 5;

//首先要得到所有的数据总和
$_num=_num_rows(_query("SELECT tg_id FROM tg_user"));

if ($_num==0){
    $_pagheabsolute=1;
}else{
    $_pagheabsolute=ceil($_num/$_pagesize);
}

if ($_page>$_pagheabsolute){
    $_page=$_pagheabsolute;
}

$_pagenum = ($_page - 1) * $_pagesize;

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
    <div id="page_text">
        <ul>
            <li><?php echo $_page?>/<?php echo $_pagheabsolute?>页 | </li>
            <li>共有<strong><?php echo $_num?></strong>个会员 | </li>
            <?php
                if ($_page==1){
                    echo '<li>首页 | </li>';
                    echo '<li>上一页 | </li>';
                }else{
                    echo '<li><a href="'.SCRIPT.'.php">首页</a> | </li>';
                    echo '<li><a href="'.SCRIPT.'.php?page='.($_page-1).'">上一页</a> | </li>';
                }
                if ($_page==$_pagheabsolute){
                    echo '<li>下一页 | </li>';
                    echo '<li>尾页 | </li>';
                }else{
                    echo '<li><a href="'.SCRIPT.'.php?page='.($_page+1).'">下一页</a> | </li>';
                    echo '<li><a href="'.SCRIPT.'.php?page='.$_pagheabsolute.'">尾页</a> | </li>';
                }
            ?>
        </ul>
    </div>
</div>


<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
