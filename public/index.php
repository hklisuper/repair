<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
error_reporting(0);
// 定义应用目录
define('public_path',__DIR__.'/../public');
define('APP_PATH', __DIR__ . '/../application/');
define('__ROOT__', '/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
