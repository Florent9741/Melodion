<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
<<<<<<< HEAD
use App\Http\Controllers\UserController;
=======
use App\Http\Controllers\MelodionController;
use App\Http\Controllers\YouTubeController;
>>>>>>> a8393b57678aeffd6bcfe2a6cef1a1aec2172730

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

Route::get('/welcome', function () {
    return view('welcome')->name('welcome');
});

Route::get('/video', function(){
    return view('video_etat');
});
//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('register', [Authcontroller::class, 'register'])->name('register');

Route::post('register', [Authcontroller::class, 'register_action'])->name('register.action');

Route::get('login', [Authcontroller::class, 'login'])->name('login');

Route::post('login', [Authcontroller::class, 'login_action'])->name('login.action');

Route::get('signout', [Authcontroller::class, 'logout'])->name('signout');

<<<<<<< HEAD
Route::get('/showdelete/{id}', [UserController::class,'showdel']);

Route::delete('/user/{id}', [UserController::class,'delete']);
Route::get('/user',[UserController::class,'getall'])->name('user');

Route::get('/restore',[UserController::class,'showrestore']);
Route::get('/restore/{id}',[UserController::class,'restore'])->name('user.restore');
=======
Route::get('signout', [Authcontroller::class, 'logout'])->name('signout');


Route::get('/', [YouTubeController::class,'index'])->name('index'); 

Route::get('/results', [YoutubeController::class,'results'])->name('results');

Route::get('/watch/{id}', [YouTubeController::class,'watch'])->name('watch');

Route::post('library', [MelodionController::class, 'addtolibrary'])
->name('library');

Route::get('/biblio/{id}',[MelodionController::class, 'show'])->name('biblio'); 
>>>>>>> a8393b57678aeffd6bcfe2a6cef1a1aec2172730
