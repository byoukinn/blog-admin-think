<?php

namespace app\index\controller;

use app\index\model\Comment as mComment;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\exception\PDOException;
use think\facade\Request;

class Comment
{
    public function index($page = 1, $rowSize = 20)
    {
        try {
            $res = mComment::limit(($page - 1) * $rowSize, $rowSize)->select();
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
        $result = mComment::destroy($id);
        return success($result ? '删除成功' : '删除失败');
    }

    public function update($id)
    {
        // 修改
        try {
            $result = mComment::where(['id' => $id])->update();
        } catch (PDOException $e) {
        } catch (Exception $e) {
        }
        return success($result ? '更新成功' : '更新失败');
    }

    public function save()
    {
//        post 请求，'/author'
        $data = Request::param('data');
        $author = new mComment;
        // 验证表单
        $validate = new \app\index\validate\Register;
        if ($validate->check($data)) {
            try {
                $result = $author->data($data)->save();
                return success($result ? '评论成功' : '评论失败');
            } catch (PDOException $e) {
                return error('该分类已被评论过');
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

}
