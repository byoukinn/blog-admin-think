<?php

namespace app\index\controller;

use app\index\model\Article as mArticle;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\exception\PDOException;
use think\facade\Request;

class Article
{
    public function index($page = 1, $rowSize = 20)
    {
        try {
            $data = mArticle::limit(($page - 1) * $rowSize, $rowSize)->select();
            return ['code' => 200, 'msg' => '成功', 'data' => $data];
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
        $result =  mArticle::destroy($id);
        return  ['msg' => $result ? '删除成功' : '删除失败'];
    }

    public function update($id)
    {
        // 修改
        try {
            $result = mArticle::where(['id'=> $id])->update();
        } catch (PDOException $e) {
        } catch (Exception $e) {
        }
        return  ['msg' => $result ? '更新成功' : '更新失败'];
    }
    public function save()
    {
        $data = Request::param('data');
        $article = new mArticle();
        $result = $article->data($data)->save();
        return ['msg' => $result ? '插入成功' : '插入失败', 'code' => $result ? 200 : 10009];
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
