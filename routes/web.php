<?php

    use App\Http\Controllers\AuthenticationController;
    use App\Http\Controllers\DashboardController;
    use Illuminate\Support\Facades\Route;

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

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, "dashboard"])->name("dashboard");
    Route::get("/login", [AuthenticationController::class, "login"])->name("login");

    Route::get('/login', [AuthenticationController::class, "login"]);
    Route::get('/login/callback', [AuthenticationController::class, "callback"]);