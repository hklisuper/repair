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
                        <span id="tttt"></span>
        </div>
        </div>
        </div>
        </div>
        <button class="btn btn-info" id="topbtn" style="width: 60px;height: 60px; position: fixed;right: 10%;bottom: 20%;text-align: center;" onclick="totop()"><strong>^</strong></button>
        <script>
//            回到顶部事件
            function totop() {
                scrollTo(0,0);

            }
            document.getElementById("topbtn").addEventListener('mouseover',function () {
                document.getElementById("topbtn").innerHTML="回到<br>顶部";
            });
            document.getElementById("topbtn").addEventListener('mouseout',function () {
                document.getElementById("topbtn").innerHTML="^";
            });
        </script>
        <div class="row" >
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <button class="btn btn-success" style="float: right" type="button" onclick="chang()" id="subbtn">提交</button>
                <button class="btn btn-info" onclick="to1()">基本信息</button>
                <button class="btn btn-warning" id="btn2" onclick="to2()">指派员工</button>
                <button class="btn btn-warning" id="btn3" onclick="to3()">评价售后</button>
                <button class="btn btn-warning" id="btn4" onclick="to4()" >结算和打印</button>
            </div>
        </div>
        <hr>

        <div class="row" id="content1">

            <div class="step-content">
                <div class="step-pane active" id="step1">
                    <form class="form-horizontal" id="form1" action="{:url('index/setbill/add1')}" name="fileinfo" enctype="multipart/form-data">
                        <div class="form-horizontal">
                        <?php  form("标题","title");?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">详细描述</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="detail"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">描述图片</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="file">
                            </div>
                        </div>
                        <?php  form("备注信息","text");?>
                        <?php  form("客户姓名","username");?>
                        <?php  form("客户电话","usertell");?>
                        <?php  form("服务地址","serverlocal");?>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">关联设备</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="linkfacility" placeholder="请点击下面按钮选择设备">
                            </div>
                           </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">选择设备</button>
                                </div>

                            </div>
                                <!-- 模态框（Modal） -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel" style="width: 100%">员工</h4>
                                            </div>
                                            <div class="modal-body" style="overflow: auto;">
                                                {volist name='list' id='staff'}

                                                <input type="radio" name="choofaci" value="{$staff.name}"> {$staff.name}<hr>

                                                {/volist}
                                                {$page}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"onclick="choosefacility()">确定</button>
<!--                                                <button type="button" class="btn btn-primary" onclick="choosefacility()">提交更改</button>-->
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                <!-- End Form Modal -->
                        </div>
<!--                    </form>-->
                </div>
            </div>
            </div>

            <div class="row" id="content2" style="display: none">
                <input type="hidden" id="billid">

                <div class="step-pane" id="step2" style="z-index: 2">
                    <div class="row" style="text-align: center;" id="btndiv">
                        <button class="btn btn-success" onclick="done()" id="donebtn">完成订单</button>
                        <button class="btn btn-warning" onclick="abolish()" id="abolishbtn">取消订单</button>
                    </div>
<!--                    <form class="form-horizontal" id="form2" action="{:url('index/setbill/add2')}">-->
                        <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">标题</label>
                            <div class="col-sm-6">
                                <div id="vtitle"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">详细描述</label>
                            <div class="col-sm-6" id="vdetail">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">描述图片</label>
                            <div class="col-sm-6" id="vdescribeimg">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">备注信息</label>
                            <div class="col-sm-6" id="vtext">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">客户姓名</label>
                            <div class="col-sm-6" id="vusername">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">客户电话</label>
                            <div class="col-sm-6" id="vusertell">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">服务地址</label>
                            <div class="col-sm-6" id="vserverlocal">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">关联设备</label>
                            <div class="col-sm-6" id="vlinkfacility">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">详细描述</label>
                            <div class="col-sm-6">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">选择工人</label>
                            <div class="col-sm-6" id="cstaff">

                            </div>
                        </div>
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button onclick="showstaff()"class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">工人列表</button>
                            </div>


                            <!-- 模态框（Modal） -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">员工</h4>
                                        </div>

                                        <div class="modal-body" style="overflow: auto;">

                                            {volist name='list2' id='staff2'}
                                            <input type="radio" name="choostaff" value="{$staff2.name}"> {$staff2.name}<hr>
                                            {/volist}
                                            {$page2}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"onclick="choosestaff()">确定</button>
                                            <!--                                                <button type="button" class="btn btn-primary" onclick="choosefacility()">提交更改</button>-->
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal -->
                            </div>
                            <!-- End Form Modal -->
                        </div>
