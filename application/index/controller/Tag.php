<?php

namespace app\index\controller;

use app\index\model\Tag as mTag;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\exception\PDOException;
use think\facade\Request;

class Tag
{
    public function index($page = 1, $rowSize = 20)
    {
        try {
            $res = mTag::limit(($page - 1) * $rowSize, $rowSize)->select();
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
        $result = mTag::destroy($id);
        return success($result ? '删除成功' : '删除失败');
    }

    public function update($id)
    {
        // 修改
        try {
            $result = mTag::where(['id' => $id])->update();
        } catch (PDOException $e) {
        } catch (Exception $e) {
        }
        return success($result ? '更新成功' : '更新失败');
    }

    public function save()
    {
        $data = Request::param('data');
        $author = new mTag;
        // 验证表单
        $validate = new \app\index\validate\Register;
        if ($validate->check($data)) {
            try {
                $result = $author->data($data)->save();
                return success($result ? '添加成功' : '添加失败');
            } catch (PDOException $e) {
                return error('该标签已被添加过');
            }
        } else {
            return error($validate->getError());
        }
    }

    public function batchSave()
    {
        $data = Request::param("data");
        // 批量写入
        foreach ($data as $d) {
            mTag::create($d);
        }
    }

    public function read($id)
    {
        try {
            $res = mTag::where('author_id', $id)->select();
            return success('成功', $res);
        } catch (DataNotFoundException $e) {
            return error('查询失败', $e->getMessage());
        } catch (ModelNotFoundException $e) {
            return error('暂无数据');
        } catch (DbException $e) {
        }
        return error('查询失败');
    }

    public function edit()
    {
    }

}
