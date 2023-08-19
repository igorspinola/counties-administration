<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Municipio;

use App\Http\Controllers\MunicipioController;
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
    $municipios = Municipio::all();
    return view('welcome', ['municipios'=> $municipios]);
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post(
    '/municipios',
    [MunicipioController::class, 'create']
    )->name('municipio.create');

Route::delete(
    '/municipio/{id}',
    [MunicipioController::class, 'delete']
    )->name('municipio.delete');

Route::get('editar-municipio/{id}',  [MunicipioController::class, 'edit'])->name('municipio.edit');
Route::put('editar-municipio/{id}', [MunicipioController::class, 'update'])->name('municipio.update');
require __DIR__.'/auth.php';
