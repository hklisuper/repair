<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\db\Query;
use think\Url;
use think\File;
use think\image;
use app\index\model\Users;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Comment;
use think\Validate;


/**
 * Description of Facility
 *
 * @author 李响
 */
class Setbill extends Controller{
    public function index(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
            $count=Db::name("product")->count();
                  $this->assign("count",$count);
                  $query=new \think\db\Query();
//                  $list=$query->name('bill')->paginate(10);
                    $list=Db::name('bill')->paginate(10);
                    $page=$list->render();
                    $this->assign('page',$page);
                    $this->assign('list',$list);

                 return $this->fetch();
                            
      }
    }
    
    public function newbill(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                return $this->fetch();
      }
    }
    
    public function grabbill(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                $list=Db::name('product')->paginate(10);
                $page=$list->render();
                $this->assign('page',$page);
                $this->assign('list',$list);
                return $this->fetch();
      }
    }
    public function newgrabbill(){
        
    }
//结算
    public function account(){
        if (session('account')==null) {
            return $this->fetch('index/login');
        }else{
            return $this->fetch();
        }
    }
//    结算,暂时不用
    public function clear(){
       if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                return $this->fetch();
      }
    }
    
    public function test(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                return $this->fetch();
      }
    }

    public function show(){
        if (session('account')==null) {
            return $this->fetch('index/login');
        }else{
            $list=Db::name('product')->paginate(10);
            $page=$list->render();
            $this->assign('page',$page);
            $this->assign('list',$list);
            $list2=Db::name('staff')->paginate(10);
            $page2=$list2->render();
            $this->assign('page2',$page2);
            $this->assign('list2',$list2);
            return $this->fetch();
        }
    }
//    处理show的表单
    public function cload1()
    {
        $title=input('post.title');
        $text=input('post.text');
        $username=input('post.username');
        $usertell=input('post.usertell');
        $serverlocal=input('post.serverlocal');
        $linkfacility=input('post.linkfacility');
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public/billimg');
        $imgpath='/billimg/'."".$info->getSaveName();
        $dd=['title'=>$title,'ramark'=>$text,'img_name'=>$imgpath,'user_name'=>$username,'tellnum'=>$usertell,'local'=>$serverlocal,'ftype'=>$linkfacility,'status'=>'1'];
//        Db::name("bill")->insert($dd);
        $da=["title"=>"卡卡卡"];
        Db::name("bill")->insert($da);
        $billid=Db::name("bill")->getLastInsID();
        return $billid;
    }

    public function cload2()
    {
        $id=input("get.billid");
        $staff=input("get.cstaff");
        $dd=['staff_done'=>$staff];
        Db::name("bill")->where('id',$id)->update($dd);
    }

    public function cload3()
    {
        $id=input('get.billid');
        $comgrad=input('get.comgrade');
        $comtext=input('get.comtext');
        $dd=['remark'=>$comgrad,'$comtext'=>$comtext];
        Db::name("bill")->where('id',$id)->update($dd);

    }

    public function cload4()
    {
        $id=input('get.billid');
        $price=input('get.price');
        $dd=['money'=>$price];
        Db::name("bill")->where('id',$id)->update($dd);
    }
//    删除派单
    public function del(){
         $id=input('get.id');
         $query=new \think\db\Query();
         $query->name('bill')->where('id',$id)->delete();
         $this->success("删除成功");
    }
    
