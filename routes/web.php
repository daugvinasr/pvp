<?php

use App\Http\Controllers\commentsController;
use App\Http\Controllers\partsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\repairmanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\guideController;
use App\Http\Controllers\disposalsController;


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
Route::get('/showArticle/{id}', [MainController::class, 'showArticle']);

Route::get('/readguide', [MainController::class, 'showReadGuide']);

Route::get('/fixers', [repairmanController::class, 'showFixers']);
Route::get('/fixerProfile/{id}', [repairmanController::class, 'showFixerProfile']);
Route::get('/fixerProfileEdit/{id}', [repairmanController::class, 'showFixerProfileEdit']);
Route::get('/addFixer', [repairmanController::class, 'showAddFixer']);
Route::post('/addFixer', [repairmanController::class, 'addFixer']);
Route::post('/fixerProfileEdit/{id}', [repairmanController::class, 'addEditedFixer']);


Route::get('/locations', [disposalsController::class, 'showDisposals']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'signIn']);
Route::post('/register', [AuthController::class, 'addUser']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'showRegister']);

Route::get('/showOrders', [orderController::class, 'showOrders']);
Route::get('/addOrder/{id}', [orderController::class, 'showAddOrder']);
Route::post('/addOrder/{id}', [orderController::class, 'addOrder']);
Route::get('/changeStatus/{id}/{status}', [orderController::class, 'changeStatus']);
Route::get('/cancelOrder/{id}', [orderController::class, 'cancelOrder']);

Route::get('/categories', [guideController::class, 'showCategories']);
Route::get('/devices/{id}', [guideController::class, 'showDevices']);

Route::get('/guides/{id}', [guideController::class, 'showGuides']);
Route::get('/showGuide/{id}', [guideController::class, 'showGuide']);
Route::get('/addGuide/{id}', [guideController::class, 'showAddGuide']);
Route::post('/addGuide/{id}', [guideController::class, 'addGuide']);
Route::get('/addStep/{id}', [guideController::class, 'showAddStep']);
Route::post('/addStep/{id}', [guideController::class, 'addStep']);

Route::get('/profile/{id}', [profileController::class, 'showProfile']);

Route::get('/showParts', [partsController::class, 'showParts']);
Route::get('/addPart', [partsController::class, 'showAddPart']);
Route::post('/addPart', [partsController::class, 'addPart']);
Route::get('/editPart/{id}', [partsController::class, 'showEditPart']);
Route::post('/editPart/{id}', [partsController::class, 'editPart']);

Route::get('/showComments/{id}', [commentsController::class, 'showComments']);
Route::post('/showComments/{id}', [commentsController::class, 'addComment']);