<!--                    </form>-->
                </div>
            </div>

                <div class="row" id="content3" style="display: none">
<!--        <div class="row" >-->
                    <div class="step-pane" id="step2" style="z-index: 2">

                        <!--                    <form class="form-horizontal" id="form2" action="{:url('index/setbill/add2')}">-->
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">创建者</label>
                                <div class="col-sm-6">
                                    <div id="author"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">标题</label>
                                <div class="col-sm-6">
                                    <div id="vtitle"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">详细描述</label>
                                <div class="col-sm-6" id="vdetail">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">描述图片</label>
                                <div class="col-sm-6" id="vdescribeimg">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">备注信息</label>
                                <div class="col-sm-6" id="vtext">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">客户姓名</label>
                                <div class="col-sm-6" id="vusername">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">客户电话</label>
                                <div class="col-sm-6" id="vusertell">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">服务地址</label>
                                <div class="col-sm-6" id="vserverlocal">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">评价</label>
                                <div class="col-sm-6">
                                    <select name="" id="comgrade" class="form-control">
                                    <script>
                                        function com5() {
                                            for(var i=1;i<=5;i++){
                                                document.write("<option value='"+i+"'>"+i+"分</option>");
                                            }
                                        }
                                        com5();
                                    </script>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <textarea name="" id="comtext" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                </div>
                        </div>
                    </div>

            <div class="row" id="content4" style="z-index: 0;display: none">
                <br>
                <div class="row" >
                    <label class="col-md-3"></label>
                    <div class="col-md-1">本单收费</div>
                    <div class="col-md-1" id="billtitle"></div>
                    <div class="col-md-3"><input type="text" class="form-control" id="price"></div>
                    <div class="col-md-3">元</div>
                </div>

            </div>



    </section>
</section>
<!--main content end-->
<!--sidebar right start-->
<script>
    // 获取指定 name 的单选框的值
    function getValueForRadio(name) {
        // 获取所有的 input 元素
        var nodes = document.getElementsByTagName('input');
        // 循环判断
        for (var i=0; i<nodes.length; i++) {
            // 如果类型是 radio，name 也符合要求，而且也被选中了
            if (nodes[i].type==='radio' && nodes[i].name===name && nodes[i].checked) {
                //返回相应的值
                return nodes[i].value;
            }
        }
    }

    function getidvalue(id){
        return document.getElementById(id).value;
    }

    var i=1;//全局i
    var j=0;//判断i是否增
    function chang() {
        i++;j=1;
        switch (i){
            case 2:load1();
                document.getElementById("vtitle").innerHTML=getidvalue("title");
                document.getElementById("vdetail").innerHTML=getidvalue("detail");
                document.getElementById("billtitle").innerHTML=getidvalue("title");
                document.getElementById("vtext").innerHTML=getidvalue("text");
                document.getElementById("vusername").innerHTML=getidvalue("username");
                document.getElementById("vusertell").innerHTML=getidvalue("usertell");
                document.getElementById("vserverlocal").innerHTML=getidvalue("serverlocal");
                document.getElementById("vlinkfacility").innerHTML=getidvalue("linkfacility");
                document.getElementById("btn2").setAttribute("class","btn btn-info");
                document.getElementById('content1').style.display="none";
                document.getElementById('content2').style.display="block";
                document.getElementById("subbtn").innerHTML="指派";
                break;
            case 3://document.getElementById("form2").submit();
                load2();
                document.getElementById("abolishbtn").style.display='none';
                document.getElementById("donebtn").style.display='none';
                document.getElementById("btn3").setAttribute("class","btn btn-info");
                document.getElementById('content2').style.display="none";
                document.getElementById('content3').style.display="block";
                document.getElementById("subbtn").innerHTML="评价";

                break;
            case 4:
                load3();
                document.getElementById("btn4").setAttribute("class","btn btn-info");
                document.getElementById('content3').style.display="none";
                document.getElementById('content4').style.display="block";
                document.getElementById("subbtn").innerHTML="结算";
                break;
            case 5:
                load4();
                alert("成功");
                window.location='';break;
        }
    }
    function load1()
    {

        var xmlhttp;
        var domain=document.domain;
        if (window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("billid").innerHTML=xmlhttp.responseText;
//                document.getElementById("tttt").innerHTML=xmlhttp.responseText;
            }
        }

        var fileobj = document.getElementById("file").files[0]; // 获取文件对象

        var oMyForm = new FormData(document.forms.namedItem("fileinfo"));//可以增加表单数据
        oMyForm.enctype="multipart/form-data";
        oMyForm.append("file",fileobj);
        oMyForm.append('title',getidvalue("title"));
        oMyForm.append('detail',getidvalue("detail"));
        oMyForm.append('text',getidvalue("text"));
        oMyForm.append('username',getidvalue("username"));
        oMyForm.append('linkfacility',getidvalue("linkfacility"));
        oMyForm.append('serverlocal',getidvalue("serverlocal"));
        oMyForm.append('usertell',getidvalue("usertell"));

        xmlhttp.open("POST","http://"+domain+"/index/setbill/cload1",true);

        xmlhttp.send(oMyForm);

    }
    //
    function load2()
    {
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
        var ttt=document.getElementById("cstaff").innerHTML;
        xmlhttp.open("GET","http://"+domain+"/index/setbill/cload2?cstaff="+ttt+"&billid="+getidvalue("billid"),true);
        xmlhttp.send();
    }
    //
    function load3()
    {
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

        xmlhttp.open("GET","http://"+domain+"/index/setbill/cload3?comgrade="+getidvalue("comgrade")+"&comtext="+getidvalue("comtext")+"&billid="+getidvalue("billid"),true);
        xmlhttp.send();
    }
    function load4()
    {
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

        xmlhttp.open("GET","http://"+domain+"/index/setbill/cload4?price="+getidvalue("price")+"&billid="+getidvalue("billid"),true);
        xmlhttp.send();
    }


