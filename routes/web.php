<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Island\Contact\IslandContact;
use App\Http\Controllers\Web\Island\IslandController;
use App\Http\Controllers\Web\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	// users
	Route::resource('users', UserController::class);

	// islands
	Route::prefix('islands')->name('islands.')->group( function() {
		
		Route::get('/{island}/contacts', IslandContact::class)->name('contacts');

	});
	Route::resource('islands', IslandController::class);

});

require __DIR__ . '/auth.php';
