<?php

namespace app\model\index;

use think\Model;

/**
 * @mixin think\Model
 */
class Article extends Model
{
    protected $updateTime = 'update_time';
    protected $id, $title, $content, $desc, $cover, $catagoryId, $permission, $status, $like, $views;

    protected function author() {
        return $this->hasOne('Author', 'id', 'id');
    }
}
