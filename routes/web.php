<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CoupleController;

Route::get('/', [HomeController::class, 'login'])->name('login');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/do_login', [HomeController::class, 'do_login'])->name('do_login');
Route::post('/do_register', [HomeController::class, 'do_register'])->name('do_register');

//middleware Auth
Route::group(['middleware' => ['auth']], function () {
    Route::get('/adminPanel', [HomeController::class, 'adminPanel'])->name('adminPanel');
    Route::get('/saveTheDatePanel', [HomeController::class, 'saveTheDatePanel'])->name('saveTheDatePanel');
    Route::get('/guestPanel', [HomeController::class, 'guestPanel'])->name('guestPanel');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

    //middleware role = admin
    Route::group(['middleware' => ['role:admin']], function () {
        /**
         * CITY 
         */
        Route::get('/cityList', [CityController::class, 'cityList'])->name('cityList');
        Route::get('/cityEdit/{id}', [CityController::class, 'cityEdit'])->name('cityEdit');
        Route::post('/citySave', [CityController::class, 'citySave'])->name('citySave');
        Route::post('/restaurantEdit/{id}', [CityController::class, 'restaurantEdit'])->name('restaurantEdit');
        Route::post('/activityEdit/{id}', [CityController::class, 'activityEdit'])->name('activityEdit');
        Route::post('/mustSeeEdit/{id}', [CityController::class, 'mustSeeEdit'])->name('mustSeeEdit');
        Route::post('/estheticsEdit/{id}', [CityController::class, 'estheticsEdit'])->name('estheticsEdit');
        Route::post('/accommodationEdit/{id}', [CityController::class, 'accommodationEdit'])->name('accommodationEdit');
        Route::post('/transportEdit/{id}', [CityController::class, 'transportEdit'])->name('transportEdit');
        Route::post('/cityDelete/{id}', [CityController::class, 'cityDelete'])->name('cityDelete');
        /**
         * COUPLE
         */
        Route::get('/coupleList', [CoupleController::class, 'coupleList'])->name('coupleList');
        Route::get('/coupleGuestList', [CoupleController::class, 'coupleGuestList'])->name('coupleGuestList');
        Route::get('/coupleEdit/{id}', [CoupleController::class, 'coupleEdit'])->name('coupleEdit');
        Route::post('/coupleSave', [CoupleController::class, 'coupleSave'])->name('coupleSave');
        Route::post('/coupleMenu', [CoupleController::class, 'coupleMenu'])->name('coupleMenu');
        Route::post('/coupleAccomodaionRel', [CoupleController::class, 'coupleAccomodaionRel'])->name('coupleAccomodaionRel');
        Route::post('/coupleTransportRel', [CoupleController::class, 'coupleTransportRel'])->name('coupleTransportRel');
    });
});