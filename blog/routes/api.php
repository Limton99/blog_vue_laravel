<?php

use App\Http\Controllers\Api\V1\AuthApiController;
use App\Http\Controllers\Api\V1\BlogApiController;
use App\Http\Controllers\Api\V1\CategoryApiController;
use App\Http\Controllers\Api\V1\CommentApiController;
use App\Http\Controllers\Api\V1\TagApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthApiController::class, 'login']);
Route::post('register', [AuthApiController::class, 'register']);

Route::group(['prefix'=>'tags'], function () {
    Route::get('/', [TagApiController::class, 'index']);
});

Route::group(['prefix'=>'categories'], function () {
    Route::get('/', [CategoryApiController::class, 'index']);
});

Route::group(['prefix'=>'comments'], function () {
    Route::get('/', [CommentApiController::class, 'index']);
});

Route::group(['prefix'=>'blogs'], function () {
    Route::get('/all', [BlogApiController::class, 'index']);
    Route::get('/{id}', [BlogApiController::class, 'show']);
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::group(['prefix'=>'blogs'], function () {
        Route::post('/store', [BlogApiController::class, 'store']);
        Route::patch('/update/{id}', [BlogApiController::class, 'update']);
        Route::delete('/delete/{id}', [BlogApiController::class, 'destroy']);
    });

    Route::group(['prefix'=>'comments'], function () {
        Route::post('/store', [CommentApiController::class, 'store']);
        Route::patch('/update/{id}', [CommentApiController::class, 'update']);
        Route::delete('/delete/{id}', [CommentApiController::class, 'destroy']);
    });
    Route::post('user', [AuthApiController::class, 'checkUser']);
    Route::post('logout', [AuthApiController::class, 'logout']);
});

Route::group(['middleware' => ['auth:api', 'admin']], function () {
    Route::group(['prefix'=>'categories'], function () {
        Route::post('/store', [CategoryApiController::class, 'store']);
        Route::patch('/update/{id}', [CategoryApiController::class, 'update']);
        Route::delete('/delete/{id}', [CategoryApiController::class, 'destroy']);
    });
    Route::group(['prefix'=>'tags'], function () {
        Route::post('/store', [TagApiController::class, 'index']);
        Route::patch('/update/{id}', [TagApiController::class, 'update']);
        Route::delete('/delete/{id}', [TagApiController::class, 'destroy']);
    });
});
