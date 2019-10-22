<?php

namespace app\index\controller;

use app\index\model\Article as mArticle;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\exception\PDOException;
use think\facade\Request;
use think\Log;

class Article
{
    public function index($page = 1, $rowSize = 20)
    {
        try {
            $data = mArticle::limit(($page - 1) * $rowSize, $rowSize)->withJoin([
                'author' => ['username', 'id'],
                'category' => ['cname', 'id'],
            ])->select();
            return error('成功', $data);
        } catch (DataNotFoundException $e) {
        } catch (ModelNotFoundException $e) {
        } catch (DbException $e) {
        }
    }
    public function withParams()
    {
        $params = input('data');

        foreach ($params as $key => $value) {
            if ($value == -1) unset($params[$key]);
        }
//        dump($params);
//        return;
        try {
            $data = mArticle::where($params)->withJoin([
                'author' => ['username', 'id'],
                'category' => ['cname', 'id'],
            ])->limit(10)->select();
            return error('成功', $data);
        } catch (DataNotFoundException $e) {
        } catch (ModelNotFoundException $e) {
            return error('暂无数据');
        } catch (DbException $e) {
        }

    }

    public function create()
    {
    }

    public function delete($id)
    {
        $result =  mArticle::destroy($id);
        return $result ? success('删除成功') : error('删除失败');
    }

    public function update($id)
    {
        // 修改
        $data = Request::param('data');
        unset($data['update_time']);
        try {
            $result = mArticle::where(['id'=> $id])->update($data);
        } catch (PDOException $e) {
            return  ['msg' => $e->getMessage(), 'code' => 10012];
        } catch (Exception $e) {
            return  ['msg' => $e->getMessage(), 'code' => 10013];
        }
        return $result ? success('更新成功') : error('更新失败，没有修改任何字段');
    }
    public function save()
    {
        $data = Request::param('data');
        $article = new mArticle();
        $result = $article->data($data)->save();
        return $result ? success('插入成功') : error('插入失败');
    }

    public function batchSave()
    {
        $data = Request::param('data');
        // 批量写入
        foreach ($data as $d) {
            mArticle::create($d);
        }
    }

    public function read()
    {
    }

    public function edit()
    {

    }

}
