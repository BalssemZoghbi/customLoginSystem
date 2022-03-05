<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomAuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/user', [AuthController::class,'user']);
Route::get('registration', [CustomAuthController::class,'registration']);
Route::post('register-user', [CustomAuthController::class,'registerUser'])->name('register-user');
Route::get('/login', [CustomAuthController::class,'login'])->middleware('alreadyLoggin');
Route::post('login-user', [CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/home', [CustomAuthController::class,'home'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class,'logout']);



