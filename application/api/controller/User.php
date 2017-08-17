<?php
namespace app\api\controller;
use think\Controller;
use think\Db;
use think\File;
use think\image;
use think\db\Query;
use think\Url;
use app\api\controller\Bill;
use app\index\model\Users;
use think\Validate;

class User extends Controller{
    public function index()
    {


//        $dd=['isread'=>'1'];
//        Db::name('msg')->where('id','>',0)->update($dd);

    }
//    测试
    public function test($id=1){
        $name= input('get.name');
//        $email= input('get.email');
        $user= Users::get(['name'=>$name]);
        if($user){
            return json(array(
                'status'=>1,
                'retcode'=>'0000',
                'data'=>$user,
            ));
        }
        else{
            return json(array(
                'status'=>-1,
                'retcode'=>'400',
                'data'=>'',
            ));        }
    }

     function ttt($length = 20 ){

            // 密码字符集，可任意添加你需要的字符
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';

            $password = '';
            for ( $i = 0; $i < $length; $i++ ) {
                // 这里提供两种字符获取方式
                // 第一种是使用 substr 截取$chars中的任意一位字符；
                // 第二种是取字符数组 $chars 的任意元素
                // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
                $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
            }

            return $password;

    }
//   登录
    public function userlogin(){
        $data=json_decode(file_get_contents("php://input"),true);
        $account=$data['userid'];//获取用户名
        $pwd= md5($data['passwd']);//获取用户密码
        $query=new \think\db\Query();
        $pass=$query->name('staff')->where('account',$account)->value('pwd');
        $sessid=$this->ttt();
        if($pwd==$pass){
            $user=Db::name('staff')->where('account',$account)->find();
            Db::name('staff')->where('account',$account)->insert(['sessid',$sessid]);
            return json(array(
                'retcode'=>'0000',
                'userid'=>$user['account'],
                'userna'=>$user['name'],
                'imgpath'=>$user['img_name'],
                'sessid'=>$sessid
            ));
        }
        else{
            return json(array(
                'retcode'=>'400',
                "retMsg"=>'账号和密码不一致，请检查',
                // 'data'=>'',
            ));
        }
    }

//查询个人资料
    public function userinfo(){
        
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
        $res=Db::name('staff')->where('account',$userid)->find();
//        dump($res);//调试用
        $group=Db::name('group')->where('id',$res['group_id'])->value('Gname');
        return json(array(
            'retCode'=>'0000',
            'userna'=>$res['name'],
            'imgpath'=>$res['img_name'],
            'group'=>$group,
            'telenm'=>$res['mobile'],
            'wechat'=>$res['wechat'],
            'email'=>$res['email'],
            'address'=>$res['scope']
        ));
    }
//修改个人资料
    public function modifyUser(){
        //   $userid=input('post.userid');
        // $img=Db::name('staff')->where('account',$userid)->value('img_name');
        //         echo $img;
        // exit;

        $userid=input('post.userid');
        $telenm=input('post.telenm');
        $wechat=input('post.wechat');
        $email=input('post.email');
        $address=input('post.address');
        $file = request()->file('file');
        if(!$file){
            $dd=['mobile'=>$telenm,'wechat'=>$wechat,'scope'=>$address,'email'=>$email];
            Db::name('staff')->where('account',$userid)->update($dd);
            return json_encode(array(
                'retCode'=>'0000',
                'retMsg'=>'修改成功',
            ));
        }else{
            $info = $file->move(ROOT_PATH . 'public/staffimg');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
//            echo $info->getExtension()."<br>";
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//            echo $info->getSaveName()."<br>";
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
//            echo $info->getFilename()."<br>";s
                $img=Db::name('staff')->where('account',$userid)->value('img_name');
                unlink(public_path.$img);
//                echo "<img src='".public_path."/".$img."'>";
//                echo "<img src='http://120.77.33.90".$img."'>";
//                echo "http://120.77.33.90/".$img;
                $imgpath='/staffimg/'."".$info->getSaveName();
                // echo $imgpath;
                // exit;
                $dd=['img_name'=>$imgpath,'mobile'=>$telenm,'wechat'=>$wechat,'scope'=>$address,'email'=>$email];
                Db::name('staff')->where('account',$userid)->update($dd);

                return json_encode(array(
                    'retCode'=>'0000',
                    'retMsg'=>'修改成功',
                    'imgpath'=>$imgpath
            ));
            }else{
                // 上传失败获取错误信息
                return json_encode(array(
                    'retCode'=>'400',
                    'retMsg'=>$file->getError()
                ));
            }
        }

    }

    public function modifyUserimg(){
        $file = request()->file('file');
        // 移动到框架应用根目录/public/staffimg/ 目录下
//        $info = $file->move(ROOT_PATH . 'public' . DS . 'staffimg');
        $info = $file->move(ROOT_PATH . 'public/staffimg');
        if($info){
            return json_encode(array(
                'retCode'=>'0000',
                'retMsg'=>'修改成功',
            ));
        }else{
            // 上传失败获取错误信息
            return json_encode(array(
                'retCode'=>'400',
                'retMsg'=>$file->getError()
            ));
        }
    }
//通知消息
    public function msgList(){
        //$userid  传输用户账号
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
        
        $res=Db::name('msg')->select();
        $da=array();
        foreach($res as $re){
            $msg=new msg();
            $msg->msgid=$re['id'];
            $msg->title=$re['title'];
            $msg->time=$re['time'];
            $msg->content=$re['content'];
            $da[]=$msg;
        }
        $count=Db::name('msg')->count();
        return json_encode(array(
            'retCode'=>'0000',
            'totrec'=>$count,
            'msgli'=>$da
        ));
    }
//发送位置
    public function location(){
        $data=json_decode(file_get_contents("php://input"),true);
        $userid=$data['userid'];//用户账号


        $sid=Db::name('staff')->where('account',$userid)->value('sessid');
        $sessid=$data['sessid'];
        if($sessid<>$sid){
            return json_encode(array(
                'retcode'=>'400',
                "retMsg"=>'不允许访问',
            ));
        }
        
        $longitude=$data['longitude'];//经度
        $latitude=$data['latitude'];//纬度
        $dd=['longitude'=>$longitude,'latitude'=>$latitude];
        Db::name('staff')->where('id',$userid)->update($dd);
        return json_encode(array(
            'retCode'=>'0000',
        ));
    }
//检测新消息
    public function newMsg(){
        $data=json_decode(file_get_contents("php://input"),true);
        $userid=$data['userid'];//用户账号;

        $sid=Db::name('staff')->where('account',$userid)->value('sessid');
        $sessid=$data['sessid'];
        if($sessid<>$sid){
            return json_encode(array(
                'retcode'=>'400',
                "retMsg"=>'不允许访问',
            ));
        }
        
        
        $count=Db::name('msg')->where('isread','')->count();
        $dd=['isread'=>'1'];
        Db::name('msg')->where('id','>',0)->update($dd);
        return json_encode(array(
            'retCode'=>'0000',
            'count'=>$count,
        ));
//        $dd=['isread'=>1];

    }
}
