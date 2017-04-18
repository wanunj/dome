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

/**
*_runtime()是用来获取执行耗时
*@access public 
*@return float 表示返回出来的是一个浮点型数字
*/
function _runtime(){
    $_mtime=explode(' ',microtime());
    return $_mtime[1]+$_mtime[0];
}

/**
*_code()是验证码函数
*@access public
*@param int $_width  表示验证码的长度
*@param int $_height  表示验证码的高端
*@param int $_rnd_color 表示验证码的位数
*@param bool $_flag  表示验证码是否需要边框
*@return void   这个函数执行后产生一个验证码
*/
function _code($_width=75,$_height=25,$_rnd_color=4,$_flag=false){   
    // 创建随机码
    $_nmsg='';
    for($i=0;$i<4;$i++){
        $_nmsg .=dechex(mt_rand(0,15));
    }
    // 保存在session
    $_SESSION['code']=$_nmsg;
    // 创建一张图像
    $_img=imagecreatetruecolor($_width,$_height);
    //白色
    $_white=imagecolorallocate($_img,255,255,255);
    //填充
    imagefill($_img,0,0,$_white);
    if($_flag){
        //黑色,边框
        $_black=imagecolorallocate($_img,0,0,0);
        imagerectangle($_img,0,0,$_width-1,$_height-1,$_black);
    }
    //随机画出6个线条
    for ($i=0;$i<6;$i++){
        $_rnd_color=imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
        imageline($_img,mt_rand(0,$_width),mt_rand(0,$_height),mt_rand(0,$_width),mt_rand(0,$_height),$_rnd_color);
    }
    // 随机雪花
    for($i=0;$i<100;$i++){
        $_rnd_color=imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
        imagestring($_img,1,mt_rand(1,$_width),mt_rand(1,$_height),'*',$_rnd_color);
    }
    //输出验证码
    // for ($i=0;$i<strlen($_SESSION['code']);$i++) {
    // 	$_rnd_color = imagecolorallocate($_img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
    // 	imagestring($_img,5,$i*$_width/$_rnd_code+mt_rand(1,10),mt_rand(1,$_height/2),$_SESSION['code'][$i],$_rnd_color);
    // }
    //输出图像
    header('Content-Type:image/png');
    imagePng($_img);
    //销毁
    imagedestroy($_img);
}

/**
*_alert_back()表示JS弹窗
*@access public
*@param $_info
*@return void 弹窗
*/
function _alert_back($_info){
    echo "<script type='text/javascript'>alert('".$_info."');history.back();</script>";
    exit();
}

/**
 * @param $_info
 * @param $_url
 */
function _location($_info, $_url){
    if (empty(!$_info)){
        echo "<script type='text/javascript'>alert('".$_info."');location.href='$_url';</script>";
        exit();
    }else{
        header('Location:'.$_url);
    }

}

/**
 *_check_code()
 *@access public
 *@param $_first_code
 *@param $_end_code
 *@return void 验证码
 */
function _check_code($_first_code,$_end_code){
    if ($_first_code!=$_end_code){
        _alert_back('验证码错误!');
    }
}

/**
 *_mysql_string()
 *@access public
 *@param string $_string
 *@return string $_string  返回转义字段
 */
function _mysql_string($_string){
    //get_magic_quotes_gpc() 如果开启状态，那么就不需要转义
    if (!GPC){
        return mysql_real_escape_string($_string);
    }
    return $_string;
}

/**
 * @return string
 */
function _sha1_uniqid(){
    return _mysql_string(sha1(uniqid(rand(),true)));
}

/**
 *_session_destroy() 清除session
 */
function _session_destroy(){
    session_destroy();
}

/**
 *_unsetcookies() 清空cookie
 */
function _unsetcookies(){
    setcookie('username','',time()-1);
    setcookie('uniqid','',time()-1);
    _session_destroy();
    _location(null,'index.php');
 }

/**
 *_login_state()  登录状态的判断
 */
function _login_state(){
    if ($_COOKIE['username']){
        _alert_back('登录状态无法进行本操作');
    }
 }

/**
 *_page()  分页
 * @param $_sql
 * @param $_size
 */
function _page($_sql,$_size) {
    //将里面的所有变量取出来，外部可以访问
    global $_page,$_pagesize,$_pagenum,$_pageabsolute,$_num;
    if (isset($_GET['page'])) {
        $_page = $_GET['page'];
        if (empty($_page) || $_page < 0 || !is_numeric($_page)) {
            $_page = 1;
        } else {
            $_page = intval($_page);
        }
    } else {
        $_page = 1;
    }
    $_pagesize = $_size;
    $_num = _num_rows(_query($_sql));
    if ($_num == 0) {
        $_pageabsolute = 1;
    } else {
        $_pageabsolute = ceil($_num / $_pagesize);
    }
    if ($_page > $_pageabsolute) {
        $_page = $_pageabsolute;
    }
    $_pagenum = ($_page - 1) * $_pagesize;
}

/**
 * _paging分页函数
 * @param $_type
 * @return 返回分页
 */
function _paging($_type) {
    global $_page,$_pageabsolute,$_num;
    if ($_type == 1) {
        echo '<div id="page_num">';
        echo '<ul>';
        for ($i=0;$i<$_pageabsolute;$i++) {
            if ($_page == ($i+1)) {
                echo '<li><a href="blog.php?page='.($i+1).'" class="selected">'.($i+1).'</a></li>';
            } else {
                echo '<li><a href="blog.php?page='.($i+1).'">'.($i+1).'</a></li>';
            }
        }
        echo '</ul>';
        echo '</div>';
    } elseif ($_type == 2) {
        echo '<div id="page_text">';
        echo '<ul>';
        echo '<li>'.$_page.'/'.$_pageabsolute.'页 | </li>';
        echo '<li>共有<strong>'.$_num.'</strong>个会员 | </li>';
        if ($_page == 1) {
            echo '<li>首页 | </li>';
            echo '<li>上一页 | </li>';
        } else {
            echo '<li><a href="'.SCRIPT.'.php">首页</a> | </li>';
            echo '<li><a href="'.SCRIPT.'.php?page='.($_page-1).'">上一页</a> | </li>';
        }
        if ($_page == $_pageabsolute) {
            echo '<li>下一页 | </li>';
            echo '<li>尾页</li>';
        } else {
            echo '<li><a href="'.SCRIPT.'.php?page='.($_page+1).'">下一页</a> | </li>';
            echo '<li><a href="'.SCRIPT.'.php?page='.$_pageabsolute.'">尾页</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }



 }




























