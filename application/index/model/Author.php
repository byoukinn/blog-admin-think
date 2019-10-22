<?php
/**
 * Created by PhpStorm.
 * User: BK
 * Date: 9/13/2019
 * Time: 5:01 PM
 */

namespace app\index\model;

use think\Model;

class Author extends Model
{
    protected $update_time = 'last_login_time';
    protected $id, $username, $password, $email, $comment, $website, $create_time;

    public function login() {
        session('AUTH', $this);

    }

    public function article() {
        return $this->hasMany('Article', 'author_id', 'id');
    }

    public function logout() {
        session('AUTH', '');
    }

}