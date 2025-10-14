<?php

use App\Http\Controllers\contact;
use App\Http\Controllers\ProfileController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/items', function () {
    $items= Item::with('tags')->paginate(10);
    return view('items',
        ['items' => Item::all()
        ]);
})->name('items');

Route::get('/items/{id}', function (int $id) {
    $item = Item::find($id);
    return view('item', ['item' => $item]);
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
