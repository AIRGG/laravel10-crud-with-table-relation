<?php

use App\Http\Controllers\CobainController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/coba', [CobainController::class, 'index'])->name('coba');

Route::get('/', [LandingController::class, 'login'])->name('landing.login.index');
Route::post('/proses-login', [LandingController::class, 'loginProses'])->name('landing.login.index.proses-login');
Route::get('/proses-logout', [LandingController::class, 'logoutProses'])->name('landing.login.index.proses-logout');

Route::group(['middleware' => ['ceklogin']], function(){
    Route::get('/index', [LandingController::class, 'index'])->name('landing.index');

    Route::get('/role/index', [RoleController::class, 'roleShow'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'roleShowCreate'])->name('role.create');
    Route::get('/role/edit', [RoleController::class, 'roleShowEdit'])->name('role.edit');
    // Route::get('/role/detail', [RoleController::class, 'roleShowDetail'])->name('role.detail');
    Route::post('/role/proses-add', [RoleController::class, 'roleProsesAdd'])->name('role.proses-add');
    Route::post('/role/proses-edit', [RoleController::class, 'roleProsesEdit'])->name('role.proses-edit');
    Route::get('/role/proses-delete', [RoleController::class, 'roleProsesDelete'])->name('role.proses-delete');


    Route::get('/profile/index', [ProfileController::class, 'profileShow'])->name('profile.index');
    Route::get('/profile/create', [ProfileController::class, 'profileShowCreate'])->name('profile.create');
    Route::get('/profile/edit', [ProfileController::class, 'profileShowEdit'])->name('profile.edit');
    // Route::getprofilerole/detail', [ProfileController::class, 'profileShowDetail'])->name('profile.detail');
    Route::post('/profile/proses-add', [ProfileController::class, 'profileProsesAdd'])->name('profile.proses-add');
    Route::post('/profile/proses-edit', [ProfileController::class, 'profileProsesEdit'])->name('profile.proses-edit');
    Route::get('/profile/proses-delete', [ProfileController::class, 'profileProsesDelete'])->name('profile.proses-delete');


    Route::get('/post/index', [PostController::class, 'postShow'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'postShowCreate'])->name('post.create');
    Route::get('/post/edit', [PostController::class, 'postShowEdit'])->name('post.edit');
    // Route::getpost/detail', [PostController::class, 'postShowDetail'])->name('post.detail');
    Route::post('/post/proses-add', [PostController::class, 'postProsesAdd'])->name('post.proses-add');
    Route::post('/post/proses-edit', [PostController::class, 'postProsesEdit'])->name('post.proses-edit');
    Route::get('/post/proses-delete', [PostController::class, 'postProsesDelete'])->name('post.proses-delete');

});

