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
    return 'hello, in side';
});

Route::get('hello/:name', 'index/hello');

Route::resource('author', 'Author')->except(['index']);
Route::resource('category', 'Category')->except(['index']);
Route::resource('comment', 'Comment')->except(['index']);
Route::resource('article', 'article')->except(['index']);

// batch save
Route::post('article/batch', 'Article/batchSave');

// 登陆路由
Route::post('login', 'Auth/login');
Route::post('logout', 'Auth/logout');
// 需要做分页的路由
Route::get('article/[:page]/[:rowSize]', 'Article/index');
Route::get('author/[:page]/[:rowSize]', 'Author/index');
Route::get('category/[:page]/[:rowSize]', 'Category/index');
Route::get('comment/[:page]/[:rowSize]', 'Comment/index');

Route::post('checkAuthorName', 'Author/checkName');

return [

];
