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
//设置字符编码
header('Content-Type:text/html;charset=utf-8');

// 防止非法调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}

/**
 *_connect()连接数据库
 * @access public
 * @return  void
 */
function _connect(){
    //global 全局变量
    global $_conn;
    if (!$_conn=@mysql_connect(DB_HOST,DB_USER,DB_PWD)){
        exit('数据库连接失败');
    }
}

/**
 *_select_db()选择数据库
 * @return void
 */
function _select_db(){
    if (!mysql_select_db(DB_NAME)){
        exit('找不到指定数据库'.mysql_error());
    }
}

/**
 *_set_names()选择字符集
 * @return void
 */
function _set_names(){
    if (!mysql_query('SET NAMES UTF8')){
        exit('字符集错误');
    }
}

/**
 * @param $_sql
 * @return resource
 */
function _query($_sql){
    if (!$_result=mysql_query($_sql)){
        exit('SQL执行失败');
    }
    return $_result;
}

/**
 * @param $_sql
 * @return array
 */
function _fetch_array($_sql){
    return mysql_fetch_array(_query($_sql),MYSQL_ASSOC);
}

/**
 * @param $_sql
 * @param $_info
 */
function _is_repeat($_sql, $_info){
    if (_fetch_array($_sql)){
        _alert_back($_info);
    }
}

function _close(){
    if (!mysql_close()){
        _alert_back('关闭异常');
    }
}


















