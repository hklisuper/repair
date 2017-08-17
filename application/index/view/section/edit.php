   {include file="public/header" /}

         {include file="public/nav" /}

        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-2">
                        <strong>编辑部门</strong>
                    </div>
                    <div class="col-md-10" style="text-align: right;">
                        <button class="btn btn-success" onclick="goback()" style="float: right;">返回</button>
                    </div>
                </div>
       <hr style="height:1px;border:none;border-top:1px solid #555555;" />
           <div class="panel-body">
               <form role="form" method="post" action="{:url('index/section/update')}">                              
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1" style="text-align: right;"><label for="exampleInputEmail1">名称</label></div>
                                            <div class="col-md-11"> <input type="text" class="form-control" name="Gname" value="{$row.Gname}"></div>
                                        </div>      
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                            <div class="col-md-1" style="text-align: right;"><label for="exampleInputEmail1">备注</label></div>
                                            <div class="col-md-11"> <input type="text" class="form-control" name="remark"  value="{$row.remark}"></div>
                                        </div>    
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                            <div class="col-md-1" style="text-align: right;"><label for="exampleInputEmail1">负责人</label></div>
                                            <div class="col-md-11"> <input type="text" class="form-control" name="leader" value="{$row.Gleader}" ></div>
                                        </div>    
                                    </div>   
                                     <input type="hidden" name="id" value="{$row.id}">
                                    <button type="submit" class="btn btn-primary">修改</button>
                                </form>
                            </div>
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