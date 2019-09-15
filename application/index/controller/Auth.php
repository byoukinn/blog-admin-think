<?php
/**
 * Created by PhpStorm.
 * User: BK
 * Date: 9/15/2019
 * Time: 1:36 PM
 */

namespace app\index\controller;

use app\index\model\Comment as mAuthor;
use think\Controller;
use think\facade\Request;

class Auth extends Controller
{
    protected function login() {
        $data = json_decode(Request::param('data'), true);
        $author = new mAuthor;
        $validate = new \app\index\validate\Login;
        if (!$validate->check($data)) {
            $author->login();
        } else {
            return ['result' => $validate->getError()];
        }
    }

    protected function logout() {
        $author = new mAuthor;
        $author->logout();
    }
}