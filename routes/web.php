<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('register', [Authcontroller::class, 'register'])->name('register');

Route::post('register', [Authcontroller::class, 'register_action'])->name('register.action');

Route::get('login', [Authcontroller::class, 'login'])->name('login');

Route::post('login', [Authcontroller::class, 'login_action'])->name('login.action');

Route::get('signout', [Authcontroller::class, 'logout'])->name('signout');

Route::get('signout', [Authcontroller::class, 'logout'])->name('signout');


Route::get('/', [YoutubeController::class,'index'])->name('index'); 

Route::get('/results', [YoutubeController::class,'results'])->name('results');

Route::get('/watch/{id}', [YoutubeController::class,'watch'])->name('watch');

Route::post('library', [MelodionController::class, 'addtolibrary'])
->name('library');