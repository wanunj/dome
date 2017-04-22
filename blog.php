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
global $_pagesize,$_pagenum;
_page("SELECT tg_id FROM tg_user",4);  //第一个参数获取总条数，第二个参数指定每页多少条
//从数据库提取数据获取结果集
$_result=_query("SELECT tg_id,tg_username,tg_sex,tg_face FROM tg_user ORDER BY tg_reg_time DESC LIMIT $_pagenum,$_pagesize;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>多用户留言系统--博友</title>
    <?php
    require ROOT_PATH.'includes/title.inc.php';
    ?>
    <script type="text/javascript" src="js/blog.js"></script>
</head>
<body>
<?php
require ROOT_PATH.'includes/header.inc.php';
?>

<div id="blog">
    <h2>博友列表</h2>
    <?php while (!!$_rows=_fetch_array_list($_result)){
        $_html=array();
        $_html['id']=$_rows['tg_id'];
        $_html['username']=$_rows['tg_username'];
        $_html['face']=$_rows['tg_face'];
        $_html['sex']=$_rows['tg_sex'];
        $_html=_html($_html);
        ?>
    <dl>
        <dd class="user"><?php echo $_html['username']?>(<?php echo $_html['sex']?>)</dd>
        <dt><img src="<?php echo $_html['face']?>" alt="哈哈"></dt>
        <dd class="message"><a href="###" name="message" title="<?php echo $_html['id']?>">发消息</a></dd>
        <dd class="friend">加为好友</dd>
        <dd class="guest">写留言</dd>
        <dd class="flower">给她送花</dd>
    </dl>
    <?php }?>

    <?php
    _free_result($_result);
    //_paging()函数调用分页，1|2,1表示数字分页，2表示文本分页
    _paging(2);
    ?>

</div>


<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
