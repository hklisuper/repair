  <aside class="sidebarRight">
            <div id="rightside-navigation ">
                <div class="sidebar-heading"><i class="fa fa-user"></i> 消息面板</div>


                    <div id="send" style="color: whitesmoke">
                        <strong>标题：</strong>
                        <input type="text" class="form-control" id="sendt">
                        <strong>内容：</strong>
                        <textarea name="cont" class="form-control" id="cont" cols="30" rows="10"></textarea>
                        <br><br><br>
                        <button class="btn btn-success form-control" onclick="sendload()">发送</button>
                    </div>

            </div>
        </aside>


</body>
 <script>
    $(document).ready(function() {
        app.timer();
        app.map();
        app.weather();
        app.morrisPie();
    });

    $(function () {
        $("[data-toggle='popover']").popover();
    });
//返回
    function goback() {
        window.history.back();
    }
    

    function getidvalue(id){
        return document.getElementById(id).value;
    }
    function sendload() {
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
                document.getElementById("send").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","http://"+domain+"/index/index/send?title="+getidvalue("sendt")+"&cont="+getidvalue("cont"),true);
        xmlhttp.send();
//        alert("    f ");
    }
    </script>   
</html>