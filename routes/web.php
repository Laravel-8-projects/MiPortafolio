<?php

use App\Http\Controllers\Admin\ExtrasController;
use App\Http\Controllers\Admin\ProyectoController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\User\ContactController;
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
//USER
Route::resource('contactos', ContactController::class);
Route::get('/',[\App\Http\Controllers\User\PortafolioController::class , 'index'])->name('template.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ADMIN
Route::resource('proyectos', ProyectoController::class);
Route::get('admin/contactos',[\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contactos.index');
Route::delete('admin/{id}/contactos',[\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('admin.contact.destroy');
Route::resource('extras', ExtrasController::class);
Route::resource('knowledges', \App\Http\Controllers\Admin\FameController::class);

