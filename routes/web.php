<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\Admin\OrtuController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Admin\Controller;
use App\Http\Controllers\SPPController;

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



Auth::routes(['register'=>false]);

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::resource('guru', TeacherController::class);
Route::resource('jurusan', MajorController::class);
Route::resource('kelas', ClassroomController::class);
Route::resource('siswa', StudentController::class);

Route::resource('mapel', SubjectController::class);
Route::get('mapel/filter/kelompok', [SubjectController::class, 'filter'])->name('mapel.filter');

Route::resource('ortu', OrtuController::class);
route::get('siswa/{id}/orang-tua', [OrtuController::class, 'orang_tua'])->name('orang-tua.index');
route::get('siswa/{id}/orang-tua/create', [OrtuController::class, 'orang_tua'])->name('orang-tua.create');
route::get('siswa/{id}/orang-tua/{id_ortu}/edit', [OrtuController::class, 'orang_tua'])->name('orang-tua.edit');

Route::resource('SPP', SPPController::class);


