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
                    return success('登录成功');
                } else {
                    return error('密码错误');
                }
            } catch (DataNotFoundException $e) {
                return error($e->getMessage());
            } catch (ModelNotFoundException $e) {
                return error('该用户不存在');
            } catch (DbException $e) {
                return error('数据库出错 ' . $e->getMessage());
            }
        } else {
            return error($validate->getError());
        }

    }

    protected function logout() {
        $author = new mAuthor;
        $author->logout();
    }
}