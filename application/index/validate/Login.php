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
        'password' => 'require|passwordValidate'
    ];
    protected $message = [
        'username.require'    => '用户名必填',
        'password.require'     => '密码必填',
    ];
    protected function passwordValidate($value) {

    }
}