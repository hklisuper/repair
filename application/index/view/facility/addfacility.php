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

    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
        #header{
            background: #f1f2f7;
        }
        .main-content-wrapper{
            background:#fff;
        }
        body,html,#container2{
            height: 100%;
            margin: 0px;
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
                        <button type="button" class="btn btn-default" id="toggle-right">
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
                <div class="row">
                    <div class="col-sm-2" style="font-size: 18px;"><strong>添加设备 </strong></div>

                    <div class="col-md-10" style="text-align: right;">
                        <a class="btn btn-success" href="{:url('index/facility/mag_eq')}" style="float: right; color: white">返回</a>
                    </div>
                </div>
               <form method="post" action="{:url('index/facility/add')}">
  
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />
                <div class="row">
                    <div class="col-sm-3" style="text-align: right;"><b>设备名字</b></div>
                    <div class="col-sm-8"> <input type="text" class="form-control" name="pid" placeholder="请输入设备名称或设备编号"></div>
                    
                </div>
                <br>  
                <div class="row">
                    <div class="col-sm-3" style="text-align: right;"><b>设备描述</b></div>
                    <div class="col-sm-8"><textarea class="form-control" style="height: 100px; " name="pinfo" placeholder="请输入设备的详情，例：设备的技术参数，配件等，便于设备维护时，进行资料查询。"></textarea></div>
                </div><br>
                 <div class="row">
                    <div class="col-sm-3" style="text-align: right;"><b>设备分组</b></div>
                     <div class="col-sm-8">
                     <select name="psort" id="psort" class="form-control">
                         {volist name="pres" id="pdata"}
                         <option value="{$pdata.name}">{$pdata.name}</option>
                         {/volist}
                     </select>
                    </div>
                </div><br>
                  <div class="row">
                    <div class="col-sm-3" style="text-align: right;"><b>联系人名字</b></div>
                      <div class="col-sm-8">
                          <select name="userinfo" id="uname" class="form-control">
                              {volist name="res" id="data"}
                              <option value="{$data.name}">{$data.name}</option>
                              {/volist}
                          </select>
                      </div>

                </div><br>
<!--                  <div class="row">-->
<!--                    <div class="col-sm-3" style="text-align: right;"><b>联系人电话</b></div>-->
<!--                    <div class="col-sm-8"> <input type="text" class="form-control" name="usermobile" placeholder="请使用设备联系人电话"></div>-->
<!--                </div><br>-->
<!--                   <div class="row">-->
<!--                       <div class="col-sm-3" style="text-align: right;"><b>联系人地址</b></div>-->
<!--                       <div class="col-sm-8"> <input type="text" class="form-control" name="useradd" placeholder="请使用设备联系人地址"></div>-->
<!--                   </div><br>-->
                  <div class="row">
                    <div class="col-sm-3" style="text-align: right;"><b>设备所在地</b></div>
                    <div class="col-sm-8"> <input type="text" class="form-control" name="p_local" id="input" disabled></div>
                </div><br>
                <div style="margin:20px auto; width: 80px;"><input type="submit" value="保存" class="btn btn-primary"></div>
                </form>
                <div class="form-group">
                    <div class="row" style="height: 300px;">
                        <div class="col-md-1" style="text-align: right;"><label for="exampleInputEmail1">选择地址</label></div>
                        <div class="col-md-11" id="container2" tabindex="0"> </div>
                    </div>
                </div>
            </section>
        </section>
        <!--main content end-->
        <!--sidebar right start-->
   <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=dd460f124da1c7fed3fcf696d5a54283"></script>
   <script type="text/javascript">
       console.log("adf");
       var map = new AMap.Map('container2',{
           resizeEnable: true,
           zoom: 15,

       });
       AMap.plugin('AMap.Geocoder',function(){


           var geocoder = new AMap.Geocoder({
               city: "010"//城市，默认：“全国”
           });
           var marker = new AMap.Marker({
               map:map,
               bubble:true
           })

           map.on('click',function(e){
               marker.setPosition(e.lnglat);
               geocoder.getAddress(e.lnglat,function(status,result){
                   if(status=='complete'){
                       document.getElementById('input').value = result.regeocode.formattedAddress
                   }
               })
           })

       });

   </script>
   <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <script type="text/javascript" src="http://webapi.amap.com/demos/js/liteToolbar.js"></script>
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