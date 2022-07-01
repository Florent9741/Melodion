<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MelodionController;
use App\Http\Controllers\YouTubeController;

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


Route::post('/url', [Youtubecontroller::class, 'url']);
Route::get('/welcome', function () {
    return view('welcome')->name('welcome');
})->middleware('auth');

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

Route::get('/showdelete/{id}', [UserController::class,'showdel']);

Route::delete('/user/{id}', [UserController::class,'delete']);
Route::get('/user',[UserController::class,'getall'])->name('user');

Route::get('/restore',[UserController::class,'showrestore']);
Route::get('/restore/{id}',[UserController::class,'restore'])->name('user.restore');
Route::get('signout', [Authcontroller::class, 'logout'])->name('signout');


Route::get('/', [YouTubeController::class,'index'])->name('index')->middleware('guest'); 

Route::get('/results', [YoutubeController::class,'results'])->name('results');

Route::get('/watch/{id}', [YouTubeController::class,'watch'])->name('watch');

Route::post('library', [MelodionController::class, 'addtolibrary'])
->name('library');

Route::get('/biblio/{id}',[MelodionController::class, 'show'])->name('biblio')->middleware('auth'); 
Route::delete('/biblio/{id}',[MelodionController::class, 'destroy'])->name('biblio.destroy')->middleware('auth');

Route::post('/index',[MelodionController::class, 'creatememo'])->name('memos');