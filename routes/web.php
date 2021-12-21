<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\auth\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/welcome', [UserController::class,'index'])->name('welcome.index');
Route::get('/', [UserController::class,'index'])->name('welcome.index');
Route::post('/welcome', [UserController::class,'store'])->name('welcome.store');


Route::get('/login', [AuthController::class,'getLogin'])->name('login');
Route::post('/authenticate', [AuthController::class,'authenticate'])->name('auth');

Route::get('/dashboard', [UserController::class,'dashboard'])->name('user.dashboard');
Route::get('/admin-dashboard', [UserController::class,'adminDashboard'])->name('admin.dashboard');
Route::get('/logout', [UserController::class,'logout'])->name('logout');