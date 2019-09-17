<?php
/**
 * Created by PhpStorm.
 * User: BK
 * Date: 9/15/2019
 * Time: 3:59 PM
 */

namespace app\index\validate;


use think\Validate;

class Login extends Validate
{
    protected $rule = [
        'username' => 'require',
        'password' => 'require|passwordValidate:[\w\d]{8,16}'
    ];
    protected $message = [
        'username.require'    => '用户名必填',
        'password.require'     => '密码必填',
        'password.expr'         => '密码格式错误，要求英文数字组合8-16字符',

    ];
    protected function passwordValidate($value, $rule) {
        return $this->regex($value, $rule) ? true : '密码格式错误，要求英文数字下横线组合8-16字符';
    }
}