<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\repairmanController;
use App\Http\Controllers\profileController;


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
Route::get('/guides', [MainController::class, 'showGuides']);
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

Route::get('/showOrders', [repairmanController::class, 'showOrders']);
Route::get('/changeStatus/{id}/{status}', [repairmanController::class, 'changeStatus']);

Route::get('/profile/{id}', [profileController::class, 'showProfile']);



