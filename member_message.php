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
define('SCRIPT','member_message');

// 定义常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';   //转换成硬路径，速度更快

//判断是否登录
if (!isset($_COOKIE['username'])){
    _alert_back('请先登录！');
}

//分页模块
global $_pagesize,$_pagenum;
_page("SELECT tg_id FROM tg_message",3);  //第一个参数获取总条数，第二个参数指定每页多少条
//从数据库提取数据获取结果集
$_result=_query("SELECT tg_id,tg_fromuser,tg_content,tg_date FROM tg_message ORDER BY tg_date DESC LIMIT $_pagenum,$_pagesize;");
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
        <h2>短信管理中心</h2>
        <table>
            <tr>
                <th>发信人</th>
                <th>短信内容</th>
                <th>时间</th>
                <th>操作</th>
            </tr>
            <?php while (!!$_rows=_fetch_array_list($_result)){
                $_html=array();
                $_html['id']=$_rows['tg_id'];
                $_html['fromuser']=$_rows['tg_fromuser'];
                $_html['content']=$_rows['tg_content'];
                $_html['date']=$_rows['tg_date'];
                ?>
            <tr>
                <td><?php echo $_html['fromuser']?></td>
                <td><a href="member_message_detail.php?id=<?php echo $_html['id']?>" title="<?php echo $_html['content']?>"><?php echo _title($_html['content'])?></a></td>
                <td><?php echo $_html['date']?></td>
                <td><input type="checkbox"></td>
            </tr>
            <?php } ?>
        </table>
        <?php
        _free_result($_result);
        //_paging()函数调用分页，1|2,1表示数字分页，2表示文本分页
        _paging(2);
        ?>
    </div>
</div>

<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
