<?php

use App\Http\Controllers\KaryawanController;
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

Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::post('karyawan/store', [KaryawanController::class, 'store']);
Route::get('karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::put('karyawan/update/{id}', [KaryawanController::class, 'update']);
Route::get('karyawan/delete/{id}', [KaryawanController::class, 'delete']);
Route::get('karyawan/export/{id}', [KaryawanController::class, 'export']);


