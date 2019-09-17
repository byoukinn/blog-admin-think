<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::resource('author', 'Author');
Route::resource('category', 'Category');
Route::resource('comment', 'Comment');
Route::resource('article', 'Article');
Route::post('article/batch', 'Article/batchSave');

Route::post('login', 'Auth/login');
Route::post('logout', 'Auth/logout');


return [

];
