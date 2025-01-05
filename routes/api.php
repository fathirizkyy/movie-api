<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/movies', 'App\Http\Controllers\Api\MovieController@index');

Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::middleware(['auth:sanctum','role:admin'])->group(function(){
   Route::post('/movies', 'App\Http\Controllers\Api\MovieController@store');
Route::get('/movies/{id}', 'App\Http\Controllers\Api\MovieController@show');
Route::put('/movies/{id}', 'App\Http\Controllers\Api\MovieController@update');
Route::delete('/movies/{id}', 'App\Http\Controllers\Api\MovieController@destroy');
Route::delete('/movies/deleteall', 'App\Http\Controllers\Api\MovieController@destroyAll');
});

Route::middleware('auth:sanctum')->post('/logout', 'App\Http\Controllers\AuthController@logout');
