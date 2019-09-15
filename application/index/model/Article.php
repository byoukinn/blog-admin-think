<?php
/**
 * Created by PhpStorm.
 * User: BK
 * Date: 9/13/2019
 * Time: 5:01 PM
 */

namespace app\index\model;

use think\Model;

class Article extends Model
{
    protected $id, $title, $content, $desc, $cover, $catagory_id, $permission, $status, $like, $views, $create_time, $update_time;

    public function Category() {
        return $this->hasOne('Category', 'catagory_id', 'id');
    }

    // 考虑如何载入树形结构的 Comments
}