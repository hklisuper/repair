{include file="public/header" /}

{include file="public/nav" /}

<!--main content start-->
<section class="main-content-wrapper">
    <section id="main-content">

        <p><strong>结算(测试数据：1111)</strong></p>
        <div style="text-align: center;">
            <strong>要结算工人</strong>
            <button style="float:right;" class="btn btn-3d btn-info" onclick="load()">查找</button>
            <input type="text" class="bounceInUp" id="staff">
        </div>
        <br>
        <hr>



        <div class="panel-body" id="tDiv">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>订单标题</th>
                    <th>时间</th>
                    <th>费用</th>
                </tr>
                </thead>


                <tbody id="myDiv">
<!--                <tr style="text-align: center;"><td>没有查找记录</td></tr>-->

                </tbody>
            </table>

        </div>
        <div style="text-align: center;" id="tDivhide">没有查找记录</div>
    </section>
</section>
<!--main content end-->
<!--sidebar right start-->
<script>
    function done() {
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

        xmlhttp.open("GET","http://"+domain+"/index/setbill/accfind?spend="+getidvalue("spend"),true);

        xmlhttp.send();
    }


    function load()
    {
        document.getElementById('tDivhide').style.display='none';

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

    xmlhttp.open("GET","http://"+domain+"/index/setbill/accfind?staff="+getidvalue("staff"),true);

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