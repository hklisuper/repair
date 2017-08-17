<?php
namespace app\index\controller;
use think\Controller;
use app\index\controller\Session ;
use think\Db;
use think\db\Query;
use think\Url;
use app\index\model\Admin;
use app\index\model\Users;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Region;
use app\index\model\ShippingArea;
use think\Request;

class Config extends Controller{
    public function userlogin(){
        return $this->fetch();
    }
}