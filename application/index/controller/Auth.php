<?php
/**
 * Created by PhpStorm.
 * User: BK
 * Date: 9/15/2019
 * Time: 1:36 PM
 */

namespace app\index\controller;

use app\index\model\Author as mAuthor;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\facade\Request;

class Auth
{
    public function login() {
        $data = Request::param('data');
        $model = new mAuthor;
        $validate = new \app\index\validate\Login;
        if ($validate->check($data)) {
            try {
                $author = $model->where('username', $data['username'])->findOrFail();
                if ($author['password'] == $data['password']) {
                    $model->login();
                    return ['msg' => '登录成功', 'code' => 200];
                } else {
                    return ['msg' => '密码错误', 'code' => 10003];
                }
            } catch (DataNotFoundException $e) {
                return ['msg' => $e->getMessage(), 'code' => 10005];
            } catch (ModelNotFoundException $e) {
                return ['msg' => '该用户不存在', 'code' => 10004];
            } catch (DbException $e) {
                return ['msg' => '数据库出错 ' . $e->getMessage(), 'code' => 10006];
            }
        } else {
            return ['msg' => $validate->getError(), 'code' => 10001];
        }

    }

    protected function logout() {
        $author = new mAuthor;
        $author->logout();
    }
}