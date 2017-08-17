   {include file="public/header" /}

         {include file="public/nav" /}

        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <strong>客户评价</strong>

                <div class="row" style="text-align: center">
                    <div class="col-md-1" style="text-align: right">
                        单标题：
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="col-md-1" style="text-align: right">
                        工人：
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-success" style="width: 100%"  onclick="load()">查找</button>
                    </div>
                </div>
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />



                <form action="{:url('index/user/solovecont')}" method="post">
                    <div class="row" >
                        <div class="col-md-12" id="myDiv"style="font-family: "Century Gothic", "Microsoft yahei"">

                    </div>

                    </div>
                
                
                
                    <div class="col-md-12">
                        <label for="#score">用户:</label>
                        <select name="user" id="uname" class="form-control">
                            {volist name="res" id="data"}
                            <option value="{$data.name}">{$data.name}</option>
                            {/volist}
                        </select>
                            <label for="#score">员工:</label>
                            <input type="text" id="staff" class="form-control" disabled>
                        <label for="#score">评分:</label>
                        <select name="score" id="score" class="form-control">
                            <script>
                                function op5(){
                                    for(var i=1;i<=5;i++){
                                        document.write("<option value='"+i+"'>"+i+"</option>");
                                    }
                                }
                                op5();
                            </script>
                        </select>
                        <label for="#score">内容:</label>
                        <textarea name="cont" id="cont" cols="30" rows="10" class="form-control"></textarea>
                        <br>
                            
                        <div class="row" style="text-align: center">
                            <button class="btn btn-success">评价</button>
                        </div>
                     
                    </div>


                </form>
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
                   document.getElementById('staff').value=getidvalue('name');
               }
           }
           xmlhttp.open("GET","http://"+domain+"/index/user/ajaxcont?title="+getidvalue("title")+"&name="+getidvalue("name"),true);
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