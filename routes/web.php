<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDoubleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Artisan;

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
    return view('Pages.main', ['title' => 'StadyLaravel-main']);
})->name('main');

// grouped routes 'homework'
Route::name('homework')->prefix('homework')->group(function () {
    Route::get('', function () {
        return view('Pages.homework.list', ['title' => 'Homework']);
    })->name('.list');
    Route::get('/{id}', function ($id) {
        return view('Pages.homework.lesson'. $id, ['title' => 'Homework']);
    })->name('.lesson');
});

//grouped routes 'posts'
Route::name('allPosts')->prefix('posts')->group(function () {
    Route::get('', [PostController::class, 'showAll']);
    Route::get('/{date}', [PostController::class, 'showAll'])->name('.date');
});

// grouped routes 'post'
Route::prefix('post')->name('post.')->group(function () {
    Route::get('/{id}', [PostController::class,'show'])->name('postId');
    Route::get('/{catId}/{postId}', [PostController::class, 'show'])->name('catAndPostId');
});

// routes for p.3
Route::match(['get', 'post'], '/test', [TestController::class, 'testForm'])
    ->middleware('setLocale:uk')->name('test.form');

Route::get('/dir/test', function () {
    return 'Тестова сторінка в dir';
})->name('dirTest');

//grouped routes 'user'
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/all', [UserController::class, 'showAll'])
    ->name('all');

    Route::get('/create', [UserController::class, 'create'])
    ->name('create');

    Route::post('/store', [UserController::class, 'store'])
    ->name('store');

    Route::get('/edit', [UserController::class, 'edit'])
    ->name('edit');

    Route::post('/update', [UserController::class, 'update'])
    ->name('update');

    Route::get('/delete/{id}', [UserController::class, 'destroy'])
    ->name('delete');

    Route::get('/restore', [UserController::class, 'restore'])
    ->name('restore');

    Route::get('/query/{id?}', [UserController::class, 'showByQuery'])
    ->name('query');

    Route::get('/Eloquent/{id?}', [UserController::class, 'showByEloquent'])
    ->name('query.Eloquent');

    //grouped routes 'user.profile' user with relationship profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/one', [UserDoubleController::class, 'showOneWithProfile'])
        ->name('one');

        Route::get('/all', [UserDoubleController::class, 'showAllWithProfiles'])
        ->name('all');
    });

    //grouped routes 'user.city.position' - user with relationships city and position
    Route::prefix('city')->name('city.')->group(function () {
        Route::prefix('position')->name('position.')->group(function () {
            Route::get('one', [UserController::class, 'showOneWithCityAndPosition'])
            ->name('one');
            Route::get('all', [UserController::class, 'showAllWithCityAndPosition'])
            ->name('all');
            Route::get('query/{id}', [UserController::class, 'showWithCityAndPositionQuery'])
            ->name('query');
        });
    });

    Route::get('/{name}', [UserController::class,'show'])
    ->whereAlpha('name')->name('name');

    Route::get('/{surname}/{name}', [UserController::class, 'show'])
    ->whereAlpha(['name','surname'])->name('surnameName');

    Route::get('/{id}', [UserController::class,'show'])
    ->whereNumber('id')->name('id');

    Route::get('/{id}/{name}', [UserController::class, 'show'])
    ->whereNumber('id')->where('name', '[a-z]{2,}')->name('idName');
});

//route for profiles
Route::get('/profile/user/all', [ProfileController::class, 'showAllWithUsers'])
->name('profile.user.all');

//route for country
Route::prefix('country')->name('country.')->group(function () {
    Route::get('/withUser', [CountryController::class, 'showWithUsers'])->name('city.withUser');
    Route::get('/city/{id}', [CountryController::class, 'showAllWithCities'])->name('city');
});

// grouped controller city
Route::prefix('city')->name('city.')->group(function () {
    Route::get('/country', [CityController::class, 'showAllWithCountry'])->name('country');
    Route::get('/{city?}', [CityController::class, 'show'])->name('name');
});

//route for p.12
Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return 'Дата ' . $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
})->name('date');

//grouped routes 'admin' and used controller
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserController::class, 'showAdminAll'])->name('all');
    Route::get('/user/{id}', [UserController::class, 'showAdmin'])->name('user');
});

//my help route for only local environment
if (app()->environment() == 'local') {
    Route::get('/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return "Кэш очищен.";
    });
};

//routes for Admin Dashboard
Route::prefix('dashboard')->name('dashboard.')->group(function() {
    Route::get('', [AdminController::class, 'main'])->name('main');
    Route::resource('posts', PostController::class);
});
