<?php

use App\Http\Controllers\API\ExpensesCategoryController;
use App\Http\Controllers\API\UserController;
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

//For Login
Route::post('login', [UserController::class, 'login']);

//For Logout
Route::group(['middleware' => 'auth:sanctum'], function () {
    // Route::get('user', [UserController::class, 'userDetails']);
    Route::get('logout', [UserController::class, 'logout']);
});


Route::post('expense-categories', [ExpensesCategoryController::class,'store']);