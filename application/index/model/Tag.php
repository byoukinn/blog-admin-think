<?php
/**
 * Created by PhpStorm.
 * User: BK
 * Date: 9/13/2019
 * Time: 5:01 PM
 */

namespace app\index\model;

use think\Model;

class Tag extends Model
{
    protected $id, $author_id, $tname, $created_time, $updated_time, $deleted_time;

    public function author() {
        return $this->belongsTo('Author', 'id', 'author_id');
    }

}