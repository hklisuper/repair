<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>地图初始加载定位到当前城市</title>
    <link rel="stylesheet" href="http://cache.amap.com/lbs/static/main.css?v=1.0"/>
    <script type="text/javascript"
            src="http://webapi.amap.com/maps?v=1.3&key=dd460f124da1c7fed3fcf696d5a54283"></script>
    <style type="text/css">
        #tip {
            height: 45px;
            background-color: #fff;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid #969696;
            position: absolute;
            font-size: 12px;
            right: 10px;
            bottom: 20px;
            border-radius: 3px;
            line-height: 45px;
        }
    </style>
</head>
<body>
<div id="mapContainer"></div>
<div id="tip">
    <div id="info">初始化加载地图时，center及level属性缺省，地图默认显示用户所在城市范围</div>
</div>
<script type="text/javascript">
    //初始化地图对象，加载地图
    ////初始化加载地图时，若center及level属性缺省，地图默认显示用户当前城市范围
    var map = new AMap.Map('mapContainer', {
        resizeEnable: true
    });
    //地图中添加地图操作ToolBar插件
    map.plugin(['AMap.ToolBar'], function() {
        //设置地位标记为自定义标记
        var toolBar = new AMap.ToolBar();
        map.addControl(toolBar);
    });
</script>
</body>
</html>