<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>维修系统管理平台</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="/css/main.css">
    <!-- Vector Map  -->
    <link rel="stylesheet" href="/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css">
    <!-- ToDos  -->
    <link rel="stylesheet" href="/plugins/todo/css/todos.css">
    <!-- Morris  -->
    <link rel="stylesheet" href="/plugins/morris/css/morris.css">


    <!-- Fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <!-- Feature detection -->
    <script src="/js/modernizr-2.6.2.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
    <style>
        #modal-overlay {
            display:none;
            position: fixed;   /* 使用绝对定位或固定定位  */
            left: 0;
            top: 0;
            width:100%;
            height:100%;
            text-align:center;
            z-index: 1000;
            background-color: #333;
            opacity: 0.8;   /* 背景半透明 */
        }
        /* 模态框样式 */
        .modal-data{
            position: relative;
            width:80%;
            margin: 100px auto;
            /*background-color: #fff;*/
            /*border:1px solid #000;*/
            padding:15px;
            text-align:center;
            border-radius:4px;
        }

        #x{
            position: absolute;
            top: 0px;
            right:0px;
        }
        #header{
            background: #f1f2f7;
        }
        .main-content-wrapper{
            background:#fff;
        }
    </style>
</head>

<body>

<section id="container">
    <header id="header">
        <!--logo start-->
        <div class="brand">
            <a href="{:url('index/index/index')}" class="logo">
                <span>维修系统</span>管理</a>
        </div>
        <!--logo end-->
        <div class="toggle-navigation toggle-left">
            <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="隐藏/展示导航">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="user-nav">
            <ul>
                <li class="dropdown messages">

                </li>
                <li class="profile-photo">
                    <img src="/img/admin.png" alt="" class="img-circle">
                </li>
                <li class="dropdown settings">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {:session('account')} <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu animated fadeInDown">

                        <li>
                            <a href="{:url('index/index/logout')}" id="logout"><i class="fa fa-power-off"></i> Logout</a>
                            <script>
                                document.getElementById('logout').onmouseover=function () {
                                    this.innerHTML="<i class='fa fa-power-off'></i> 退出" ;
                                };
                                document.getElementById('logout').onmouseout=function () {
                                    this.innerHTML="<i class='fa fa-power-off'></i> Logout" ;
                                };
                            </script>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="toggle-navigation toggle-right">
                        <button type="button" class="btn btn-default" id="toggle-right"  title="消息面板">
                            <i class="fa fa-comment"></i>
                        </button>
                    </div>
                </li>

            </ul>
        </div>
    </header>
    <!--sidebar left start-->



    {include file="public/nav" /}

        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
               <strong>设备管理</strong>

                    <div class="form-group">
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"  style="padding: 0px;margin: 1px;"  id="proname"   placeholder="名字">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"  style="padding: 0px;margin: 1px;"   id="username" placeholder="联系人姓名">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" style="padding: 0px; margin: 1px;"   id="usermobile" placeholder="联系人号码">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2" style="text-align: center">
                                    <input type="submit" class="btn btn-primary" onclick="load()" value="查找">
                                </div>
                            </div>
<!--                            <div class="row">-->
<!--                                <div class="col-sm-1"></div>-->
<!--                                <div class="col-sm-4">-->
<!--                                    <select class="form-control input-sm" id="sort">-->
<!--                                        <option value="派单">派单</option>-->
<!--                                        <option value="抢单">抢单</option>-->
<!---->
<!--                                    </select>-->
<!--                                </div>-->
<!--                                        <div class="col-sm-4">-->
<!--                                            <select class="form-control input-sm" id="status">-->
<!--                                                <option value="未指派工人">未指派工人</option>-->
<!--                                                <option value="工单处理中">工单处理中</option>-->
<!--                                                <option value="待售后评价">待售后评价</option>-->
<!--                                                <option value="待结算">待结算</option>-->
<!--                                                <option value="取消">取消</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!---->
<!--                                </div>-->
                        </div>

                    </div>




               <a href="{:url('index/facility/addfacility')}" class="btn btn-primary">添加</a>
                <br>
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />
                  <div class="panel-body">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>产品名</th>
                                            <th>联系人姓名</th>
                                            <th>联系人电话</th>
                                            <th>联系人地址</th>
                                            <th>二维码</th>
                                            <th>设备分组</th>
                                            <th>创建时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                    <tbody id="myDiv">

                                    {volist name='list' id='facility'}
                                    <tr>
                                        <td>{$facility.name}</td>
                                        <td>{$facility.buyer}</td>
                                        <td>{$facility.buyer_mob}</td>
                                        <td>{$facility.buyer_add}</td>
                                        <td><img src="{$facility.img_name}" alt="" height="40px" width="40px" onclick="javascript:loadimg(this);"></td>
                                        <td>{$facility.pro_sort}</td>
                                        <td>{$facility.ctime}</td>
                                        <td><a href="{:url('index/facility/del')}?id={$facility.id}" class="btn btn-primary" style="float: right;">删除</a><a href="{:url('index/facility/edit')}?id={$facility.id}" type="button" class="btn btn-primary">编辑</a></td>
                                    </tr>
                                    {/volist}

                                    {$page}
                                    </tbody>
                                </table>
                      <div id="modal-overlay">
                          <button id="x" onclick="loadimg()" class="btn btn-success">x</button>
                                <div class="modal-data" id="modal-data">
                                    <img src="" alt="" id="aim">
                                </div>
                            </div>
                     </div>
            </section>
        </section>

        <!--main content end-->
        <!--sidebar right start-->
       <script>

           function loadimg(obj){
             //  alert(obj.src);
               var e1 = document.getElementById('modal-overlay');
               e1.style.display =  (e1.style.display == "block"  ) ? "none" : "block";
                var aim=document.getElementById('aim');
               aim.src=obj.src;
           }
           function getidvalue(id){
               return document.getElementById(id).value;
           }
           function load() {
               if(getidvalue("proname")==""||getidvalue("username")==""||getidvalue("usermobile")==""){
                   alert("请完整填写");
                    exit();
               }
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
               xmlhttp.open("GET","http://"+domain+"/index/Facility/search?proname="+getidvalue("proname")+"&username="+getidvalue("username")+"&usermobile="+getidvalue("usermobile"),true);
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