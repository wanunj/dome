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

if(!function_exists('_alert_back')){
    exit('_alert_back()函数不存在，请检查！');
}

if(!function_exists('_mysql_string')){
    exit('_mysql_string()函数不存在，请检查！');
}

/**
 *_check_username()
 *@access public
 *@param string $_string  受污污染的用户名
 *@param int $_min_num  最小位数
 *@param int $_max_num  最大位数
 *@return string  过滤后的用户名
 */
function _check_username($_string,$_min_num,$_max_num){
    // 去掉两边的空格
    $_string=trim($_string);
    // 长度小于两位或者大于20位
    if(mb_strlen($_string,'utf-8')<$_min_num||mb_strlen($_string,'utf-8')>$_max_num){
        _alert_back('长度不得小于'.$_min_num.'位或者大于'.$_max_num.'位');
    }
    // 限制敏感字符
    $_char_pattern='/[<>\'\"\ \  ]/';
    if(preg_match($_char_pattern,$_string)){
        _alert_back('用户名不得包含敏感字符!');
    }
    // 将用户名转义输入
    //return mysql_real_escape_string($_string);
    return _mysql_string($_string);
}

/**
 *_check_password()  验证密码
 * @access public
 * @param string $_string
 * @param int $_min_num
 * @return string $_string  返回一个加密后的密码
 */
function _check_password($_string,$_min_num){
    // 判断密码
    if(strlen($_string)<$_min_num){
        _alert_back('密码不得小于'.$_min_num.'位！');
    }
    // 返回密码
    return _mysql_string(sha1($_string));
}

/**
 * @param $_string
 * @return string
 */
function _check_time($_string){
    $_time=array('0','1','2','3');
    if (!in_array($_string,$_time)){
        _alert_back('保留方式出错!');
    }
    return _mysql_string($_string);
}



























