<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProductController;
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

// API Authentication
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

// Public
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/show/{id}', [ProductController::class, 'show']);
Route::get('/product/search/{name}', [ProductController::class, 'search']);



// Protect
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::post('/product/update', [ProductController::class, 'update']);
    Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy']);

    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// //auth
// Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);
// Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logout']);
// Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);

// //pubilc
// Route::get('/product',[\App\Http\Controllers\ProductController::class,'index']);
// Route::get('/product/show/{id}',[\App\Http\Controllers\ProductController::class,'show']);
// Route::get('/product/search/{name}',[\App\Http\Controllers\ProductController::class,'search']);
// //protect
// Route::delete('/product/{id}',[\App\Http\Controllers\ProductController::class,'delete']);
// Route::middleware('auth:sanctum')->post('/product/update',[\App\Http\Controllers\ProductController::class,'update']);
// Route::middleware('auth:sanctum')->post('/product/store',[\App\Http\Controllers\ProductController::class,'store']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
