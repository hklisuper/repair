   {include file="public/header" /}

         {include file="public/nav" /}

        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <strong>单列表 共{$count}条</strong>
                <br><br>
                    <div class="row">
                        <div class="col-xs-2 col-sm-1"></div>
                        <div class="col-md-8">
                         <div class="row">
                                <input type="text" class="form-control"  id="tab" placeholder="标题">
                         </div>
                        <br>
                        <div class="row">
                                <input type="text" class="form-control" id="localadd" placeholder="客户地址或关键词">

                        </div>
                        <br>
                        <div class="row">


                                <input type="text" class="form-control" id="mobile"  placeholder="客户电话">

                        </div>
                        <br>
                        <div class="row">

                                <select class="form-control input-sm" id="sort">
                                    <option value="">派单</option>
                                    <option value="">抢单</option>
                                </select>

                        </div>
                        <br>
                        <div class="row">

                                <select class="form-control input-sm" id="status">
                                    <option value="">未指派工人</option>
                                    <option value="">工单处理中</option>
                                    <option value="">待售后评价</option>
                                    <option value="">待结算</option>
                                    <option value="">取消</option>
                                </select>

                        </div>
                                <div class="row">
                                    <div class="col-md-10">

                                    </div>
                                </div>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <input type="submit" class="btn btn-primary"  style=" height: 100px; width: 100px;border-radius: 15px;"  onclick="load()" value="查找">
                        </div>
                    </div>
                  <div class="panel-body" id="tDiv">
                      {$page}
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>标题</th>
                                            <th>客户姓名</th>
                                            <th>客户电话</th>
                                            <th>客户地址</th>
                                            <th>创建时间</th>
                                            <th>抢单工人</th>
                                            <th>已派工人</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myDiv">
                                         {volist name='list' id='section'}
                                        <tr>
                                            <td>{$section.title}</td>
                                            <td>{$section.user_name}</td>
                                            <td>{$section.tellnum}</td>
                                            <td>{$section.local}</td>
                                            <td>{$section.date}</td>
                                            <td>{$section.staff_name}</td>
                                            <td>{$section.staff_done}</td>
                                            <td>
                                                {if condition="($section.status == 0)and $section.pass==0"} 未接（未审核）
                                                {elseif condition="($section.status == 0)and $section.pass==1"/}未接(已审核)
                                                {elseif condition="$section.status eq 1"/}维修中
                                                {else /} 完成
                                                {/if}
                                                </td>
                                            <td><a href="{:url('index/setbill/del')}?id={$section.id}" class="btn btn-primary" style="float: right;">删除</a><a href="{:url('index/setbill/edit')}?id={$section.id}" type="button" class="btn btn-primary">编辑</a></td>
                                        </tr>
                                        {/volist}
                                      
                                    </tbody>
                                </table>
                            </div>
                
                <script>

                    function getidvalue(id) {
                        return document.getElementById(id).value;
                    }
                    function load()
                    {
//
                        var xmlhttp;
                        var domain=document.domain;
                        if(getidvalue("localadd")==""||getidvalue("tab")==""||getidvalue("mobile")==""){
                            alert("请将信息填完整！");
                            exit();
                        }
//
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
                        xmlhttp.open("GET","http://"+domain+"/index/setbill/search?tab="+getidvalue("tab")+"&localadd="+getidvalue("localadd")+"&mobile="+getidvalue("mobile")+"&sort="+getidvalue("sort")+"&status="+getidvalue("status"),true);
                        xmlhttp.send();
                        alert("234324");
                    }
                </script>
            </section>
        </section>
        <!--main content end-->
        <!--sidebar right start-->

       <!--sidebar right end-->

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