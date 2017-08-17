{include file="public/header" /}

{include file="public/nav" /}
{include file="setbill/func" /}
<!--main content start-->
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">新建抢单</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="content1">
            <div class="step-content">
                <div class="step-pane active" id="step1">
                    <form class="form-horizontal" id="form1" method="post" action="{:url('index/setbill/addgrap')}" enctype="multipart/form-data">
                        <?php  form("标题","title");?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">详细描述</label>
                            <div class="col-sm-6">
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">描述图片</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                        <?php  form("备注信息","text");?>
                        <?php  form("客户姓名","username");?>
                        <?php  form("客户电话","usertell");?>
                        <?php  form("服务地址","servelocal");?>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">关联设备</label>
                            <div class="col-sm-3">
                                <input type="text" id="facility" class="form-control" readonly>
                            </div>
                            <div class="col-sm-3">
                                <p class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form2Modal" ">
                                    选择设备
                                </p>
                                </div>
                            </div>
                                <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <input type="submit" class="btn btn-primary btn-lg" value="新建">
                            </div>
                        </div>

                        <!-- 模态框（Modal） -->
                        <div class="modal fade" id="form2Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel" style="width: 100%">设备</h4>
                                    </div>
                                    <div class="modal-body" style="overflow: auto;">
                                        {volist name='list' id='staff'}

                                        <input type="radio" name="choofaci" value="{$staff.name}"> {$staff.name}<hr>

                                        {/volist}
                                        {$page}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="choofacility()">确定</button>
                                        <!--                                                <button type="button" class="btn btn-primary" onclick="choosefacility()">提交更改</button>-->
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>
                        <!-- End Form Modal -->
                            </div>
                            <!--                            <input onload="chang()" type="submit" class="btn btn-success btn-lg btn-block" value="提交">-->


                    </form>
                </div>

        <hr>


    </section>
</section>
<!--main content end-->
<!--sidebar right start-->
<script>

    function getValueForRadio(name) {
        // 获取所有的 input 元素
        var nodes = document.getElementsByTagName('input');
        // 循环判断
        for (var i=0; i<nodes.length; i++) {
            // 如果类型是 radio，name 也符合要求，而且也被选中了
            if (nodes[i].type==='radio' && nodes[i].name===name && nodes[i].checked) {
                //返回相应的值
                return nodes[i].value;
            }
        }
    }

    function choofacility() {
        document.getElementById("facility").value=getValueForRadio("choofaci");
    }
</script>
<!--sidebar right end-->
</section>
<!--Global JS-->
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/plugins/waypoints/waypoints.min.js"></script>
<script src="/js/application.js"></script>
<!--Page Level JS-->
<script src="/plugins/countTo/jquery.countTo.js"></script>
<script src="/plugins/weather/js/skycons.js"></script>
<!-- FlotCharts  -->
<script src="/plugins/flot/js/jquery.flot.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.resize.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.canvas.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.image.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.categories.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.crosshair.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.errorbars.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.fillbetween.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.navigate.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.pie.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.selection.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.stack.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.symbol.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.threshold.min.js"></script>
<script src="/plugins/flot/js/jquery.colorhelpers.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.time.min.js"></script>
<script src="/plugins/flot/js/jquery.flot.example.js"></script>
<!-- Morris  -->
<script src="/plugins/morris/js/morris.min.js"></script>
<script src="/plugins/morris/js/raphael.2.1.0.min.js"></script>
<!-- Vector Map  -->
<script src="/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- ToDo List  -->
<script src="/plugins/todo/js/todos.js"></script>
<!--Load these page level functions-->




{include file="public/footer" /}