/**
 * Created by 22240 on 2017/4/16.
 */
function code() {
    var code=document.getElementById('code');
    code.onclick=function(){
        this.src='code.php?tm='+Math.random();
    };
}


