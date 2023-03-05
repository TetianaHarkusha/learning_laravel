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

//route for p.11
Route::get('/posts/{date}', function ($date) {
    return 'Список постів від ' . $date;
});

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
})->whereAlpha('name');

// route for p.7
Route::get('/user/{surname}/{name}', function ($surname, $name) {
    return 'Користувач ' . $surname . ' ' . $name;
})->whereAlpha(['name','surname']);

// route for p.9
Route::get('/user/{id}', function ($id) {
    return 'Користувач id=' . $id;
})->whereNumber('id');

// route for p.10
Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'Користувач ' . $name . ' (id= ' . $id . ')';
})->whereNumber('id')->where('name', '[a-z]{2,}');

// route for p.8
Route::get('/city/{city?}', function ($city = 'Kyiv') {
    return 'Місто ' . $city;
});

//route for p.12
Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return 'Дата ' . $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
});

//routes for p.13
Route::prefix('admin')->group(function() {
    Route::get('/users', function () {
        return 'all';
    });
    Route::get('/user/{id}', function ($id) {
        return $id;
    });
});

