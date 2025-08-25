<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\UsersContactList;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /* Show the “Add Contact” form */
    public function create()
    {
        $contactLists = UsersContactList::orderBy('name')->get();
        return view('contacts.create', compact('contactLists'));
    }

    /* Store the new contact */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'contact_list_id' => 'required|exists:contact_lists,id',
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|max:255',
        ]);

        Contact::create($validated);

        return redirect()->route('dashboard')->with('success', 'Contact added.');
    }
}