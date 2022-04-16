<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelompokStudiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserdetailController;
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
})->name('landing');



Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');

Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan/create', [JurusanController::class, 'store']);

Route::get('/jurusan/edit/{id}',[JurusanController::class,'edit'])->name('jurusan.edit');
Route::patch('/jurusan/edit/{id}', [JurusanController::class, 'update'])->name('jurusan.update');

Route::delete('/jurusan/destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');        




Route::get('/kelompokstudi', [KelompokStudiController::class, 'index'])->name('kelompokstudi.index');

Route::get('/kelompokstudi/create', [KelompokStudiController::class, 'create'])->name('kelompokstudi.create');
Route::post('/kelompokstudi/create', [KelompokStudiController::class, 'store']);

Route::get('/kelompokstudi/edit/{id}',[KelompokStudiController::class,'edit'])->name('kelompokstudi.edit');
Route::patch('/kelompokstudi/edit/{id}', [KelompokStudiController::class, 'update'])->name('kelompokstudi.update');

Route::delete('/kelompokstudi/destroy/{id}', [KelompokStudiController::class, 'destroy'])->name('kelompokstudi.destroy');  




Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/create', [MahasiswaController::class, 'store']);

Route::get('/mahasiswa/edit/{id}',[MahasiswaController::class,'edit'])->name('mahasiswa.edit');
Route::patch('/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

Route::delete('/mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');  




Route::get('/userdetail', [UserdetailController::class, 'index'])->name('userdetail.index');

Route::get('/userdetail/create', [UserdetailController::class, 'create'])->name('userdetail.create');
Route::post('/userdetail/create', [UserdetailController::class, 'store']);

Route::get('/userdetail/edit/{id}',[UserdetailController::class,'edit'])->name('userdetail.edit');
Route::patch('/userdetail/edit/{id}', [UserdetailController::class, 'update'])->name('userdetail.update');

Route::delete('/userdetail/destroy/{id}', [UserdetailController::class, 'destroy'])->name('userdetail.destroy');  