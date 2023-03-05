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

// route for p.4
Route::get('/post/{id}', function ($id) {
    return 'Пост ' . $id;
});

// route for p.6
Route::get('/post/{catId}/{postId}', function ($catId, $postId) {
    return 'Пост ' . $postId . ' в категорієї ' . $catId;
});

// routes for p.3
Route::get('/test', function () {
    return 'Тестова сторінка';
});

Route::get('/dir/test', function () {
    return 'Тестова сторінка в dir';
});

// route for p.5
Route::get('/user/{name}', function ($name) {
    return 'Користувач ' . $name;
});

// route for p.7
Route::get('/user/{surname}/{name}', function ($surname, $name) {
    return 'Користувач ' . $surname . ' ' . $name;
});

// route for p.8
Route::get('/city/{city?}', function ($city = 'Kyiv') {
    return 'Місто ' . $city;
});
