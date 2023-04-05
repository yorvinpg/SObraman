<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OTController;

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
// Route::get('admin/entorno',[OTController::class, 'index'])->name('entorno.index');

Route::get('admin/entorno/consulta',[OTController::class, 'index'])->name('entorno.index');
Route::post('admin/entorno/consulta',[OTController::class, 'store'])->name('entorno.store');
Route::get('admin/entorno/create',[OTController::class, 'create'])->name('entorno.create');
Route::get('admin/entorno/{sol}',[OTController::class, 'show'])->name('entorno.show');
Route::get('export-entorno',[OTController::class, 'exportExcel'])->name('entorno.exportExcel');

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
});

