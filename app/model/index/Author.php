<?php

namespace app\model\index;

use think\Model;

/**
 * @mixin think\Model
 */
class Author extends Model
{
    protected $updateTime = 'last_login_time';
    protected $id, $name, $auth, $email, $comment, $website;

}
