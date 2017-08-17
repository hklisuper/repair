<?php
namespace app\index\model;
use think\Model;
class Region extends Model  // 全国地区表
{
//    // 地区模型
    public function shippingArea()
    {
        // 地区表 BELONGS_TO_MANY 配送区域  region_id
        return $this->belongsToMany('ShippingArea', 'tp_area_region','shipping_area_id','region_id');
    }    
}