<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HealthTrackerControllerAPI;
use App\Http\Controllers\API\HealthPostController;

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

Route::post('login',[HealthTrackerControllerAPI::class,'login']);
Route::post('register',[HealthTrackerControllerAPI::class,'register']);
Route::post('reset-password',[HealthTrackerControllerAPI::class,'resetPassword']);


Route::get('get-all-posts',[HealthPostController::class,'getAllPosts']);
Route::get('get-post',[HealthPostController::class,'getPost']);
Route::get('search-post',[HealthPostController::class,'searchPost']);
