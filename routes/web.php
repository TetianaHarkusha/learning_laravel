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
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PasswordResettingController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Artisan;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

Route::middleware(['setLocale','throttle:updating-pages'])->group(function () {
    // routes for main page
    Route::get('/', function () {
        return view('Pages.main', ['title' => 'StadyLaravel-main']);
    })->name('main');

    // grouped routes 'homework'
    Route::name('homework.')->prefix('homework')->group(function () {
        Route::get('', [HomeworkController::class, 'showAll'])->name('list');
        Route::get('/{id}', [HomeworkController::class, 'showOne'])->name('lesson');
    });

    // grouped routes 'session'
    Route::name('session.')->prefix('session')->group(function () {
        Route::get('/forget', [SessionController::class, 'destroy'])->name('destroy');
        Route::get('/flush', [SessionController::class, 'destroyAll'])->name('destroyAll');
        Route::get('/array', [SessionController::class, 'setGetArray'])->name('array');
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

    // routes for test
    Route::prefix('test')->name('test.')->group(function () {
        Route::match(['get', 'post'], '', [TestController::class, 'testForm'])->name('form');
        Route::get('/response/{id}', [TestController::class, 'myResponse'])->name('response');
        Route::get('/outside', [TestController::class, 'getOutside'])->name('outside');
    });

    Route::get('/dir/test', function () {
        return 'Тестова сторінка в dir';
    })->name('dirTest');

    //grouped routes 'user'
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/all', [UserController::class, 'showAll'])->name('all');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit', [UserController::class, 'edit'])->name('edit');
        Route::post('/update', [UserController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        Route::get('/restore', [UserController::class, 'restore'])->name('restore');
        Route::get('/query/{id?}', [UserController::class, 'showByQuery'])->name('query');
        Route::get('/Eloquent/{id?}', [UserController::class, 'showByEloquent'])->name('query.Eloquent');

        //grouped routes 'user.profile' user with relationship profile
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/one', [UserDoubleController::class, 'showOneWithProfile'])->name('one');
            Route::get('/all', [UserDoubleController::class, 'showAllWithProfiles'])->name('all');
        });

        //grouped routes 'user.city.position' - user with relationships city and position
        Route::prefix('city')->name('city.')->group(function () {
            Route::prefix('position')->name('position.')->group(function () {
                Route::get('one', [UserController::class, 'showOneWithCityAndPosition'])->name('one');
                Route::get('all', [UserController::class, 'showAllWithCityAndPosition'])->name('all');
                Route::get('query/{id}', [UserController::class, 'showWithCityAndPositionQuery'])->name('query');
            });
        });

        Route::get('/{name}', [UserController::class,'show'])->whereAlpha('name')->name('name');

        Route::get('/{surname}/{name}', [UserController::class, 'show'])
        ->whereAlpha(['name','surname'])->name('surnameName');

        Route::get('/{id}', [UserController::class,'show'])->whereNumber('id')->name('id');

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

    //routes for Admin Dashboard
    Route::prefix('dashboard')->name('dashboard.')->middleware(['verified', 'auth'])->group(function() {
        Route::get('', [AdminController::class, 'main'])->name('main');
        Route::resource('posts', PostController::class);
        Route::get('/posts/{post}/like/{mark?}', [PostController::class, 'like'])->name('posts.like');
        Route::get('/posts/{post}/download', [PostController::class, 'download'])->name('posts.download');
    });

    //routes for Authentication
    Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserLoginController::class, 'storeLogin']);

    Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');

    Route::get('/register', [UserLoginController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [UserLoginController::class, 'storeRegister']);

    //routes for Email Verification
    Route::prefix('email')->name('verification.')->group( function(){
        Route::prefix('verify')->group(function(){
            Route::get('', [EmailVerificationController::class, 'showNotice'])->middleware('auth')->name('notice');
            Route::get('/{id}/{hash}',[EmailVerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verify');
        });
        Route::post('/verification-notification',[EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('resend');
    });

    //routes for Resetting Passwords
    Route::name('password.')->middleware('guest')->group( function(){
        Route::get('/forgot-password', [PasswordResettingController::class, 'showFormForgot'])->name('request');
        Route::post('/forgot-password', [PasswordResettingController::class, 'sendLink'])->name('email');
        Route::get('/reset-password/{token}', [PasswordResettingController::class, 'showFormReset'])->name('reset');
        Route::post('/reset-password', [PasswordResettingController::class, 'update'])->name('update');
    });
});

//            Service routes            //
//----------------------------------------
//The route for switching languages, service route
Route::post('locale', [LanguageController::class, 'switchLang'])->name('locale');    

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
