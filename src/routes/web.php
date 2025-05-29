<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/revise', [ContactController::class, 'revise']);
Route::get('/register', function () {
  return view('auth.register');
})->name('register');
Route::get('/login', function () {
  return view('auth.login');
})->name('login');
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
Route::post('/contacts/revise', [ContactController::class, 'revise'])->name('contacts.revise');
