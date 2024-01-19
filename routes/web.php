<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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




Route::view('/','home')->name('home');
Route::view('/about','about')->name('about');





Route::get('/portfolio', ProjectController::class)->name('projects.index');

Route::get('/portfolio/crear', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/portfolio/{project}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/portfolio/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::post('/portfolio', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/portfolio/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::delete('/portafolio/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');


Route::patch('portafolio/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
Route::delete('portafolio/{project}/forceDelete', [ProjectController::class, 'forceDelete'])->name('projects.forceDelete');

Route::get('categorias/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::view('/contact','contact')->name('contact');

Route::post('/contact', [MessageController::class, 'store'])->name('messages.store');


Auth::routes(['register'=> false]);


