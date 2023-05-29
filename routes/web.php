<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::get('/add', [StudentController::class, 'create'])->name('add');
Route::post('/add/send', [StudentController::class, 'store'])->name('send');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [StudentController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
Route::get('/trash', [StudentController::class, 'trash'])->name('trash');
Route::get('/trash/restore/{id}', [StudentController::class, 'restore'])->name('restore');
Route::get('/trash/delete/permanent/{id}', [StudentController::class, 'permanent'])->name('permanent');
