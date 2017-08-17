   {include file="public/header" /}

  {include file="public/nav" /}
      <section class="main-content-wrapper">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-2"><strong>添加工人</strong></div>
                    <div class="col-md-10" style="text-align: right;">
                        <button class="btn btn-success" onclick="goback()" style="float: right;">返回</button>
                    </div>
                </div>
       <hr style="height:1px;border:none;border-top:1px solid #555555;" />
           <div class="panel-body">
                   <form role="form" action="{:url('index/staff/add')}" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">姓名</label>
                                        <input type="text" class="form-control"  name="name">
                                    </div>
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">图像：(接受gif、jpeg、png格式)</label>
                                       <input type="file" name="imgf" accept="image/gif,image/jpeg,image/png" class="form-control">
                                   </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">电话</label>
                                        <input type="text" class="form-control" name="mobile">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">职务</label>
                                        <input type="text" class="form-control" name="status">
                                    </div>
                                   <div class="form-group">
                                       <label for="exampleInputPassword1">部门</label>
                                       <select name="group"  class="form-control">

                                           {volist name='res' id='data'}
                                           <option value="{$data.Gname}">{$data.Gname}</option>
                                           {/volist}
                                       </select>

                                   </div>
                                   
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </form>
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

   {include file="public/footer" /}