<?php

use App\Http\Controllers\AppartmentsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UserController;
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
Route::prefix("users") -> group( function () {
    Route::post("login", [UserController::class, "login"]);
    Route::post("registration", [UserController::class, "registration"]);
});

Route::prefix("appartments") -> group( function () {
    Route::post("create", [AppartmentsController::class, "create_apparts"]);
    Route::get("show_all", [AppartmentsController::class, "show_appartments"]);
});

Route::prefix("types") -> group( function () {
    Route::get("all_types", [TypesController::class, "show_types"]);
    Route::post("add/type", [TypesController::class, "add_type"]);
});

Route::prefix("buildings") -> group( function () {
    Route::get("all_types", [TypesController::class, "show_types"]);
    Route::post("add/type", [TypesController::class, "add_type"]);
});

Route::prefix("carts") -> group( function () {
    Route::get("my_cart", [CartController::class, "my_cart"]);
    Route::post("add_cart", [CartController::class, "create_cart"]);
});
