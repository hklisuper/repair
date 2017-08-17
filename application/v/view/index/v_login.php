{include file="public/header" /}
<br><br>
<p style="text-align: center"><strong>用户登录</strong></p>
<br>
<div class="row">
    <form action="{:url('v/index/order')}">
    <input type="text" class="form-control" name="uname" placeholder="姓名">
    <br>
    <input type="text" class="form-control" name="umobile" placeholder="手机号">
        <br>
        <input type="submit" value="提交" class="btn btn-primary form-control">
    </form>
</div>

{include file="public/footer" /}




<?php
