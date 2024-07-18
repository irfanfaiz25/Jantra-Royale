<?php

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
    return view('user.user');
})->name('main-page');

Route::get('/dashboard', function () {
    return view('admin.dashboard', [
        'active_link' => 'dashboard'
    ]);
})->name('dashboard')->middleware('auth');

Route::get('/question-data/{category}', function ($category) {
    return view('admin.question-data', [
        'category' => $category,
        'active_link' => $category,
        'tab' => 'question'
    ]);
})->name('question-data')->middleware('auth');

Route::get('/add-question', function () {
    return view('admin.add-question', [
        'active_link' => 'question-data',
        'tab' => 'question'
    ]);
})->name('add-question')->middleware('auth');

Route::get('question-data/{id}/edit', function ($id) {
    return view('admin.edit-question', [
        'id' => $id,
        'active_link' => 'question-data'
    ]);
})->name('edit-question')->middleware('auth');

Route::get('/responden-data', function () {
    return view('admin.responden-data', [
        'active_link' => 'responden-data'
    ]);
})->name('responden-data')->middleware('auth');

Route::get('/hasil', function () {
    return view('admin.result-data', [
        'active_link' => 'result-data',
    ]);
})->name('result-data')->middleware('auth');

Route::get('/admin', function () {
    return view('auth.login');
})->name('login')->middleware('guest');
