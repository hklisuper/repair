{include file="public/header" /}
<body>
<p>名字：{$name}</p>
<p>描述：{$detail}</p>
<div class="center"><a href="{:url('v/index/order')}?name={$name}&detail={$detail}" class="btn btn-success w100">报修</a></div>
<br>
<div class="center"><a href="{:url('v/index/o_del')}" class="btn btn-success w100">维修详情</a></div>
</body>
{include file="public/footer" /}
<?php
