{include file="public/header" /}

{include file="public/nav" /}

<!--main content start-->
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-10"><strong>编辑员工 </strong></div>
            <div class="col-md-2" style="text-align: right;"><a href="{:url('index/staff/index')}"  class="btn btn-success" style="text-decoration: none;color: #fff;"> 返回</a></div>

        </div>
        <form action="{:url('index/staff/alter')}">
            <input type="hidden" name="id" value="{$row.id}">
            <hr style="height:1px;border:none;border-top:1px solid #555555;" />
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>姓名</b></div>
                <div class="col-sm-8"> <input type="text" class="form-control" name="name" value="{$row.name}" required=""></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>电话</b></div>
                <div class="col-sm-8"><input type="text" class="form-control"  name="tell" required="" value="{$row.mobile}""></input></div>            </div><br>
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>部门</b></div>
                <div class="col-sm-8">
                    <select name="group" id="psort" class="form-control">
                    {volist name="gname" id="gdata"}
                    <option value="{$gdata.Gname}">{$gdata.Gname}</option>
                    {/volist}
                        </select>
                 </div>
            </div><br>
            <div class="row">
                <div class="col-sm-3" style="text-align: right;"><b>位置</b></div>
                <div class="col-sm-8"> <input type="text" class="form-control" name="scope" required="" value="{$row.scope}"></div>
            </div><br>
            <div style="margin:20px auto; width: 80px;"><input type="submit" value="修改" class="btn btn-primary"></div>
        </form>
    </section>
</section>
<!--main content end-->
<!--sidebar right start-->
<script>
    function back(){
        window.location="http://www.baidu.com";
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