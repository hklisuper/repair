   {include file="public/header" /}
      {include file="public/nav" /}
      <section class="main-content-wrapper">
            <section id="main-content">
                <strong>派单员列表</strong>
                <br><br>

                <a href="{:url('index/section/addsendman')}" class="btn btn-primary">添加派单员</a>

                <hr style="height:1px;border:none;border-top:1px solid #555555;" />

                <div class="panel-body">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>姓名</th>
                                           
                                            <th>职务</th>
                                            <th>派单范围</th>
                                            <th>日期</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                    <tbody id="mydiv">
                                         {volist name='list' id='section'}
                                             <tr>
                                            <td>{$section.name}</td>
                                            <td>{$section.status}</td>
                                            <td>{$section.scope}</td>
                                            <td>{$section.date}</td>
                                            <td><a href="{:url('index/section/delsendman')}?id={$section.id}" class="btn btn-primary" style="float: right;">删除</a><a href="{:url('index/section/editman')}?id={$section.id}" type="button" class="btn btn-primary">编辑</a></td>
                                        </tr>
                                        {/volist}

                                    </tbody>
                                </table>
                    {$page}
<!--
  {volist name='list' id='Section'}
                       <tr>
                           <td>{$Section.name}</td>
                      <td>{$Section.status}</td>

                       <td>{$Section.scope}</td>
                     <td>{$Section.date}</td>
                     <td><a href='{:url('index/Section/del')}?id={$Section.id}' class='btn btn-primary' style='float: right;'>删除</a><a href='{:url('index/Section/edit')}?id={$Section.id}' type='button' class='btn btn-primary'>编辑</a></td>
                   </tr>
                   {/volist}-->
                            </div>
          </section>
      </section>
   <script>
       function getidvalue(id){
           return document.getElementById(id).value;
       }
       //定义全局
       var page=1;

       function next() {
//              var sort=document.getElementById("sort").value;

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
                   document.getElementById("mydiv").innerHTML=xmlhttp.responseText;

               }
           }
           page=page+1;
           xmlhttp.open("GET","http://localhost/index/Section/next?page="+page,true);
           xmlhttp.send();
           console.log(page);
       }
//       if(page==1){
//           document.getElementById("pre_btn").disabled=true;
//       }

       function pre() {
//              var sort=document.getElementById("sort").value;
           page-=1;
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
                   document.getElementById("mydiv").innerHTML=xmlhttp.responseText;

               }
           }
           xmlhttp.open("GET","http://localhost/index/Section/pre?page="+page,true);
           xmlhttp.send();
           console.log(page);
       }
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
