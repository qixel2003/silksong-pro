<?php

use App\Http\Controllers\BuildController;
use App\Http\Controllers\contact;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('items', ItemController::class);//->middleware(['auth', 'admin'])
//->middleware(['auth', 'admin']);


//Route::resource('builds', BuildController::class);

Route::get('/builds', [BuildController::class, 'index'])->name('builds.index');
Route::get('/builds/create', [BuildController::class, 'create'])->middleware('auth')->name('builds.create');
Route::post('/builds', [BuildController::class, 'store'])->name('builds.store');
Route::get('/builds/{build}', [BuildController::class, 'show'])->name('builds.show');
Route::get('/builds/{build}/edit', [BuildController::class, 'edit'])
    ->middleware('auth')
    ->can('edit-build','build')
    ->name('builds.edit');
Route::patch('/builds/{build}', [BuildController::class, 'update'])
    ->middleware('auth')
    ->can('update-build','build')
    ->name('builds.update');
Route::delete('/builds/{build}', [BuildController::class, 'destroy'])
    ->middleware('auth')
    ->can('destroy-build','build')->name('builds.destroy');



Route::get('/contact', [contact::class, 'show'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
