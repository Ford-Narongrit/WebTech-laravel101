<?php

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('tasks', \App\Http\Controllers\TaskController::class);
Route::resource('tags', \App\Http\Controllers\TagController::class)->middleware('auth');
Route::get('tag/{slug}', [\App\Http\Controllers\TagController::class, 'showBySlug'])->name('tags.slug');

require __DIR__ . '/auth.php';
