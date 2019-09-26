<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function _response($msg, $data, $code)
{
    $body = ['code' => $code, 'msg' => $msg];
    if (!empty($data)) {
        $body['data'] = $data;
    }
    return $body;
}
function success($msg, $data = [], $code = 200)
{
    return _response($msg, $data, $code);
}

function error($msg, $data = [], $code = 10000)
{
    return _response($msg, $data, $code);
}


