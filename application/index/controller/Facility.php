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


/**
 * Description of Facility
 *
 * @author 李响
 */
class Facility extends Controller{
    public function index(){       
       if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                 $query=new \think\db\Query();
                  $list=$query->name('sendman')->paginate(10,true,[
                      'page'=>2,
                  ]);
//           dump($list);
           dump($list['id']);
                  $this->assign('list',$list);
                 return $this->fetch();
      } 
    }
    
    public function mag_eq(){
       if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
           $query=new \think\db\Query();
           $list=$query->name('product')->paginate(10);
//           dump($list['0']['id']);
           $page = $list->render();
           $this->assign('page', $page);
           $this->assign('list',$list);
           return $this->fetch();
      }
    
    }
    
    
    public function eq_group(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                $query=new \think\db\Query();
                  $list=$query->name('psort')->paginate(10);
                  $this->assign('list',$list);
                return $this->fetch();
      }
    }
    
    
     public function adfgroup(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
                return $this->fetch();
      }
    }
    

    
     public function addfacility(){
        if (session('account')==null) {
              return $this->fetch('index/login');
          }else{
//                $res=Db::name('users')->column('name');
                $res=Db::name('users')->select();
               $pres=Db::name('psort')->select();
                $count=Db::name('users')->count();
               $this->assign('res',$res);
              $this->assign('pres',$pres);
               $this->assign('count',$count);
                return $this->fetch();
      }
    }
    
    public function editpsort(){
        if (session('account')==null) {
            return $this->fetch('index/login');
        }else{
            $id=input('get.id');
            $name=Db::name('psort')->where('id',$id)->value('name');
            $text=Db::name('psort')->where('id',$id)->value('pdetail');
            $this->assign('name',$name);
            $this->assign('text',$text);
            return $this->fetch();
        }
    }
    
    public function add(){
        //写一个图片上传
        $name=input('post.pid');//产品类别
        $buyer=input('post.userinfo');//联系人姓名
//        $mobile=input('post.usermobile');
        $mobile=Db::name('users')->where('name',$buyer)->value('mobile');
        $buyer_add=Db::name('users')->where('name',$buyer)->value('address');
        $info=input('post.pinfo');
        $psort=input('post.psort');
//        echo $mobile;
        $p_local=input('post.p_local');
        $date=date('Y/m/d');
        Vendor('phpqrcode.qrlib');
        $qrcode = new \QRcode();
        $qrtools=new \QRtools();
//        ob_clean(); //这个很重要
//        $qrcode::png($value,false, $errorCorrectionLevel, $matrixPointSize, 2);
        $PNG_WEB_DIR = 'qrimg/';
        $PNG_TEMP_DIR=public_path."/qrimg/";
        $filename = $PNG_TEMP_DIR.'test.png';
        $errorCorrectionLevel = 'L';
        $matrixPointSize = 8;

            //it's very important!
//            if (trim($_REQUEST['data']) == '')
//                die('data cannot be empty! <a href="?">back</a>');
//            $dd="{:url('v/index')}?name=".$name."?detail=".$info;
           $dd="http://120.77.33.90/v/index?name=".$name."&detail=".$info;
//           $dd="http://www.baidu.com/";
//        $dd='';
//            echo $dd."<br>";

            // user data
            $filename = $PNG_TEMP_DIR.'test'.md5($dd.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
//            echo $filename."<br>";
            $qrcode::png($dd, $filename, $errorCorrectionLevel, $matrixPointSize, 2);


        echo '<img src="'.__ROOT__.$PNG_WEB_DIR.basename($filename).'" /><hr/>';
        $imgname=__ROOT__.$PNG_WEB_DIR.basename($filename);

//        echo $PNG_WEB_DIR.basename($filename);
        //config form
//        echo \'<form action="index2" method="post">
//        Data:&nbsp;<input name="data" value="\'.(isset($_REQUEST[\'data\'])?htmlspecialchars($_REQUEST[\'data\']):\'PHP QR Code :)\').\'" />
//        <input name="name" value="\'.(isset($_REQUEST[\'name\'])?htmlspecialchars($_REQUEST[\'name\']):\'PHP QR Code :)\').\'" />
//        &nbsp;

//        ';


//        echo '
//        <input type="submit" value="GENERATE"></form><hr/>';

        $qrtools::timeBenchmark();
        $data = ['id' => '', 'name'=>$name,'pinfo' => $info,'buyer_mob'=>$mobile,'buyer'=>$buyer,'p_local'=>$p_local,'pro_sort'=>$psort,'ctime'=>$date,'buyer_add'=>$buyer_add,'img_name'=>$imgname];
        Db::name('product')->insert($data);

        return $this->success('添加成功！');
//        $query=new \think\db\Query();
//        $info=$query->name('product')->
    }
    
    //    添加部门
    public function addg(){
        $gname=input('post.name');
        $charge= input('post.detail');
        $date= date("Y/m/d");
      
        $data = ['id' => '', 'name' => $gname,'pdetail'=>$charge,'date'=>$date];
        Db::name('psort')->insert($data);  
        return $this->success('添加成功！');
    }
//    寻找
    public function search(){
        $proname=input('get.proname');
        $username=input('get.username');
        $usermobile=input('get.usermobile');
        $query=new \think\db\Query();
//        echo $proname;
//        exit;
//        $list=Db::name('product')->where('pro_type',$proname)->find();
        $list=$query->name('product')->where("buyer",$username)/*->where('pro_type',$proname)->where('utell',$usermobile)*/->find();
//        $u=Db::name('users')->where('name',$list["username"])->find();
        if (!$list){
            echo "查无此人<a href=''>返回</a>";
            exit;
        }
        echo "<tr>
                <td>".$list['name']."</td>
                <td>".$list['buyer']."</td>
                <td>".$list['utell']."</td>
                <td>".$list['buyer_add']."</td>
                <td>".$list['img_name']."</td>
                <td>".$list['pro_sort']."</td>
                <td>".$list['re_date']."</td>
                 <td><a href='del?id=".$list['id'].".'class='btn btn-primary'style='float: right;'>删除</a><a href='edit?id=".$list['id']."' type='button' class='btn btn-primary'>编辑</a></td>
            </tr>";
    }
//删除产品
    public function del(){
        $id=input('get.id');
        $query=new \think\db\Query();
        $query->name('product')->where('id',$id)->delete();
        $this->success("删除成功");
    }
//         编辑产品
    public function edit(){
        if (session('account')==null) {
            return $this->fetch('index/login');
        }else{
            $id=input('get.id');
            $query=new \think\db\Query();
            $query->name('product')->where('id',$id);
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
}
