<?php
//$label: label和placeholder的内容,$name:input中name名
 function form($label,$name){
     echo "<div class='form-group'>
        <label class='col-sm-3 control-label'>".$label."</label>
        <div class='col-sm-6'>
            <input type=text' class='form-control'name='".$name."' placeholder='".$label."' id='".$name."'>
        </div>     
    </div>  ";      
}
?>