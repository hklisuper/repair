<?php
/**
 * Created by PhpStorm.
 * User: 李响
 * Date: 2017/4/27
 * Time: 21:54
 */

namespace app\index\controller;


class Qrcode {
    public function view()
{
    $id=input('get.id');
    echo $id;
    exit;
    //生成当前的二维码
    $qrCode = new \Endroid\QrCode\QrCode();
   // $id=input('get.id');
    $id="行超能查您给戳你";
    if($id) {
        //想显示在二维码中的文字内容，这里设置了一个查看文章的地址
//        $url = url('http://www.baidu.com/s?wd='.$id,'',true,true);
        $url="http://www.baidu.com/s?wd=".$id;
        $qrCode->setText($url)
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('thinkphp.cn')
            ->setLabelFontSize(16)
            ->setImageType(\Endroid\QrCode\QrCode::IMAGE_TYPE_PNG);
        $qrCode->render();
        header('Content-Type: '.$qrCode->getContentType(PngWriter::class));
        $qrCode->writeString(PngWriter::class);
        echo 134;
    }
}

}