<?php
namespace app\v\controller;
use think\Controller;
use app\index\controller\Session ;
use think\Db;
use think\Url;

class Index extends Controller
{
    public function index()
    {
        $name=input('get.name');
        $detail=input('get.detail');
        session('name',$name);
        session('detail',$detail);
        $this->assign('name', $name);
        $this->assign('detail', $detail);
        return $this->fetch();
    }

    public function order(){
        $uname=input('get.uname');
        session('vname',$uname);
        $this->assign('uname',$uname);
        $mobile=input('get.umobile');
        $this->assign('mobile',$mobile);
        if(session('vname')==null){
            return $this->fetch('v_login');
        }else{
            $name=session('name');
            $detail=session('detail');

            $this->assign('name', $name);
            $this->assign('detail', $detail);
            return $this->fetch();
        }
            return $this->fetch('v_login');

    }
//    登录界面
    public function v_login(){
        return $this->fetch();
    }

    public function getbill()
    {
        $title=input('post.title');
        $detail=input('post.detail');
        $uname=input('post.uname');
        $name=input('post.name');
        $addr=input('post.addr');
        $tell=input('post.tell');
        $pname=input('post.pname');
        $dd=['title'=>$title,'tellnum'=>$tell,'text'=>$detail,'user_name'=>$uname,'ftype'=>$pname,'local'=>$addr];
        Db::name('bill')->insert($dd);
        echo "<script>alert('下单成功');</script>";
        $this->redirect('index');
    }

    public function login_sol(){
        $uname=input('get.uname');
        session('name',$uname);
        $mobile=input('get.umobile');
        $this->assign('mobile',$mobile);
        if(session('name')==null){
            return $this->fetch('v_login');
        }else{
            $name=session('name');
            $detail=session('detail');

            $this->assign('name', $name);
            $this->assign('detail', $detail);
            return $this->fetch();
        }
    }
//    维修详情
    public function o_del(){
        return $this->fetch();
    }

//报修订单
    public function submit_order(){
        $pname=input('post.pname');
        $rename=input('post.rename');
        $title=input('post.title');
        $detail=input('post.detail');
        $name=input('post.name');
        $mobile=input('post.tell');
        $addr=input('post.addr');

        $data=[];
        Db::name('bill')->insert();
    }
}