//    寻找单
     public function search(){
         $title=input('get.tab');
         $localadd=input('get.localadd');
         $mobile=input('get.mobile');
         $sort=input('get.sort');
         $status=input('get.status');
         $query=new \think\db\Query();
         $list=$query->name('bill')->where('title',$title)->where('tellnum',$mobile)->where('local',$localadd)->find();
         if($list==null){
             return null;
         }
         $this->assign('list',$list);
         echo "<tr>
                <td>".$list['title']."</td>
                <td>".$list['buyer']."</td>
                <td>".$list['tellnum']."</td>
                <td>".$list['local']."</td>
                <td>".$list['date']."</td>
                <td>".$list['staff_name']."</td>
                <td>".$list['staff_done']."</td>
                 <td>".$list['status']."</td>
                 <td><a href='del?id=".$list['id'].".'class='btn btn-primary'style='float: right;'>删除</a><a href='edit?id=".$list['id']."' type='button' class='btn btn-primary'>编辑</a></td>
            </tr>";
//        // return "1324";
     }

    public function accfind(){
        $staff=input('get.staff');
        if(Db::name("bill")->where('staff_done',$staff)->count()==1){
            $list=Db::name("bill")->where('staff_done',$staff)->find();
            $this->assign('list',$list);
            if($list['money']==null){
                $t="<form action='accfind2'><input type='hidden' name='id' value='".$list['id']."'><input type='text' name='spend'><button onclick='done()'>结算</button></form>";
            }else{
                $t=$list['money'];
            }
//        <td>".$list['money']."</td>
            return "<tr>
                    <td>".$list['title']."</td>
                    <td>".$list['date']."</td>
                    <td>".$t."</td>
                </tr>";
        }else{
            $list=Db::name("bill")->where('staff_done',$staff)->select();
            $count=Db::name("bill")->where('staff_done',$staff)->count();
            $arr=array();
            for($i=0;$i<$count;$i++){
                if($list[$i]['money']==null){
                    $t="<form action='accfind2'><input type='hidden' name='id' value='".$list[$i]['id']."'><input type='text' name='spend'><button onclick='done()'>结算</button></form>";
                }else{
                    $t=$list[$i]['money'];
                }
//        <td>".$list['money']."</td>
                $temp= "<tr>
                    <td>".$list[$i]['title']."</td>
                    <td>".$list[$i]['date']."</td>
                    <td>".$t."</td>
                </tr>";
                array_push($arr,$temp);
            }
        }
//        dump($arr);
        for($i=0;$i<$count;$i++){
            echo $arr[$i];
        }


    }
    
    public function accfind2(){
        $spend=input('get.spend');
        $id=input('get.id');
        $data=['money'=>$spend];
        Db::name('bill')->where('id',$id)->update($data);
        return $this->success('成功');
    }
//    抢单员工
    public function grapbill2(){
        return $this->fetch();
}
//    指派员工
    public function grapbill3(){
        return $this->fetch();
    }

//    评价售后
    public function grapbill4(){
        return $this->fetch();
    }

//结算和打印
    public function grapbill5(){
        return $this->fetch();
    }
    
    public function add1(){

        
    }

    public function add2(){
        echo 2;
    }

    public function add3(){
        echo 3;
    }

    public function add4(){
        $list=Db::name("bill")->where('staff_done','1111')->select();

        var_dump($list);
        print_r($list);
        $this->assign('list',$list);
        return $list['0']['title'];
    }
//    新建抢单处理
    public function addgrap(){
        $title=input("post.title");
        $text=input('post.text');
        $username=input('post.username');
        $usertell=input('post.usertell');
        $serverlocal=input('post.servelocal');
        $facility=input('post.facility');
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public/billimg');
        $imgpath='/billimg/'."".$info->getSaveName();
//
        $dd=['title'=>$title,'text'=>$text,'img_name'=>$imgpath,'user_name'=>$username,'tellnum'=>$usertell,'local'=>$serverlocal,'ftype'=>$facility,'pass'=>'1'];
        Db::name("bill")->insert($dd);
        return $this->success("添加成功");
    }
//指派员工
    public function addgrap2(){
        $this->fetch("grabill3");
    }
//    评价售后
    public function addgrap4(){
        $this->fetch("grabill5");
    }
//编辑页面
    public function edit(){
        $id=input('get.id');
        $query=new \think\db\Query();
        $row=$query->name('bill')->where('id',$id)->find();
        if($row<>null){
            $this->assign('row',$row);
        }else{
            abort(404,'页面不存在');
        }
        return $this->fetch();
    }

    // 单通过
        public function pass(){
            $id=input("get.id");
             $dd=['pass'=>'1'];
            Db::name("bill")->where('id',$id)->update($dd);
            return $this->success("单通过");
        }

         // 单不通过
        public function nopass(){
            $id=input("get.id");
             $dd=['pass'=>'0'];
            Db::name("bill")->where('id',$id)->update($dd);
            return $this->error("单不通过");
        }
//    编辑单
        public function update(){
            $title=input('post.title');
            $fsort= input('post.sort');
            $ftype= input('post.ftype');
            $staff_done= input('post.staff_done');
            $username= input('post.username');
            $staff_name= input('post.staff_name');
            $local=input('post.addr');
            $id=input('post.id');
            $data = ['title' => $title,'fsort'=>$fsort,'ftype'=>$ftype,'staff_done'=>$staff_done,'user_name'=>$username,'staff_name'=>$staff_name,'local'=>$local];
            $query=new \think\db\Query();
            $query->name('bill')->where('id',$id)->update($data);
//        Db::name('group')->update($data);  
            $this->success('修改成功！');
        }





}


