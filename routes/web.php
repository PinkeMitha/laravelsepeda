<?php

use App\Models\items;
use App\Models\Homes;
use App\Models\kategoris;
use App\Models\namapelanggan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\NamaController;

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

Route::get('', [ItemController::class, 'index']);
//Route::get('/items', [ItemController::class, 'index']);
//Route::get('/items/create', [ItemController::class, 'create']);
//Route::POST('/items', [ItemController::class, 'store']);
//Route::get('/items/{id}', [ItemController::class, 'show']);
//Route::get('/items/{id}/edit', [ItemController::class, 'edit']);
//Route::put('/items/{id}', [ItemController::class, 'update']);
//Route::delete('/items/{id}', [ItemController::class, 'destory']);

Route::resources([
    'items' => ItemController::class,
    'homes' => HomeController::class,
    'kategoris' => KategorisController::class,
    'namapelanggan' => NamaController::class,

    
]);

Route::get('/kategoris/additem/{kategori}', [KategorisController::class, 'additem']);
Route::put('/kategoris/additem/{kategori}', [KategorisController::class, 'updateadditem']);
Route::put('/kategoris/deleteadditem/{kategori}', [KategorisController::class, 'deleteadditem']);
