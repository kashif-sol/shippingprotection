<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Runner\Hook;

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

// Route::post('/settings/{id}', [SettingController::class, 'SaveUpdate'])->middleware(['verify.shopify'])->name('settings');

Route::post('/settings/{id}', [SettingController::class, 'SaveUpdate'])->name('settings');
Route::post('/saveproduct',[SettingController::class, 'SaveProduct']);



Route::middleware(['verify.shopify'])->group(function (){

    Route::get('/', function () {
        return view('Content.dashboard');
    })->name('home');

Route::get('/dashboard', [HomeController::class,"dashboard"])->name("dashboard");
Route::get('/form', [HomeController::class,"form"])->name("form");
Route::get('/setting/{id}', [SettingController::class, 'setting'])->name('setting');

Route::get('/product',[SettingController::class, 'Product']);
Route::get('/senddata',[SettingController::class, 'sendApiData']);





});