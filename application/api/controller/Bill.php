<?php
/**
 * Created by PhpStorm.
 * User: 李响
 * Date: 2017/4/18
 * Time: 10:54
 */

namespace app\api\controller;


class Bill 
{
    public $orderid;//工单id
    public $trantp;//工单状态
    public $street;//户主街道
    public $clientna;//客户姓名
    public $telenm;//客户电话
    public $fault;
    public $tranti;//约定维修时间
    public $charge;//计费方式
    public $remark;//备注
}

class newbill{
    public $orderid;//工单id
    public $trantp;//工单状态
    public $street;//户主街道
    public $clientna;//客户姓名
    public $telenm;//客户电话
    public $fault;
    public $tranti;//约定维修时间
    public $charge;//计费方式
    public $remark;//备注
}

//class com{
//    public $comtid;
//public $score;
//public $tranti;
//    public $userna;
//    public $imgpath;
//    public $content;
//}

class msg{
    public $msgid;
    public $title;
    public $content;
    public $tranti;
}
