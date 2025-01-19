<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\ProductController;


Route::resource("admin",AdminController::class);
Route::resource("product",ProductController::class);
Route::resource("/",WebController::class);
Route::resource("user",UserController::class);
Route::resource("cart",CartController::class);
Route::resource("order",OrderController::class);
Route::post("login",[UserController::class,"login"]);
Route::get("logout",[UserController::class,"logout"]);



