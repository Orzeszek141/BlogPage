<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('/kontakt', [App\Http\Controllers\KontaktControl::class, 'index'])->name('kontakt');
Route::get('/category', [App\Http\Controllers\FormControl::class, 'index'])->name('category');
Route::get('/form', [App\Http\Controllers\FormControl::class, 'create'])->name('formularz');
Route::get('/recenzje/{id_title}', [App\Http\Controllers\FormControl::class, 'show_category'])->name('recenzje');

Route::group(['middleware' => 'auth'], function () {

Route::get('/profil', [App\Http\Controllers\FormControl::class, 'profil'])->name('profil');

Route::post('/form', [App\Http\Controllers\FormControl::class, 'store'])->name('store');
Route::get('/delete/{id}',[App\Http\Controllers\FormControl::class,'destroy'])->name('delete');
Route::get('/edit/{id}', [App\Http\Controllers\FormControl::class,'edit'])->name('edit');
Route::put('/update/{id}', [App\Http\Controllers\FormControl::class,'update'])->name('update');

Route::get('/comments/{id}', [App\Http\Controllers\CommentsControl::class, 'create'])->name('comments_creatore');
Route::post('/comments', [App\Http\Controllers\CommentsControl::class, 'store'])->name('store_comments');
Route::get('/delete_comment/{id}',[App\Http\Controllers\CommentsControl::class,'destroy'])->name('delete_comment');

Route::post('/passwordEdit', [App\Http\Controllers\FormControl::class, 'password_change'])->name('passwordEdit');
Route::get('/passwordForm', [App\Http\Controllers\FormControl::class, 'password_form'])->name('passwordForm');
});