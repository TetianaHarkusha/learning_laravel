<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\View;

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
    return View::make('main', ['name' => 'Tetiana', 'surname' => 'Harkusha']);
})->name('main');

//grouped routes 'posts' and used controller
Route::name('allPosts')->prefix('posts')->group(function () {
    Route::get('', [PostController::class, 'showAll']);
    Route::get('/{date}', [PostController::class, 'showAll'])->name('.date');
});

// grouped routes 'post' and used controller
Route::prefix('post')->name('post.')->group(function () {
    Route::get('/{id}', [PostController::class,'show'])->name('postId');
    Route::get('/{catId}/{postId}', [PostController::class, 'show'])->name('catAndPostId');
});

// routes for p.3
Route::get('/test', function () {
    return 'Тестова сторінка';
})->name('test');

Route::get('/dir/test', function () {
    return 'Тестова сторінка в dir';
})->name('dirTest');

//grouped routes 'name' and used controller
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/all', [UserController::class, 'showAll'])
    ->name('all');

    Route::get('/{name}', [UserController::class,'show'])
    ->whereAlpha('name')->name('name');

    Route::get('/{surname}/{name}', [UserController::class, 'show'])
    ->whereAlpha(['name','surname'])->name('surnameName');

    Route::get('/{id}', [UserController::class,'show'])
    ->whereNumber('id')->name('id');

    Route::get('/{id}/{name}', [UserController::class, 'show'])
    ->whereNumber('id')->where('name', '[a-z]{2,}')->name('idName');
});

// used controller for city
Route::get('/city/{city?}', [CityController::class, 'show'])->name('city');

//route for p.12
Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return 'Дата ' . $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
})->name('date');

//grouped routes 'admin' and used controller
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserController::class, 'showAdminAll'])->name('all');
    Route::get('/user/{id}', [UserController::class, 'showAdmin'])->name('user');
});
