<?php
namespace app\index\controller;
use think\Controller;
use app\index\controller\Session ;
use think\Db;
use think\Url;
use app\index\model\Users;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Region;
use app\index\model\ShippingArea;

/**
 * Description of Ui-alerts-notifications
 *
 * @author 李响
 */
class UiAlertsNotifications extends Controller {
    public function index(){
        return $this->fetch();
    }
}
