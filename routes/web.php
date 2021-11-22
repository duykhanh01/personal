<?php

use Illuminate\Support\Facades\Route;
use App\Models\ProfileModel;

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

Route::get('/', function (ProfileModel $profile) {
    $profile = ProfileModel::find(1);
    return view('home', [
        'profile' => $profile,
    ]);
});

//uth::routes(['register' => false]);
Auth::routes();
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::patch('/admin/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'update']);

Route::get('/admin/home', [App\Http\Controllers\AdminHomeController::class, 'index']);
Route::patch('/admin/home/{profile}', [App\Http\Controllers\AdminHomeController::class, 'update']);

Route::get('/admin/about', [App\Http\Controllers\AboutController::class, 'index']);
Route::patch('/admin/about/{profile}', [App\Http\Controllers\AboutController::class, 'update']);

Route::get('/admin/skill', [App\Http\Controllers\SkillsController::class, 'index']);
Route::post('/admin/skill', [App\Http\Controllers\SkillsController::class, 'store']);
Route::patch('/admin/skill/{skill}', [App\Http\Controllers\SkillsController::class, 'update']);
Route::get('/admin/skill/{skill}', [App\Http\Controllers\SkillsController::class, 'destroy']);

Route::get('/admin/favorite', [App\Http\Controllers\FavoriteController::class, 'index']);
Route::post('/admin/favorite', [App\Http\Controllers\FavoriteController::class, 'store']);
Route::get('/admin/favorite/{favorite}', [App\Http\Controllers\FavoriteController::class, 'destroy']);

Route::get('/admin/favorite/details', [App\Http\Controllers\FavoriteDetailsController::class, 'index']);
Route::post('/admin/favorite/details', [App\Http\Controllers\FavoriteDetailsController::class, 'store']);
Route::patch('/admin/favorite/details/{details}', [App\Http\Controllers\FavoriteDetailsController::class, 'update']);
Route::get('/admin/favorite/details/{details}', [App\Http\Controllers\FavoriteDetailsController::class, 'destroy']);

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('/contact/send', [App\Http\Controllers\ContactController::class, 'send']);
Route::get('/contact/send', [App\Http\Controllers\ContactController::class, 'index']);
