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

    /**
     * CITY 
     */
    Route::get('/cityList', [CityController::class, 'cityList'])->name('cityList');
    Route::get('/cityEdit/{id}', [CityController::class, 'cityEdit'])->name('cityEdit');
    Route::post('/citySave', [CityController::class, 'citySave'])->name('citySave');
    Route::post('/cityDelete', [CityController::class, 'cityDelete'])->name('cityDelete');
    /**
     * CITY - COMPONENTS
     */
    Route::post('/restaurantEdit', [CityController::class, 'restaurantEdit'])->name('restaurantEdit');
    Route::post('/restaurantDelete', [CityController::class, 'restaurantDelete'])->name('restaurantDelete');
    Route::post('/activityEdit', [CityController::class, 'activityEdit'])->name('activityEdit');
    Route::post('/activityDelete', [CityController::class, 'activityDelete'])->name('activityDelete');
    Route::post('/mustSeeEdit', [CityController::class, 'mustSeeEdit'])->name('mustSeeEdit');
    Route::post('/mustSeeDelete', [CityController::class, 'mustSeeDelete'])->name('mustSeeDelete');
    Route::post('/estheticsEdit', [CityController::class, 'estheticsEdit'])->name('estheticsEdit');
    Route::post('/estheticsDelete', [CityController::class, 'estheticsDelete'])->name('estheticsDelete');
    Route::post('/accommodationEdit', [CityController::class, 'accommodationEdit'])->name('accommodationEdit');
    Route::post('/accommodationDelete', [CityController::class, 'accommodationDelete'])->name('accommodationDelete');
    Route::post('/transportEdit', [CityController::class, 'transportEdit'])->name('transportEdit');
    Route::post('/transportDelete', [CityController::class, 'transportDelete'])->name('transportDelete');
    
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