<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes for p.1
Route::get('/', function () {
    return 'Головна сторінка сайту';
})->name('main');

Route::get('/posts', function () {
    return 'Список постів';
})->name('allPosts');

Route::get('/post/1', function () {
    return 'Перший пост ';
});


// routes for p.3
Route::get('/test', function () {
    return 'Тестова сторінка';
});

Route::get('/dir/test', function () {
    return 'Тестова сторінка в dir';
});
