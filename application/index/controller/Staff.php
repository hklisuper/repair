<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\File;
use think\image;

use think\db\Query;
use think\Url;
use app\index\model\Users;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Comment;
use think\Validate;

/**
 * Description of staff
 *
 * @author 李响
 */
class Staff extends Controller {
    
    public function index(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
              $query=new \think\db\Query();
                  $list=$query->name('staff')->paginate(10);
                  $page = $list->render();
                  $this->assign('list',$list);
                 $this->assign('page', $page);
                 return $this->fetch();
      }
    }
     
    public function addstaff(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
            $res=Db::name('group')->select();
            $this->assign('res',$res);
//            dump($res);
//            exit;
                return $this->fetch();
      }
    }
//    添加员工
     public function add(){
//         做一个文件上传
         $name=input("post.name");
         $mobile=input("post.mobile");
         $status=input('post.status');
         $group=input("post.group");
         $gid=Db::name('group')->where('Gname',$group)->value('id');
         $regex="/^0{0,1}(13[0-9]|15[7-9]|153|156|18[7-9])[0-9]{8}$/";
         if(!preg_match($regex,$mobile)){
             return $this->error("手机号码有误");
         }else{

             $file = request()->file('imgf');
             if(!$file){
                 $data=['name'=>$name,'mobile'=>$mobile,'status'=>$status,'group_id'=>$gid,'img_name'=>''];
                 Db::name('staff')->insert($data);
                 return $this->success('添加成功！');
             }

             $info = $file->move(ROOT_PATH . 'public/staffimg');
             if($info){

                 $r='/staffimg/';
                 $imgpath=$info->getSaveName();
                 $imgpath=$r."".$imgpath;

//                 echo "<img src='".$imgpath."'>";
                 $data=['name'=>$name,'mobile'=>$mobile,'status'=>$status,'group_id'=>$gid,'img_name'=>$imgpath];
                 Db::name('staff')->insert($data);
                 return $this->success('添加成功！');
             }else{
                 // 上传失败获取错误信息
                 return $this->error($file->getError());
             }

         }
    }
    
        public function del(){
         $id=input('get.id');
         $query=new \think\db\Query();
         $query->name('staff')->where('id',$id)->delete();
         
        $this->success("删除成功");
    }
//    寻找员工
    public function search(){
        $name=input('get.name');
        $mobile=input('get.tell');
        $query=new \think\db\Query();
        $list=$query->name('staff')->where("name",$name)->where('mobile',$mobile)->find();
        if (!$list){
           echo "查无此人<a href=''>返回</a>";
            exit;
        }
        $g=$query->name("group")->where("id",$list["group_id"])->value("Gname");
        echo " <tr>
                                            <td>".$list['name']."</td>  
                                            <td>".$list['mobile']."</td>
                                            <td>".$list['status']."</td>
                                            <td>".$g."</td>
                                            <td>未做</td>
                                            <td>".$list['scope']."</td>
                                       <td><a href='del?id=".$list['id']."' class='btn btn-primary' style='float: right;'>删除</a><a href='edit?id=".$list['id']."' type='button' class='btn btn-primary'>编辑</a></td>
                                            ";
    }

    public function edit(){
        if (session('account')==null) {
            return $this->fetch('index/login');
        }else {
            $query=new \think\db\Query();
            $id=input('get.id');
            $query->name('staff')->where('id',$id);
            $gid=Db::name('staff')->where('id',$id)->value('group_id');
            //$gname=Db::name('group')->where('id',$gid)->value('Gname');
            $gname=Db::name('group')->select();
            $row=array();
            $row= Db::find($query);
                if($row<>null){
                $this->assign('row',$row);
                $this->assign('gname',$gname);
            }else{
                abort(404,'页面不存在');
            }
            return $this->fetch();
        }
    }
    
    public function alter(){
        $id=input('get.id');
        $name=input('get.name');
        $tell=input('get.tell');
        $group=input('get.group');
        $group_id=Db::name('group')->where('Gname',$group)->value("id");
        $scope=input('get.scope');
        $data = ['name' => $name,'mobile'=>$tell,'group_id'=>$group_id,'scope'=>$scope];
        $query=new \think\db\Query();
        $query->name('staff')->where('id',$id)->update($data);
//        Db::name('group')->update($data);
        $this->success('修改成功！');
    }
}
