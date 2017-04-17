/**
 * Created by 22240 on 2017/4/16.
 */
window.onload=function () {
    code();
    //登录验证
    var fm=document.getElementsByTagName('form')[0];
    fm.onsubmit=function () {                           //onsubmit点击提交
        if (fm.username.value.length < 2 || fm.username.value.length > 20) {
            alert('用户名不得小于2位或者大于20位');
            fm.username.value = '';                       //清空
            fm.username.focus();                        //将焦点移到表单字段
            return false;
        }
        if (/[<>'\"\ \  ]/.test(fm.username.value)) {
            alert('用户名不得包含敏感字符');
            fm.username.value = '';                       //清空
            fm.username.focus();                        //将焦点移到表单字段
            return false;
        }

        //密码验证
        if (fm.password.value.length < 6) {
            alert('密码不得小于6位');
            fm.password.value = '';
            fm.password.focus();
            return false;
        }
        if (fm.password.value != fm.notpassword.value) {
            alert('密码和密码确认必须一致');
            fm.notpassword.value = '';
            fm.notpassword.focus();
            return false;
        }
        //验证码验证
        if (fm.code.value.length!=4){
            alert('验证码必须是4位！');
            fm.code.value='';
            fm.code.focus();
            return false;
        }
        return true;
    }
};