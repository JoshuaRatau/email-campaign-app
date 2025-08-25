<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard', [
            'campaigns' => \App\Models\Campaign::with('contactList')->latest()->get(),
            'contactLists' => \App\Models\ContactList::withCount('contacts')->get(),
        ]);
    }
}
