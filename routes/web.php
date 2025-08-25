<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
    //return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

Route::resource('contact-lists', \App\Http\Controllers\ContactListController::class)->except(['show']);

Route::resource('contacts', \App\Http\Controllers\ContactController::class)->except(['show','edit','update']);

Route::resource('campaigns', \App\Http\Controllers\CampaignController::class)->except(['show']);


//API

Route::get('campaigns', [\App\Http\Controllers\Api\CampaignApiController::class, 'index']);
Route::get('campaigns/with-contacts', [\App\Http\Controllers\Api\CampaignApiController::class, 'withContacts']);
Route::get('contacts', [\App\Http\Controllers\Api\ContactApiController::class, 'index']);


require __DIR__.'/auth.php';