//    选择设备
    function choosefacility() {
        console.log(getValueForRadio("choostaff"));
        document.getElementById("linkfacility").value=getValueForRadio("choofaci");
    }
//选择工人
    function choosestaff() {
        document.getElementById("cstaff").innerHTML=getValueForRadio("choostaff");
    }



//取消订单
    function abolish() {
        document.getElementById("abolishbtn").style.display='none';
        document.getElementById("donebtn").style.display='none';
        document.getElementById("btndiv").innerHTML="已取消";
    }
//    完成订单
    function done() {
        document.getElementById("abolishbtn").style.display='none';
        document.getElementById("donebtn").style.display='none';
        document.getElementById("btndiv").innerHTML="已完成";
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

        xmlhttp.open("GET","http://"+domain+"/index/setbill/cload4"+i+"?tab="+getidvalue("tab")+"&localadd="+getidvalue("localadd")+"&mobile="+getidvalue("mobile")+"&sort="+getidvalue("sort")+"&status="+getidvalue("status"),true);
        xmlhttp.send();
    }



    function to1() {
        if(j==1){
            i=1;
            document.getElementById('content1').style.display="block";
            document.getElementById('content2').style.display="none";
            document.getElementById('content3').style.display="none";
            document.getElementById('content4').style.display="none";
        }
//        alert("124554");
    }

    function to2() {
        if(j==1){
            i=2;
            document.getElementById('content1').style.display="none";
            document.getElementById('content2').style.display="block";
            document.getElementById('content3').style.display="none";
            document.getElementById('content4').style.display="none";
        }

    }

    function to3() {
        if(j==1){
            i=3;
            document.getElementById('content1').style.display="none";
            document.getElementById('content2').style.display="none";
            document.getElementById('content3').style.display="block";
            document.getElementById('content4').style.display="none";
        }

    }

    function to4(){
        if(j==1){
            i=4;
            document.getElementById('content1').style.display="none";
            document.getElementById('content2').style.display="none";
            document.getElementById('content3').style.display="none";
            document.getElementById('content4').style.display="block";
        }

    }
</script>
<!--sidebar right end-->
<!--Global JS-->
<script src="/js/jquery-1.10.2.min.js"></script>
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