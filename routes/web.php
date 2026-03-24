<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WelcomeController;

// تسجيل مستخدم جديد
Route::get('/register', [RegisterController::class,'show'])->middleware('guest');
Route::post('/register', [RegisterController::class,'register']);



// تسجيل الدخول
Route::get('/login', [LoginController::class,'show'])->middleware('guest');
Route::post('/login', [LoginController::class,'login']);

// صفحة الترحيب

Route::get('/welcome', [WelcomeController::class,'index'])->middleware('auth');

// تسجيل الخروج
Route::get('/logout', [LoginController::class,'logout']);