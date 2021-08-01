<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\NamaController;
use App\Http\Controllers\Api\KategorisController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('', [ItemController::class, 'index']);

Route::resources([
    'items' => ItemController::class,
    'homes' => HomeController::class,
    'kategoris' => KategorisController::class,
    'namapelanggan' => NamaController::class,

    
]);
