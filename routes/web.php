<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CoupleController;
use App\Http\Controllers\SaveTheDateController;

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
    Route::post('/restaurantDelete', [CityController::class, 'restaurantDelete'])->name('restaurantDelete');
    Route::post('/restaurantSave', [CityController::class, 'restaurantSave'])->name('restaurantSave');

    Route::post('/activityDelete', [CityController::class, 'activityDelete'])->name('activityDelete');
    Route::post('/activitySave', [CityController::class, 'activitySave'])->name('activitySave');

    Route::post('/mustSeeDelete', [CityController::class, 'mustSeeDelete'])->name('mustSeeDelete');
    Route::post('/mustSeeSave', [CityController::class, 'mustSeeSave'])->name('mustSeeSave');

    Route::post('/estheticsDelete', [CityController::class, 'estheticsDelete'])->name('estheticsDelete');
    Route::post('/estheticsSave', [CityController::class, 'estheticsSave'])->name('estheticsSave');

    Route::post('/accommodationDelete', [CityController::class, 'accommodationDelete'])->name('accommodationDelete');
    Route::post('/accommodationSave', [CityController::class, 'accommodationSave'])->name('accommodationSave');
    
    Route::post('/transportDelete', [CityController::class, 'transportDelete'])->name('transportDelete');
    Route::post('/transportSave', [CityController::class, 'transportSave'])->name('transportSave');
    
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
    Route::post('/coupleMustSeeRel', [CoupleController::class, 'coupleMustSeeRel'])->name('coupleMustSeeRel');
    Route::post('/coupleEsteticRel', [CoupleController::class, 'coupleEsteticRel'])->name('coupleEsteticRel');
    Route::post('/coupleActivityRel', [CoupleController::class, 'coupleActivityRel'])->name('coupleActivityRel');
    Route::post('/coupleRestaurantRel', [CoupleController::class, 'coupleRestaurantRel'])->name('coupleRestaurantRel');
    Route::post('/coupleCityRel', [CoupleController::class, 'coupleCityRel'])->name('coupleCityRel');
    Route::post('/coupleMediaSVGRel', [CoupleController::class, 'coupleMediaSVGRel'])->name('coupleMediaSVGRel');

    /**
     * NOVIOS PANEL
     */
    Route::get('/couple/Dash', [CoupleController::class, 'coupleDash'])->name('coupleDash');
    Route::get('/couple/Contacts', [CoupleController::class, 'coupleContacts'])->name('coupleContacts');
    Route::get('/couple/Desing', [CoupleController::class, 'coupleDesing'])->name('coupleDesing');
    Route::post('/couple/addContact', [CoupleController::class, 'addContact'])->name('addContact');
    Route::post('/couple/addContactCSV', [CoupleController::class, 'addContactCSV'])->name('addContactCSV');
    Route::post('/coupleGaleriaRel', [CoupleController::class, 'coupleGaleriaRel'])->name('coupleGaleriaRel');
    Route::post('/coupleSavePref', [CoupleController::class, 'coupleSavePref'])->name('coupleSavePref');

});
/**
 * FAMILYBOOK
 */
Route::post('/familybook/get', [SaveTheDateController::class, 'familybookGet'])->name('familybookGet');
Route::post('/familybook/insert', [SaveTheDateController::class, 'familybookInsert'])->name('familybookInsert');
/**
 * CONFIRMATION
 */
Route::post('/confirmation/insert', [SaveTheDateController::class, 'confirmationInsert'])->name('confirmationInsert');
 /**
  * SAVE THE DATE
  */
Route::get('/{couple}/{hash}', [SaveTheDateController::class, 'couple'])->name('couple');