<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [App\Http\Controllers\HomepageController::class, 'index'])->name('home');






Auth::routes();


Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('verified');



Route::post('/change-name', [App\Http\Controllers\HomeController::class, 'change_name'])->name('change_name')->middleware('verified');
Route::post('/change-email', [App\Http\Controllers\HomeController::class, 'change_email'])->name('change_email')->middleware('verified');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password')->middleware('verified');


Route::get('/{post:slug}', [App\Http\Controllers\HomepageController::class, 'show_post'])->name('show_post');
Route::get('/category/{category:slug}', [App\Http\Controllers\HomepageController::class, 'show_category'])->name('show_category');
