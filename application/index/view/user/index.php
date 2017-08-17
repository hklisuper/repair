
{include file="public/header" /}

         {include file="public/nav" /}

        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
               <strong>客户列表(前两个必填)</strong>
                <br><br>
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control"  style="padding: 0px;margin: 1px;" required="" id="name"   placeholder="姓名">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control"  style="padding: 0px;margin: 1px;" required="" id="mobile"  placeholder="电话">
                                        </div>
                                          <div class="col-sm-3">
                                            <input type="text" class="form-control" style="padding: 0px; margin: 1px;"  id="address"  placeholder="地址">
                                          </div>
                        <button type="submit" class="btn btn-primary" onclick="load()">查找</button>                         
                    </div>

               <a href="{:url('index/user/newuser')}" class="btn btn-primary">添加</a>
                <br>
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />
                  <div class="panel-body">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>客户账号</th>
                                            <th>客户姓名</th>
                                            <th>客户电话</th>
                                            <th>客户地址</th>
                                            <th>创建时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                    <tbody id="myDiv">
                                        {volist name='list' id='section'}
                                        <tr>
                                            <td>{$section.account}</td>
                                            <td>{$section.name}</td>
                                            <td>{$section.mobile}</td>
                                            <td>{$section.address}</td>
                                            <td>{$section.date}</td>
                                            <td><a href="{:url('index/user/del')}?id={$section.id}" class="btn btn-primary" style="float: right;">删除</a><a href="{:url('index/user/edit')}?id={$section.id}" type="button" class="btn btn-primary">编辑</a></td>
                                        </tr>
                                        {/volist}
                                    </tbody>
                                </table>
                      {$page}
                            </div>
            </section>
        </section>
        <!--main content end-->
        <!--sidebar right start-->
<script>
    function getidvalue(id){
        return document.getElementById(id).value;
    }
    function load() {
        var xmlhttp;
        var domain=document.domain;
        if (window.XMLHttpRequest)
        {
            // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            // IE6, IE5 浏览器执行代码
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","http://"+domain+"/index/user/search?name="+getidvalue("name")+"&mobile="+getidvalue("mobile")+"&address="+getidvalue("address"),true);
        xmlhttp.send();
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