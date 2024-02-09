<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnimeDashboardController;
use App\Http\Controllers\EpisodeDashboardController;
use App\Http\Controllers\SeasonDashboardController;
use App\Http\Controllers\TypeDashboardController;
use App\Http\Controllers\StatusDashboardController;
use App\Http\Controllers\GenreDashboardController;
use App\Http\Controllers\StudioDashboardController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', [EpisodeController::class,'index'])->name('home');
Route::get('/anime',[AnimeController::class,'index'])->name('index.anime');
Route::get('/genre',[GenreController::class,'index'])->name('index.genre');
Route::get('/studio',[StudioController::class,'index'])->name('index.studio');
Route::get('/season',[SeasonController::class,'index'])->name('index.season');
Route::get('/status',[StatusController::class,'index'])->name('index.status');
Route::get('/type',[TypeController::class,'index'])->name('index.type');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/login',[LoginController::class,'auth'])->name('login.auth');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard.index');
Route::resource('/dashboard/animes', AnimeDashboardController::class);
Route::resource('/dashboard/seasons', SeasonDashboardController::class);
Route::resource('/dashboard/types', TypeDashboardController::class);
Route::resource('/dashboard/statuses', StatusDashboardController::class);
Route::resource('/dashboard/genres', GenreDashboardController::class);
Route::resource('/dashboard/studios', StudioDashboardController::class);
Route::get('/dashboard/{anime}/episodes/create',[EpisodeDashboardController::class,'create'])->name('episodes.create');
Route::resource('/dashboard/episodes', EpisodeDashboardController::class)->except('create');


Route::get('/anime/{anime}',[AnimeController::class,'show'])->name('show.anime');
Route::get('/genre/{genre}',[GenreController::class,'show'])->name('show.genre');
Route::get('/studio/{studio}',[StudioController::class,'show'])->name('show.studio');
Route::get('/season/{season}',[SeasonController::class,'show'])->name('show.season');
Route::get('/status/{status}',[StatusController::class,'show'])->name('show.status');
Route::get('/type/{type}',[TypeController::class,'show'])->name('show.type');
Route::get('/{episode}',[EpisodeController::class,'show'])->name('show.episode');


// ganti controller