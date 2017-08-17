<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\db\Query;
use think\Url;
use app\index\model\Users;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Comment;
use think\Validate;
class User extends Controller
{
    public function index(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else {
                  $query=new \think\db\Query();
                  $list=$query->name('users')->paginate(10);
                  $page=$list->render();
                  $this->assign('list',$list);
                  $this->assign('page',$page);
                  return $this->fetch();
              }
      }
    
    public function newuser(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                return $this->fetch();
      }
    }

    public function comment(){
        if (session('account')==null) {
            return $this->fetch('index/login');
        }else{
            $res=Db::name('users')->select();
           $this->assign('res',$res);
            return $this->fetch();
        }
    }
    //添加客户
    public function adduser(){
        $name=input('post.name');
        $tellnum= input('post.tellnum');
        $address= input('post.address');
        $daddr=input('post.daddr');
        $date=date("y/m/d");
        $data = ['id' => '', 'name' => $name,'mobile'=>$tellnum,'address'=>$address,'date'=>$date,'daddr'=>$daddr];
//        $dd=['utell'=>$tellnum,'buyer_add'=>$address_detail,'buyer',$name];
//        Db::name('product')->insert($dd);
        Db::name('users')->insert($data);
        return $this->success('添加成功！');
    }
       //         编辑客户
          public function edit(){
            if (session('account')==null) {
                   return $this->fetch('index/login');
               }else{
                    $id=input('get.id');
                    $query=new \think\db\Query();
                    $query->name('users')->where('id',$id);
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
    
  //    更新用户
    public function update(){
        $name=input('post.name');
        $account= input('post.account');
        $mobile= input('post.mobile');
        $address= input('post.address');
        $id=input('post.id');
        $data = ['name' => $name,'mobile'=>$mobile,'account'=>$account,'address'=>$address];
        $query=new \think\db\Query();
        $query->name('users')->where('id',$id)->update($data);
//        Db::name('group')->update($data);  
         $this->success('修改成功！');
    }
    //修改密码
    public function alert(){
        echo "你好";
    }
    
  //删除用户
    public function del(){
         $id=input('get.id');
         $query=new \think\db\Query();
         $query->name('users')->where('id',$id)->delete();
        $this->success("删除成功");
    }   
//    搜索
    public function search(){
        $name=input('get.name');
        $mobile=input('get.mobile');
        $address=input("get.address");
        $query=new \think\db\Query();
        if($address==""){
            $list=$query->name('users')->where("name",$name)->where('mobile',$mobile)->find();
        }else{
            $list=$query->name('users')->where("name",$name)->where('mobile',$mobile)->where('address',$address)->find();
        }

        if (!$list){
            echo "查无此人<a href=''>返回</a>";
            exit;
        }
        echo " <tr>
                                            <td>".$list['account']."</td>   
                                            <td>".$list['name']."</td>
                                            <td>".$list['mobile']."</td>
                                            <td>".$list['address']."</td>
                                            <td>".$list['date']."</td>
                                        <td><a href='del?id=".$list['id']."' class='btn btn-primary' style='float: right;'>删除</a><a href='edit?id=".$list['id']."' type='button' class='btn btn-primary'>编辑</a></td>
                                            ";
    }
//评价查找
    public function ajaxcont(){
        $title=input('get.title');
        $name=input('get.name');
        $id=Db::name('bill')->where('title',$title)->value('id');
        $res=Db::name('bill')->where('title',$title)->find();
//        if($name==null){
//            $res=Db::name('bill')->where('title',$title)->select();
//        }else{
//            $res=Db::name('bill')->where('title',$title)->where('staff_name')->select();
//        }

        return "<p>接单员工：".$res['staff_name']."</p>
                <p>维修产品型号：".$res['ftype']."</p>
                <p>维修产品类别：".$res['fsort']."</p>
                <input type='hidden' name='id' value='".$id."'>
            ";
    }

    public function ajaxid(){
        $title=input('get.title');
        $id=Db::name('bill')->where('title',$title)->value('id');
        return $id;
    }
//处理评价
    public function solovecont(){
        $score=input('post.score');
        $cont=input('post.cont');
        $id=input('post.id');
        $bi=Db::name('bill')->where('id',$id)->value('user_info');

        $date=date("Y/m/d");
        $name=input('post.user');
        if($name=='admin'){
            $img='ventor.png';
        }else{
            $img=Db::name('users')->where('name',$bi)->value('imgpath');
        }


        $data=['date'=>$date,'bill_id'=>'','com'=>$cont,'score'=>$score,'name'=>$name,'imgpath'=>$img];
        Db::name('com')->insert($data);
        return $this->success('评价成功');
    }

    public function test19()
    {
       //$user = Users::get(1);
        // 获取User对象的nickname属性
        //echo $user->nickname."<br/>";
        // 获取User对象的comm关联对象
//         $user->comm;       
//       foreach($user->comm as $comm)
//           echo "评论id: {$comm->comment_id} 用户评论内容: {$comm->content}<br/>"; 
        // 执行关联的comm对象的查询  获取User对象的comm关联对象
//        $comm = $user->comm()->where('content','这东西不错,下次还会来买')->find();
//        echo "评论id: {$comm->comment_id} 用户评论内容: {$comm->content}<br/>";         
                
//            // 一对多关联新增
//            $user = Users::get(1);
//            $comment = new Comment;
//            $comment->content  = 'ThinkPHP5视频教程';
//            $comment->add_time = time();
//            $user->comm()->save($comment);
//            return '添加评论成功';        
//            
            // 一对多批量新增
//            $user  = Users::get(1);
//            $comment = [
//                ['content' => 'ThinkPHP5视频教程', 'add_time' =>time()],
//                ['content' => 'TP5视频教程', 'add_time' => time()],
//            ];
//            $user->comm()->saveAll($comment);
//            return '添加comm成功';     
            
            // 关联查询
               // $user  = Users::get(1); // Users::get(1,'comm');
                //$comm = $user->comm;
                //dump($comm);        
        
//            // 关联过滤查询
//            $user  = Users::get(1);
//            // 获取状态为1的关联数据
//            $comment = $user->comm()->where('is_show',1)->select();              
//            //dump($comment);
//        foreach($comment as $comm)
//            echo "评论id: {$comm->comment_id} 用户评论内容: {$comm->content}<br/>";             
            
//            $comm  = $user->comm()->getByContent('这东西不错,11111');
//            echo "评论id: {$comm->comment_id} 用户评论内容: {$comm->content}<br/>";             
        
           //  根据关联数据来查询当前模型数据
           //  查询有评论过的用户列表
//            $user = Users::has('comm')->select();
//            // 查询评论过2次以上的用户
//            $user = Users::has('comm', '>=', 2)->select();
//            // 查询评论内容含有 ThinkPHP5快速入门的用户
//            $user = Users::hasWhere('comm', ['content' => 'ThinkPHP5视频教程'])->select();            
     
            // 关联更新 
//            $user = Users::get(1);
//            $comm = $user->comm()->getByContent('ThinkPHP5视频教程');
//            $comm->content = 'ThinkPHP5快速入门';
//            $comm->save();            
//            
              //查询构建器的update方法进行更新
//                $user = Users::get(1);
//                $user->comm()->where('content', 'ThinkPHP5快速入门')->update(['content' => 'ThinkPHP5开发手册222']);            
            
             // 删除部分关联数据
//                $user = Users::get(1);
//                // 删除部分关联数据
//                $comm = $user->comm()->getByContent('ThinkPHP5开发手册222');
//                $comm->delete();   
            
//            //删除所有的关联数据：
//            $user = Users::get(1);             
//            // 删除所有的关联数据
//            $user->comm()->delete();           
            

        // 轿车  一对一案例
//         $user = Users::get(1);
//        echo "车品牌: ". $user->car->brand. " 车牌号:".$user->car->plate_number ."<br/>";
       
//        // 新增用户 关联 汽车
//        $user = new Users;
//        $user->email = 'hello@1243.com';
//        $user->nickname = 'TPshop';
//        $user->password = '123456789';
//        if($user->save()){
//            $car['brand'] = '奔驰';
//            $car['plate_number'] = '粤A12345678';
//            //uid 不指定
//            $user->car()->save($car); // Relation对象  添加一部车
//            return '用户[ ' . $user->nickname . ' ]新增成功';
//        } else {
//            return $user->getError();
//        }   
        
        // 关联查询 
//            $user = Users::get(2601,'car'); // $user = Users::get(2600,'car');
//            echo $user->email . '<br/>';
//            echo $user->nickname . '<br/>';
//            echo $user->car->brand . '<br/>';
//            echo $user->car->plate_number . '<br/>';        
//         // 关联更新
//            $user = Users::get(2601);
//            $user->email = 'TPshop@qq.com';
//            if ($user->save()) {
//                // 更新关联数据
//                $user->car->plate_number = '粤C123466';
//                $user->car->save();
//                return '用户[ ' . $user->email . ' ]更新成功';
//            } else {
//                return $user->getError();
//            }        
        // 关联删除
//        $user = Users::get(2601);
//        if ($user->delete()) {
//            // 删除关联数据
//            $user->car->delete();
//            return '用户[ ' . $user->email . ' ]删除成功';
//        } else {
//            return $user->getError();
//        }              
            
    }

//   // 创建用户数据页面
//    public function create()
//    {
//        //return view();
//        return view("user/create");
//    } 
//    
//    // 新增用户数据
//    public function add()
//    {
//        // 自动收集表单数据 input('post.') 
//        // 自动排除不相关字段
//        // 自动校验非法字段
//        // 自动生成 insert 语句 执行入库        
//        $users = new Users;
//        if ($users->allowField(true)->validate(true)->save(input('post.'))) {
//            return '用户[ ' . $users->nickname . ':' . $users->user_id . ' ]新增成功';
//        } else {
//            return $users->getError();
//        }
//    }
     // 控制器验证
//    public function add()
//    {
//        $data = input('post.');
//        // 数据验证
//        $result = $this->validate($data,'Users');
//        if (true !== $result) {
//            return $result;
//        }
//        $users = new Users;
//        // 数据保存
//        $users->allowField(true)->save($data);
//        return '用户[ ' . $users->nickname . ':' . $users->user_id . ' ]新增成功';
//    }    
      //  单独验证 某 字段
//    public function add()
//    {
//        $data  = input('post.');
//        // 验证birthday是否有效的日期
//        $check = Validate::is($data['birthday'],'date');
//        if (false === $check) {
//            return 'birthday日期格式非法';
//        }
//        $users = new Users;
//        // 数据保存
//        $users->allowField(true)->save($data);
//        return '用户[ ' . $users->nickname . ':' . $users->user_id . ' ]新增成功';
//    }        
}
