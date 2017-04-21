/**
 * Created by 22240 on 2017/4/20.
 */
window.onload=function(){
    code();
    // 表单验证
    var fm=document.getElementsByTagName('form')[0];
    fm.onsubmit=function () {
        //密码验证
        if (!fm.password.value.length==''){
            if (fm.password.value.length<6){
                alert('密码不得小于6位');
                fm.password.value='';
                fm.password.focus();
                return false;
            }
        }
        //邮件验证
        if (!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(fm.email.value)){
            alert('邮件格式不正确');
            fm.email.value='';
            fm.email.focus();
            return false;
        }
        // QQ验证
        if (fm.qq.value!=''){
            if (!/^[1-9]{1}[0-9]{4,9}$/.test(fm.qq.value)){
                alert('QQ格式不正确');
                fm.qq.value='';
                fm.qq.focus();
                return false;
            }
        }

        //网址验证
        if (fm.url.value!=''){
            if (!/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(fm.url.value)){
                alert('网址不正确');
                fm.url.value='';
                fm.url.focus();
                return false;
            }
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