<?php

namespace app\index\controller;

use app\index\model\Author as mAuthor;
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
            $res = mAuthor::limit(($page - 1) * $rowSize, $rowSize)->select();
            return success('成功', $res);

        } catch (DataNotFoundException $e) {
        } catch (ModelNotFoundException $e) {
        } catch (DbException $e) {
        }
        return error('列表失败');

    }

    public function create()
    {
    }

    public function delete($id)
    {
        $result = mAuthor::destroy($id);
        return success($result ? '删除成功' : '删除失败');
    }

    public function update($id)
    {

        // 修改
        try {
            $result = mAuthor::where(['id' => $id])->update(input('data'));
        } catch (PDOException $e) {
        } catch (Exception $e) {
        }
        return success($result ? '更新成功' : '更新失败');
    }

    public function save()
    {
//        post 请求，'/author'
        $data = Request::param('data');
        $author = new mAuthor;
        // 验证表单
        $validate = new \app\index\validate\Register;
        if ($validate->check($data)) {
            try {
                $result = $author->data($data)->save();
                return success($result ? '注册成功' : '注册失败');
            } catch (PDOException $e) {
                return error('用户名已注册');
            }
        } else {
            return error($validate->getError());
        }
    }

    public function read()
    {
    }

    public function edit()
    {
    }

    /**
     * 前端检查是否存在的用户名
     */
    public function checkName()
    {
        try {
            mAuthor::where("username", input('data')['username'])->findOrFail();
        } catch (DataNotFoundException $e) {
            return success($e->getMessage());
        } catch (ModelNotFoundException $e) {
            return success('该用户名可以注册');
        } catch (DbException $e) {
            return success($e->getMessage());
        }
        return error('该用户名已被存在');
    }
}
