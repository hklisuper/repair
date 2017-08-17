<?php
namespace app\api\controller;
use think\Controller;
use think\Db;

use think\db\Query;
use think\Url;

use think\Validate;
class Setbill extends Controller
{


    function ttt($num){
        echo $num;
        $da=array();
        $users= Db::name('bill')->where('status',$num)->select();
        $totrec=Db::name('bill')->where('status',$num)->count();
//        $da[]=array();
        foreach ($users as $user) {
            $bill=new Bill();
            $bill->orderid=$user['id'];
            $bill->title=$user['title'];
            $bill->trantp=$user['status'];
            $bill->clientna=$user['user_name'];
            $bill->telenm=$user['tellnum'];
            $bill->fault=$user['text'];
            $bill->tranti=$user['tranti'];
            $bill->address=$user['local'];
            $bill->remark=$user['remark'];
            $da[]=$bill;
        }
        return json_encode(array(
            'totrec'=>$totrec,
            'orderli'=>$da
        ));
    }
    public function test(){
        $data=json_decode(file_get_contents("php://input"),true);
        dump($data);
    }
    public function index(){
//        dump(json_decode($this->ttt(1)));
        $t=$this->ttt(2);
        dump(json_decode($t));
    }
//    工单列表
    public function orderlist(){
        $data=json_decode(file_get_contents("php://input"),true);
        $da=array();


        $sid=Db::name('staff')->where('account',$userid)->value('sessid');
        $sessid=$data['sessid'];
        if($sessid<>$sid){
            return json_encode(array(
                'retcode'=>'400',
                "retMsg"=>'不允许访问',
            ));
        }
        $account=$data['userid'];//获取用户名
        $trantp=$data['trantp'];//查询工单状态

        if ($trantp==null){
            $users= Db::name('bill')->select();
            $totrec=Db::name('bill')->count();
//        $da[]=array();
            foreach ($users as $user) {
                $bill=new Bill();
                $bill->orderid=$user['id'];
                $bill->title=$user['title'];
                $bill->trantp=$user['status'];
                $bill->clientna=$user['user_name'];
                $bill->telenm=$user['tellnum'];
                $bill->fault=$user['text'];
                $bill->tranti=$user['tranti'];
                $bill->address=$user['local'];
                $bill->remark=$user['remark'];
                $da[]=$bill;
            }
            return json_encode(array(
                'retCode'=>'0000',
                'totrec'=>$totrec,
                'orderli'=>$da
            ));
        }
        else if ($trantp==0){
            return $this->ttt(0);
        }else if($trantp==1){

           return $this->ttt(1);
        }else if($trantp==2){
            return $this->ttt(2);
        }else{
           return $this->ttt(3);
        }
    }
//工单详情
    public function orderDetail(){
        $d=json_decode(file_get_contents("php://input"),true);

        $sid=Db::name('staff')->where('account',$userid)->value('sessid');
        $sessid=$data['sessid'];
        if($sessid<>$sid){
            return json_encode(array(
                'retcode'=>'400',
                "retMsg"=>'不允许访问',
            ));
        }
        $account=$d['userid'];//获取用户名
        $orderid=$d['orderid'];//工单id
        $res=Db::name("bill")->where('id',$orderid)->select();
        $data=array(
            'retCode'=>'0000',
                     'orderid'=>$res['id'],
                     'trantp'=>$res['status'],
                     'street'=>$res['local'],
                     'community'=>'',
                     'address'=>'',
                     'clientna'=>$res['user_name'],
                     'telenm'=>$res['tellnum'],
                     'fault'=>$res['text'],
                     'tranti'=>$res['tranti'],
                     'charge'=>$res['money'],
                     'remark'=>$res['remark'],
        );
        return json_encode($data);
    }
//    工单处理
    public function orderDone(){
        $data=json_decode(file_get_contents("php://input"),true);

        $sid=Db::name('staff')->where('account',$userid)->value('sessid');
        $sessid=$data['sessid'];
        if($sessid<>$sid){
            return json_encode(array(
                'retcode'=>'400',
                "retMsg"=>'不允许访问',
            ));
        }
        $userid=$data["userid"];//用户账号
        $orderid=$data['orderid'];//工单id
        $trantp=$data['trantp'];//操作方式
        switch($trantp){
            case 0:$reason=$data['reason'];Db::name('bill')->where('id',$orderid)->update('reason',$reason)->update(['status'=>'0']);break;

            case 1:Db::name('bill')->where('id',$orderid)->update(['status'=>'1']);break;
            case 2:Db::name('bill')->where('id',$orderid)->update(['status'=>'2']);break;
        }
        return json_encode(array(
            'retCode'=>'0000',
        ));
    }
//    查询抢单
    public function grapOrder(){
        $da=json_decode(file_get_contents("php://input"),true);
        $userid=$da['userid'];

        $sid=Db::name('staff')->where('account',$userid)->value('sessid');
        $sessid=$data['sessid'];
        if($sessid<>$sid){
            return json_encode(array(
                'retcode'=>'400',
                "retMsg"=>'不允许访问',
            ));
        }
        $res=Db::name('bill')->where('hasorder',1)->select();//接口定义
        if($res==""){
            return json_encode(array(
                'hasorder'=>'0',//0:无新单  1：有新单
                $data=null,
            ));
        }else{
            $data=array(
                'orderid'=>$res['id'],
                'trantp'=>$res['status'],
                'street'=>$res['local'],
                'community'=>'',
                'address'=>'',
                'clientna'=>$res['user_name'],
                'telenm'=>$res['tellnum'],
                'fault'=>$res['text'],
                'tranti'=>$res['tranti'],
                'charge'=>$res['money'],
                'remark'=>$res['remark'],
            );
            return json_encode(array(
                'retCode'=>'0000',
                'hasorder'=>'0',//0:无新单  1：有新单
                'data'=>$data,
            ));
        }

    }

//    抢单
    public function grapAction(){
        $data=json_decode(file_get_contents("php://input"),true);
        $userid=$data['userid'];

        $sid=Db::name('staff')->where('account',$userid)->value('sessid');
        $sessid=$data['sessid'];
        if($sessid<>$sid){
            return json_encode(array(
                'retcode'=>'400',
                "retMsg"=>'不允许访问',
            ));
        }

        $tantp=Db::name('bill')->where('id',$userid)->value('status');
        if($tantp=="1"){
            return json_encode(array(
                'retCode'=>'400',
                'retMsg'=>'来晚啦，此单已被抢走',
            ));
        }else{
//            抢单处理未做
            return json_encode(array(
                'retCode'=>'0000',
                'tantp'=>'1',
                'retMsg'=>'抢单成功',
            ));
        }

    }
//评价列表
    public function commentlist(){
        $da=array();
        $data=json_decode(file_get_contents("php://input"),true);
        $userid=$data['userid'];

        $sid=Db::name('staff')->where('account',$userid)->value('sessid');
        $sessid=$data['sessid'];
        if($sessid<>$sid){
            return json_encode(array(
                'retcode'=>'400',
                "retMsg"=>'不允许访问',
            ));
        }
        $res=Db::name('com')->select();
        $res2=Db::name('users')->where('id',$userid)->select();
        $totrec=Db::name('com')->count();
        $avgscore=Db::name('com')->avg('score');

        //        dump($res);
        //        exit;
        foreach ($res as $re){

                $com=new com();
                $com->comtid=$re['id'];
                $com->score=$re['score'];//评分
                $com->tranti=$re['date'];//评价时间
                $com->userna=$re['name'];//评价人
                $com->imgpath=$re['imgpath'];//评价人头像
                $com->content=$re['com'];//评价内容
                $da[]=$com;

        }

        return json_encode(array(
            'retCode'=>'0000',
            'totrec'=>$totrec,
            'avgscore'=>$avgscore,
            'comtli'=>$da
        ));
       
    }
}