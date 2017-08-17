<? php

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>修改密码</title>
<style>
body {
    font-family:"Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size:16px;
    padding:5px;
}
.contain{
    
    width:300px;
    margin-left: auto;
    margin-right: auto;
}
.form{
    padding: 15px;
    font-size: 16px;
}

.form .text {
    padding: 3px;
    margin:2px 10px;
    width: 240px;
    height: 24px;
    line-height: 28px;
    border: 1px solid #D4D4D4;
}
.form .btn{
    margin:6px;
    padding: 6px;
    width: 120px;

    font-size: 16px;
    border: 1px solid #D4D4D4;
    cursor: pointer;
    background:#eee;
}
a{
    color: #868686;
    cursor: pointer;
}
a:hover{
    text-decoration: underline;
}
h2{
    color: #4288ce;
    font-weight: 400;
    padding: 6px 0;
    margin: 6px 0 0;
    font-size: 28px;
    border-bottom: 1px solid #eee;
}
div{
    margin:8px;
}
.info{
    padding: 12px 0;
    border-bottom: 1px solid #eee;
}

.copyright{
    width:100%;
   position: absolute;
  
 
  text-align: center;
  bottom: 20px;
  margin-bottom: 30px;
}
</style>
</head>
<body>
    <div class="contain">
        <h2>修改密码</h2>
        <FORM method="post" class="form" action="{:url('index/index/alter')}" name="myForm" onsubmit="return validateForm()">
        旧密码：<INPUT type="password" class="text" name="old_pwd"><br/>
        新密码：<INPUT type="password" class="text" name="new_pwd"><br/>
        确&nbsp;&nbsp;认：<INPUT type="password" class="text" name="afm_pwd"><br/>
        <input type="reset" class="btn" value="重置" />
        <INPUT type="submit" class="btn" value=" 提交 ">
        </FORM>
    </div>
    <script>
//    表单验证
        function validateForm()
        {
          var x=document.forms["myForm"]["new_pwd"].value;
           var y=document.forms["myForm"]["afm_pwd"].value;
        if (x!=y)
          {
            alert("新密码前后不一致");
            return false;
          }
        }

    </script>

    <div class="copyright">
        <hr></hr>
        
        <span>维修系统</span> 
        <a title="官方网站" href="http://weibo.com/lixiangcnj?refer_flag=1001030201_">@李响</a> 
        <span>{ 像查询快递一样简单 }</span>
    </div>
</body>
</html>