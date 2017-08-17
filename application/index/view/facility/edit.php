{include file="public/header" /}

{include file="public/nav" /}

<!--main content start-->
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-sm-2" style="font-size: 18px;"><strong>添加设备 </strong></div>
            <div class="col-md-10" style="text-align: right;">
                <button class="btn btn-success" onclick="goback()" style="float: right;">返回</button>
            </div>
        </div>
        <form method="post" action="{:url('index/facility/add')}">

            <hr style="height:1px;border:none;border-top:1px solid #555555;" />
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>设备名字</b></div>
                <div class="col-sm-8"> <input type="text" class="form-control" name="pid" placeholder="请输入设备名称或设备编号"></div>

            </div>
            <br>
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>设备描述</b></div>
                <div class="col-sm-8"><textarea class="form-control" style="height: 100px; " name="pinfo" placeholder="请输入设备的详情，例：设备的技术参数，配件等，便于设备维护时，进行资料查询。"></textarea></div>
            </div><br>
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>设备分组</b></div>
                <div class="col-sm-8"> <input type="text" class="form-control" name="psort" ></div>
            </div><br>
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>联系人名字</b></div>
                <div class="col-sm-8"> <input type="text" class="form-control" name="userinfo" placeholder="请使用设备联系人姓名"></div>
            </div><br>
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>联系人电话</b></div>
                <div class="col-sm-8"> <input type="text" class="form-control" name="usermobile" placeholder="请使用设备联系人电话"></div>
            </div><br>
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>设备所在地</b></div>
                <div class="col-sm-8"> <input type="text" class="form-control" name="p_local"></div>
            </div><br>
            <div style="margin:20px auto; width: 80px;"><input type="submit" value="保存" class="btn btn-primary"></div>
        </form>
    </section>
</section>
<!--main content end-->
<!--sidebar right start-->

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