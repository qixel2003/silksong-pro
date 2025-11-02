<?php

use App\Http\Controllers\BuildController;
use App\Http\Controllers\contact;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Allow everyone to see the items index
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

// Restrict all other item routes to admins
Route::resource('items', ItemController::class)
    ->except(['index'])
    ->middleware(['auth', 'admin']);



//Route::resource('builds', BuildController::class);

Route::get('/builds', [BuildController::class, 'index'])->name('builds.index');
Route::get('/builds/create', [BuildController::class, 'create'])->middleware(['auth', 'check.login.count'])->name('builds.create');
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


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('/admin/user/{user}/toggle', [AdminController::class, 'toggleUser'])->name('admin.user.toggle');
    Route::patch('/admin/build/{build}/toggle', [AdminController::class, 'toggleBuild'])->name('admin.build.toggle');
});


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
