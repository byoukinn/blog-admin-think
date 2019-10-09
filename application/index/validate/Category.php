<?php
/**
 * Created by PhpStorm.
 * User: BK
 * Date: 9/15/2019
 * Time: 4:13 PM
 */

namespace app\index\validate;


use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'cname' => 'require',
        'description' => 'require|max:150',
    ];
    protected $message = [
        'cname.require'      => '用户名必填',
        'description.require'      => '描述必填',
        'description.max'         => '描述不能超过150个字',
    ];
}