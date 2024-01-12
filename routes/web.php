<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ThingController;
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

Route::get('/', function () {
    return view('layout');
});

#auth
Route::get('/signup', [AuthController::class, 'create'])->name('signup');
Route::get('/signin', [AuthController::class, 'login'])->name('signin');
Route::post('/auth/signup', [AuthController::class, 'store']);
Route::post('/auth/signin', [AuthController::class, 'userLogin']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

#things
// Route::get('/things', [ThingController::class, 'show'])->name('things');
// Route::post('/thing', [ThingController::class, 'store']);
// Route::post('/thing/edit/', [ThingController::class, 'update']);
// Route::get("/things/{id}/edit", [ThingController::class, 'edit'])->name('edit_thing');
// Route::get('/my_things', [ThingController::class, 'user_things']);
Route::resource('things', ThingController::class);
Route::get('/my_things', [ThingController::class, 'user_things']);
Route::get('/create_thing', [ThingController::class, 'create'])->name('create_thing');
Route::get('/things', [ThingController::class, 'show'])->name('things');
// Route::get


#places
Route::resource('places', PlaceController::class);
Route::get('/places', [PlaceController::class, 'show'])->name('places');
// Route::post('/place', [PlaceController::class, 'store']);
Route::get('/create_place', [PlaceController::class, 'create'])->name('create_place');

#users
Route::get('/users', [ThingController::class, 'show_users']);