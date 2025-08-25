<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactListController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('campaigns', CampaignController::class)->except(['show']);
Route::resource('contact-lists', ContactListController::class)->except(['show']);
Route::resource('contacts', ContactController::class)->only(['create', 'store']);


Route::prefix('api')->group(function () {
    Route::get('campaigns', [\App\Http\Controllers\Api\CampaignApiController::class, 'index']);
    Route::get('campaigns/with-contacts', [\App\Http\Controllers\Api\CampaignApiController::class, 'withContacts']);
    Route::get('contacts', [\App\Http\Controllers\Api\ContactApiController::class, 'index']);

    Route::get('contact-lists/{contactList}/contacts',[\App\Http\Controllers\ContactListController::class, 'showContacts'])->name('contact-lists.contacts');
});