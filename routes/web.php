<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\repairmanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\guideController;


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

Route::get('/', [MainController::class, 'showMain']);
Route::get('/readguide', [MainController::class, 'showReadGuide']);
Route::get('/fixers', [repairmanController::class, 'showFixers']);

Route::get('/addFixer', [repairmanController::class, 'showAddFixer']);
Route::post('/addFixer', [repairmanController::class, 'addFixer']);


Route::get('/locations', [MainController::class, 'showLocations']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'signIn']);
Route::post('/register', [AuthController::class, 'addUser']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'showRegister']);

Route::get('/showOrders', [orderController::class, 'showOrders']);
Route::get('/changeStatus/{id}/{status}', [orderController::class, 'changeStatus']);
Route::get('/cancelOrder/{id}', [orderController::class, 'cancelOrder']);

Route::get('/guides', [guideController::class, 'showGuides']);
Route::get('/showGuide/{id}', [guideController::class, 'showGuide']);


Route::get('/profile/{id}', [profileController::class, 'showProfile']);



