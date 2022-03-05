<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FormController;
use App\Http\Controllers\Frontend\UnitController;
use App\Http\Controllers\Frontend\ListController;
use App\Http\Controllers\Frontend\MoreController;


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

Route::get('/', [HomeController::class, 'layout']);

Route::get('/form', [FormController::class, 'layout']);
Route::get('/form', [UnitController::class, 'index']);
Route::POST('/form1', [FormController::class, 'insert']);

Route::get('/list', [ListController::class, 'layout']);
Route::get('edit/{id}', [ListController::class, 'edit']);
Route::post('edit', [ListController::class, 'update']);
Route::post('/status-update', [ListController::class, 'status_update']);

Route::get('/more-list', [MoreController::class, 'layout']);
Route::get('/more{id}', [MoreController::class, 'more']);