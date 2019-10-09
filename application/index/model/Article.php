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
    protected $id, $title, $content, $desc, $cover, $author_id, $category_id, $permission, $status, $like, $views;

    public function category() {
        return $this->hasOne('Category', 'id', 'category_id');
    }
    public function author() {
        return $this->hasOne('Author', 'id', 'author_id');
    }

    // 考虑如何载入树形结构的 Comments
}