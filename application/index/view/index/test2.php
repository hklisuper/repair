<html>
<head>
    <title></title>
</head>
<body>
<p>求最大质因子：
    <input type="text" id="txt">
    <button onclick="maxprime()">show</button>
</p>
<form role="form" action="{:url('index/index/ttt')}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">图像：(接受gif、jpeg、png格式)</label>
        <input type="file" name="imgf" accept="image/gif,image/jpeg,image/png">
        <input type="text" name="txt">
        <input type="submit" value="上传">
    </div>
</form>
<!--位运算-->
<p id="bit"></p>
<!--fabs-->
<p><input type="text" id="fab"><button onclick="fabs()">fabs</button></p>
</body>
<script>
    function getidvalue(id){
        return document.getElementById(id).value;
    }
//    求最大质因子
    function maxPrimeFactor(n) {
        var pf = 1; // 最大质因数
        for (var i = 2; n > 1; ++i) {
            while (n % i == 0) {
                    n /= i;
                    pf=i;
                }
        }
        return pf;
    }
//dd460f124da1c7fed3fcf696d5a54283
    function maxprime() {
        alert(maxPrimeFactor(getidvalue("txt")));
    }
//位运算  交换
    function bitoperation() {
        var a=2,b=5;
        a=a^b;
        b=b^a;
        a=a^b;
        document.getElementById('bit').innerHTML="a="+a+",b="+b;
    }
    bitoperation();

//
    function fabs() {
        alert(Math.abs(getidvalue("fab")));
    }
</script>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: 李响
 * Date: 2017/3/12
* Time: 23:35
*/
