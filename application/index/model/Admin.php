<?php
namespace app\index\model;
use think\Model;
/**
 * Description of Admin
 *
 * @author 李响
 */
class Admin extends Model {
    public function momo(){
        return $this->hasOne('account','pwd','img_name');
    }
}
