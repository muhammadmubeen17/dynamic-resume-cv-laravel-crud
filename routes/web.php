<?php

use App\Http\Controllers\Userprofile;
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

Route::get('/', [Userprofile::class, 'index'])->name('index');
Route::get('/user/{id}', [Userprofile::class, 'view'])->name('user.profile.view');
Route::get('/create', [Userprofile::class, 'create'])->name('user.profile.create');
Route::post('/store', [Userprofile::class, 'store'])->name('store');
Route::get('/edit/{id}', [Userprofile::class, 'edit'])->name('edit');
Route::post('/update', [Userprofile::class, 'update'])->name('update');
Route::post('/destroy/{id}', [Userprofile::class, 'destroy'])->name('destroy');