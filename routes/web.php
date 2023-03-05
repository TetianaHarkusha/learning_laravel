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

//grouped routes for p.1,11
Route::name('allPosts')->prefix('posts')->group(function () {
    Route::get('', function () {
        return 'Список постів';
    });
    Route::get('/{date}', function ($date) {
        return 'Список постів від ' . $date;
    })->name('.date');
});

// grouped routes for p.4,6
Route::prefix('post')->name('post.')->group(function () {
    Route::get('/{id}', function ($id) {
        return 'Пост ' . $id;
    })->name('postId');
    Route::get('/{catId}/{postId}', function ($catId, $postId) {
        return 'Пост ' . $postId . ' в категорієї ' . $catId;
    })->name('catAndPostId');
});

// routes for p.3
Route::get('/test', function () {
    return 'Тестова сторінка';
})->name('test');

Route::get('/dir/test', function () {
    return 'Тестова сторінка в dir';
})->name('dirTest');

//grouped routes for p.5,7,9,10
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/{name}', function ($name) {
        return 'Користувач ' . $name;
    })->whereAlpha('name')->name('name');

    Route::get('/{surname}/{name}', function ($surname, $name) {
        return 'Користувач ' . $surname . ' ' . $name;
    })->whereAlpha(['name','surname'])->name('surnameName');

    Route::get('/{id}', function ($id) {
        return 'Користувач id=' . $id;
    })->whereNumber('id')->name('id');

    Route::get('/{id}/{name}', function ($id, $name) {
        return 'Користувач ' . $name . ' (id= ' . $id . ')';
    })->whereNumber('id')->where('name', '[a-z]{2,}')->name('idName');
});

// route for p.8
Route::get('/city/{city?}', function ($city = 'Kyiv') {
    return 'Місто ' . $city;
})->name('city');

//route for p.12
Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return 'Дата ' . $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
})->name('date');

//routes for p.13
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', function () {
        return 'all';
    })->name('all');
    Route::get('/user/{id}', function ($id) {
        return $id;
    })->name('user');
});
