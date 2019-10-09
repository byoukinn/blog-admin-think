<?php

namespace app\index\controller;

use app\index\model\Category as mCategory;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\exception\PDOException;
use think\facade\Request;

class Category
{
    public function index($page = 1, $rowSize = 20)
    {
        try {
            $res = mCategory::limit(($page - 1) * $rowSize, $rowSize)->select();
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
        $result = mCategory::destroy($id);
        return success($result ? '删除成功' : '删除失败');
    }

    public function update($id)
    {
        // 修改
        try {
            $result = mCategory::where(['id' => $id])->update(input('data'));
        } catch (PDOException $e) {
        } catch (Exception $e) {
        }
        return success($result ? '更新成功' : '更新失败');
    }

    public function save()
    {
//        post 请求，'/author'
        $data = Request::param('data');
        $author = new mCategory;
        // 验证表单
        $validate = new \app\index\validate\Category;
        if ($validate->check($data)) {
            try {
                $result = $author->data($data)->save();
                return success($result ? '添加成功' : '添加失败');
            } catch (PDOException $e) {
                return error('该分类已被添加过');
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
            mCategory::where("cname", input('data')['cname'])->findOrFail();
        } catch (DataNotFoundException $e) {
            return success($e->getMessage());
        } catch (ModelNotFoundException $e) {
            return success('该分类名可以添加');
        } catch (DbException $e) {
            return success($e->getMessage());
        }
        return error('该分类已被添加过');
    }
}
