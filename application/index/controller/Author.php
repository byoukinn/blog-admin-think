<?php

namespace app\index\controller;

use app\index\model\Comment as mAuthor;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\exception\PDOException;
use think\facade\Request;

class Author
{
    public function index($page = 1, $rowSize = 20)
    {
        try {
            return mAuthor::limit(($page - 1) * $rowSize, $rowSize)->select();
        } catch (DataNotFoundException $e) {
        } catch (ModelNotFoundException $e) {
        } catch (DbException $e) {
        }
    }

    public function create()
    {
    }

    public function delete($id)
    {
        $result =  mAuthor::destroy($id);
        return  ['msg' => $result ? '删除成功' : '删除失败'];
    }

    public function update($id)
    {
        // 修改
        try {
            $result = mAuthor::where(['id'=> r])->update();
        } catch (PDOException $e) {
        } catch (Exception $e) {
        }
        return  ['msg' => $result ? '更新成功' : '更新失败'];
    }

    public function save()
    {
//        post 请求，'/author'
        $req = Request::param('data');
        $data = json_decode($req, true);
        $author = new mAuthor;
        // 验证表单
        $validate = new \app\index\validate\Register;
        if ($validate->check($data)) {
            try {
                $result = $author->data($data)->save();
                return ['msg' => $result ? '注册成功' : '注册失败'];
            } catch (PDOException $e) {
                return ['msg' => '用户名已注册'];
            }
        } else {
            return ['msg' => $validate->getError()];
        }
    }

    public function read()
    {
    }

    public function edit()
    {
    }

}
