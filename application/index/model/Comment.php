<?php
/**
 * Created by PhpStorm.
 * User: BK
 * Date: 9/13/2019
 * Time: 5:01 PM
 */

namespace app\index\model;

use think\Model;

class Comment extends Model
{
    protected $id, $parent_id, $nickname, $content, $like, $email, $website, $article_id, $created_time, $updated_time, $deleted_time;


}