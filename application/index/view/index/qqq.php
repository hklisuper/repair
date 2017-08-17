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
    <body>
    <section class="main-content-wrapper">
        <section id="main-content">
            <strong>添加客户</strong>
            <hr style="height:1px;border:none;border-top:1px solid #555555;" />
            <div class="panel-body">
                <form role="form" method="post" action="{:url('index/user/adduser')}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1" style="text-align: right;"><label for="exampleInputEmail1">姓名</label></div>
                            <div class="col-md-11"> <input type="text" class="form-control" name="name" ></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1" style="text-align: right;"><label for="exampleInputEmail1">电话</label></div>
                            <div class="col-md-11"> <input type="text" class="form-control" name="tellnum" ></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1" style="text-align: right;"><label for="exampleInputEmail1">地址</label></div>
                            <div class="col-md-11"> <input type="text" id="input" class="form-control" name="address" disabled ></div>
                        </div>
                    </div>

                    <input type="hidden" name="date">
                    <button type="submit" class="btn btn-primary">添加</button>

                    <div class="form-group">
                        <div class="row" style="height: 300px;">
                            <div class="col-md-1" style="text-align: right;"><label for="exampleInputEmail1">选择地址</label></div>
                            <div class="col-md-11" id="container2" tabindex="0"> </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>
    </section>


    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=dd460f124da1c7fed3fcf696d5a54283"></script>
    <script type="text/javascript">
        console.log("adf");
        var map = new AMap.Map('container2',{
            resizeEnable: true,
            zoom: 10,
            center: [116.480983, 40.0958]
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
    <script type="text/javascript" src="http://webapi.amap.com/demos/js/liteToolbar.js"></script>
    </body>
</html>
