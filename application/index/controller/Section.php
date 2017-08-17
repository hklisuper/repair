<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\db\Query;
use think\db\Paginate;
use think\Url;
use app\index\model\Group;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Comment;
use think\Validate;
use think\Request;
/**
 * Description of section
 *
 * @author 李响
 */
class Section extends Controller
{
    public function index()
    {
        if (session('account') == null) {
            return $this->fetch('index/login');
        } else {
            $query = new \think\db\Query();
            $list = $query->name('group')->paginate(10);
            $this->assign('list', $list);
            return $this->fetch();
        }
    }

    public function section()
    {
        if (session('account') == null) {
            return $this->fetch('index/login');
        } else {
            return $this->fetch();
        }
    }

    public function sendman()
    {
        if (session('account') == null) {
            return $this->fetch('index/login');
        } else {
            $page=1;
           
            $query = new \think\db\Query();
            $list = $query->name('sendman')->paginate(10, [
                'page' => $page,
            ]);
            $this->assign('list', $list);
            $page = $list->render();
            $this->assign('page', $page);
            return $this->fetch();
        }


    }

    
    public function addsection(){
       if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                return $this->fetch();
      }
    }
   //派单员页面 
        public function addsendman(){
            if (session('account')==null) {
                   return $this->fetch('index/login');
               }else{
                $res=Db::name('staff')->select();
                $this->assign('res',$res);
                     return $this->fetch();
           }
         }
//         编辑部门
          public function edit(){
            if (session('account')==null) {
                   return $this->fetch('index/login');
               }else{
                     $id=input('get.id');
                    $query=new \think\db\Query();
                    $query->name('group')->where('id',$id);
                    $row=array();
                    $row= Db::find($query);
                    if($row<>null){
                        $this->assign('row',$row);
                    }else{
                        abort(404,'页面不存在');
                    }
                    return $this->fetch();
           }
         }

//    添加部门
    public function add(){
        $gname=input('post.Gname');
        $remark= input('post.remark');
        $charge= input('post.charge');
        $date= date("Y/m/d");
        $group=new Group;
        $data = ['id' => '', 'Gname' => $gname,'Gleader'=>$charge,'remark'=>$remark,'date'=>$date];
        Db::name('group')->insert($data);  
        return $this->success('添加成功！');
    }
    
    //删除部门
    public function del(){
         $id=input('get.id');
         $query=new \think\db\Query();
         $query->name('group')->where('id',$id)->delete();
         
        $this->success("删除成功");
    }
//    更新部门
    public function update(){
        $gname=input('post.Gname');
        $remark= input('post.remark');
        $leader= input('post.leader');
        $id=input('post.id');
        $data = ['Gname' => $gname,'Gleader'=>$leader,'remark'=>$remark];
        $query=new \think\db\Query();
        $query->name('group')->where('id',$id)->update($data);
//        Db::name('group')->update($data);  
         $this->success('修改成功！');
    }
// 添加 派单员
    public function newman(){
         $name=input('post.name');
         $duty= input('post.duty');
         $scope= input('post.scope');
         $date= date("Y/m/d");
         $data = ['id' => '', 'name' => $name,'status'=>$duty,'scope'=>$scope,'date'=>$date];
         Db::name('sendman')->insert($data);  
         return $this->success('添加成功！');
    }
      //删派单员
    public function delsendman(){
         $id=input('get.id');
         $query=new \think\db\Query();
         $query->name('sendman')->where('id',$id)->delete();
         
        $this->success("删除成功");
    }
    
    //         编辑部门
          public function editman(){
            if (session('account')==null) {
                   return $this->fetch('index/login');
               }else{
                    $id=input('get.id');
                    $query=new \think\db\Query();
                    $query->name('sendman')->where('id',$id);
                    $row=array();
                    $row= Db::find($query);
                    if($row<>null){
                        $this->assign('row',$row);
                    }else{
                        abort(404,'页面不存在');
                    }
                    return $this->fetch();
           }
         }
         //    更新部门
    public function updateman(){
        $name=input('post.name');
        $status= input('post.duty');
        $id=input('post.id');
         $scope= input('post.scope');
         $data = ['id' => $id, 'name' => $name,'status'=>$status,'scope'=>$scope];
        Db::name('sendman')->update($data);  
         $this->success('修改成功！');
    }
//         上一页
    public function pre(){
        $page=input('get.page');

//        $query=new \think\db\Query();
//
//        $list = Db::name('sendman')->paginate(10,true,[
//            'page'=>$page,
//            'type' => 'bootstrap',
//            'var_page' => 'page',
//        ]);
//        $this->assign('list',$list);
////        $data=Db::name('sendman')->page('1,10')->select();
////        dump($data);
//        echo "<tr>
//                <td>".$data['name']."</td>
//                <td>".$data['status']."</td>
//                <td>".$data['scope']."</td>
//                <td>".$data['date']."</td>
//                <td><a href='{:url('index/section/delsendman')}?id=".$data['id']."' class='btn btn-primary'style='float: right;'>删除</a>
//                <a href='{:url('index/section/editman')}?id=".$data['id']."' type='button' class='btn btn-primary'>编辑</a></td>
//                </tr>
//                ";
        
    }

//    下一页
    public function next(){


//      if(input('get.page')<>null) {
          $page = input('get.page');
          $query = new \think\db\Query();
//          $list = $query->name('sendman')->paginate(10, [
//              'page' => $page,
//          ]);
//          $this->assign('list', $list);
        $data=$query->name('sendman')->page($page,'10')-select();
        dump($data);

//         $this->sendman();
//      }
//        $data=Db::name('sendman')->page('2,10')->select();
//        dump($data);
//        print_r($data);

//        echo "<tr>。
//                <td>".$data['name']."</td>
//                <td>".$data['status']."</td>
//                <td>".$data['scope']."</td>
//                <td>".$data['date']."</td>
//                <td><a href='{:url('index/section/delsendman')}?id=".$data['id']."' class='btn btn-primary'style='float: right;'>删除</a>
//                <a href='{:url('index/section/editman')}?id=".$data['id']."' type='button' class='btn btn-primary'>编辑</a></td>
//                </tr>";
    }
}



