<!--   部门设置-->
{include file="public/header" /}
      {include file="public/nav" /}
      <section class="main-content-wrapper">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-10"><strong>部门列表</strong></div>
                    <div class="col-md-2"><a href="{:url('index/section/index')}" class="btn btn-success" style="color: #fff">返回</a></div>
                </div>
                <br><br>
                <a href="{:url('index/section/addsection')}" class="btn btn-primary">添加部门</a>
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />
                <div class="panel-body">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>名称</th>
                                            <th>负责人</th>
                                            <th>备注</th>
                                            <th>时间</th>                                         
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {volist name='list' id='section'}
                                             <tr>
                                            <td>{$section.Gname}</td>
                                            <td>{$section.Gleader}</td>
                                            <td>{$section.remark}</td>
                                            <td>{$section.date}</td>
                                            <td><a href="{:url('index/section/del')}?id={$section.id}" class="btn btn-primary" style="float: right;">删除</a><a href="{:url('index/section/edit')}?id={$section.id}" type="button" class="btn btn-primary">编辑</a></td>
                                        </tr>
                                        {/volist}
                                       
                                       
                                    </tbody>
                                </table>

                            </div>
        
          </section>
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
    <script>
    $(document).ready(function() {
        app.timer();
        app.map();
        app.weather();
        app.morrisPie();
    });
    </script>   
   {include file="public/footer" /}
