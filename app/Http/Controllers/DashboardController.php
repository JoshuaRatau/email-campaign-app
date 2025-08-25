<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\UsersContactList;
use App\Models\Campaign;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'campaigns'    => Campaign::with('contactList')->latest()->get(),
            'contactLists' => UsersContactList::withCount('contacts')->get(),
        ]);
    }
}