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
Route::resource('tag', 'tag')->except(['index']);

// batch save
// TODO： 在项目完成时请把这块去掉
Route::post('article/batch', 'Article/batchSave');
Route::post('comment/batch', 'Comment/batchSave');

// 登陆路由
Route::post('login', 'Auth/login');
Route::post('logout', 'Auth/logout');

// 需要做分页的路由
Route::get('authors/[:page]/[:rowSize]', 'Author/index');
Route::get('categorys/[:page]/[:rowSize]', 'Category/index');
Route::get('comments/[:page]/[:rowSize]', 'Comment/index');
Route::get('tags/[:page]/[:rowSize]', 'Tag/index');

// 验证路由
Route::post('checkAuthorName', 'Author/checkName');
Route::post('checkCategoryName', 'Category/checkName');

// 特殊带参数路由
Route::post('getArticleWithParams', 'Article/withParams');
return [

];
