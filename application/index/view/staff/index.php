   {include file="public/header" /}
      {include file="public/nav" /}
      <section class="main-content-wrapper">
            <section id="main-content">
                <strong>员工列表</strong>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"><input type="text" class="form-control" id="name" placeholder="姓名"></div>
                        <div class="col-md-4"><input type="text" class="form-control" id="tell" placeholder="电话">  </div>
                        <div class="col-md-1"><input class="btn btn-primary" onclick="load()" value="查找"></div>
                    </div>                          
                <a href="{:url('index/staff/addstaff')}" class="btn btn-primary">添加员工</a>
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />
                <div class="panel-body">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>姓名</th>
                                            <th>电话</th>
                                            <th>职务</th>
                                            <th>部门</th>
                                            <th>历史订单</th>
                                            <th>位置</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                    <tbody id="myDiv">
                                         {volist name='list' id='section'}
                                             <tr>
                                            <td>{$section.name}</td>
                                            <td>{$section.mobile}</td>
                                            <td>{$section.status}</td>
                                            <td>{$section.group_id}</td>
                                             <td>{$section.done}</td>
                                             <td>{$section.scope}</td>
                                            <td><a href="{:url('index/staff/del')}?id={$section.id}" class="btn btn-primary" style="float: right;">删除</a><a href="{:url('index/staff/edit')}?id={$section.id}" type="button" class="btn btn-primary">编辑</a></td>
                                        </tr>
                                        {/volist}
                                      {$page}
                                    </tbody>
                                </table>

                            </div>
          </section>
      </section>
   <script>
       function getidvalue(id){
           return document.getElementById(id).value;
       }
       function getclassvalue(id){
           return document.getElementsByClassName(id).value;
       }
       function load()
       {
           var domain = document.domain;//获取域名

           var xmlhttp;
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
           xmlhttp.open("GET","http://"+domain+"/index/staff/search?name="+getidvalue("name")+"&tell="+getidvalue("tell"),true);
           xmlhttp.send();
         
       }
//       function load() {
//           if(getidvalue("name")==""||getidvalue("tell")==""){
//               alert("信息不完整");
//               exit();
//           }
//           var domain = document.domain;//获取域名
//           var xmlhttp;
//           if (window.XMLHttpRequest)
//           {
//               // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
//               xmlhttp=new XMLHttpRequest();
//           }
//           else
//           {
//               // IE6, IE5 浏览器执行代码
//               xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//           }
//           xmlhttp.onreadystatechange=function()
//           {
//               if (xmlhttp.readyState==4&& xmlhttp.status==200)
//               {
//                   document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
//               }
//           }
//           xmlhttp.open("GET","http://"+domain+"/index/staff/search?name="+getidvalue("name")+"&tell="+getidvalue("tell"),true);
//           xmlhttp.send();
//       }
//       function load(){
////           alert(getidvalue("name"));
//           var domain = document.domain;
//           alert(domain);
//       }

   </script>
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
