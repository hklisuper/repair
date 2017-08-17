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

        