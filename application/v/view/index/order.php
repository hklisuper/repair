
{include file="public/header" /}

<p style="text-align: center;"><button class="btn btn-info" onclick="goback()" style="float: right">回退</button><strong>在线下单</strong></p>
<hr style="height:1px;border:none;border-top:1px solid #555555;" />
<form action="{:url('v/index/getbill')}" method="post">
<script>
    function row22(nick,name,value) {
        document.write("<label for=''>" +
            nick+":</label>" +
            "<div class='row'><input type='text'style='color: red;' class='form-control' name='" +
            name+"' value=" +value+"></div>");
    }
    row22("设备名称","pname","{$name}");
    row22("报修人","uname","{$uname}");
    document.write("<br>");
    row22("标题","title","");
    row22("描述","detail","{$detail}");
    row22("客户姓名","name","{$uname}");
    row22("客户电话","tell","{$mobile}");
    row22("客户地址","addr","");
</script>
<br>
    <button class="btn btn-primary w100">提交</button>
</form>


<script>
    function goback() {
        window.history.back();
    }
</script>
{include file="public/footer" /}




<?php
