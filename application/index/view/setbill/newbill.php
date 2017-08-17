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
                                <h3 class="panel-title">新建派单</h3>
                                <div class="actions pull-right">
<!--                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>-->
                                </div>
                            </div>
                            <div class="panel-body">
                                <section class="fuelux">
                                    <div id="MyWizard" class="wizard">
                                        <ul class="steps">
                                            <li data-target="#step1" class="active">
                                                <span class="badge badge-info">1</span>基本信息
                                                <span class="chevron"></span>
                                            </li>
                                            <li data-target="#step2">
                                                <span class="badge">2</span>指派员工
                                                <span class="chevron"></span>
                                            </li>
                                            <li data-target="#step3">
                                                <span class="badge">3</span>工单处理
                                                <span class="chevron"></span>
                                            </li>
                                            <li data-target="#step4">
                                                <span class="badge">4</span>评价售后
                                                <span class="chevron"></span>
                                            </li>
                                        </ul>
                                        <div class="actions">
                                            <button type="button" class="btn btn-default btn-mini btn-prev"> <i class="fa fa-chevron-left"></i> Prev</button>
                                            <button type="button" class="btn btn-primary btn-mini btn-next" data-last="Finish">Next <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="step-content">
                                        <div class="step-pane active" id="step1">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                        <h2 class="title">基本 信息</h2>
                                                    </div>
                                                </div>
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
                                                        <input type="file" class="form-control">
                                                    </div>     
                                                </div>
                                                <?php  form("备注信息","remark");?>
                                                <?php  form("客户姓名","username");?>
                                                <?php  form("客户电话","usertell");?>
                                                <?php  form("服务地址","servelocal");?>
                                               
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">关联设备</label>
                                                    <div class="col-sm-6">

                                                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form2Modal">
                                                           选择设备
                                                        </button>


                                                         <!-- Form Modal -->
                                                         <div class="modal fadeIn" id="form2Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Form Modal</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal" role="form">
                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Sign in</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    <!-- End Form Modal -->
                                                    </div>     
                                                </div>
                                            </form>
                                        </div>
                                        <div class="step-pane" id="step2">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                        <h2 class="title">User Address</h2>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Address</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Country</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control">
                                                            <option value="">Country</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">City</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">State</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control">
                                                            <option value="">State</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Zip</label>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="step-pane" id="step3">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                        <h2 class="title">Payment Info</h2>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Card No</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Expiration</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option value="">Month</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option value="">Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">CSV</label>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                         <div class="step-pane" id="step4">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                        <h2 class="title">Payment Info</h2>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Card No</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Expiration</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option value="">Month</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option value="">Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">CSV</label>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!--main content end-->
        <!--sidebar right start-->
         
        <!--sidebar right end-->
    </section>
    <!--Global JS-->
    <script src="/js/jquery-1.10.2.min.js"></script>
    <!--<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>-->
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
   <script src="/plugins/wizard/js/loader.min.js"></script>
 <script src="/js/modernizr-2.6.2.min.js"></script>
   <script>
    $(document).ready(function() {
        $('#myWizard').wizard();
        // $('#myModal').modal('hide');
    });
    </script>

  
{include file="public/footer" /}