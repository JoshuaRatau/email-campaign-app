<?php

namespace App\Http\Controllers;

use App\Models\UsersContactList;
use Illuminate\Http\Request;

class ContactListController extends Controller
{
    /**
     *  GET  /contact-lists
     *  (not used in current flow, kept for completeness)
     */
    public function index()
    {
        $lists = UsersContactList::withCount('contacts')->latest()->get();
        return view('contact-lists.index', compact('lists'));
    }

    /**
     *  GET  /contact-lists/create
     */
    public function create()
    {
        return view('contact-lists.create');
    }

    /**
     *  POST  /contact-lists
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        UsersContactList::create($request->only('name'));

        return redirect()->route('dashboard')
                         ->with('success', 'Contact list created.');
    }

    /**
     *  GET  /contact-lists/{id}/edit
     */
    public function edit(UsersContactList $contactList)
    {
        return view('contact-lists.edit', compact('contactList'));
    }

    /**
     *  PUT/PATCH  /contact-lists/{id}
     */
    public function update(Request $request, UsersContactList $contactList)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $contactList->update($request->only('name'));

        return redirect()->route('dashboard')
                         ->with('success', 'Contact list updated.');
    }

    /**
     *  DELETE  /contact-lists/{id}
     */
    public function destroy(UsersContactList $contactList)
    {
        $contactList->delete();
        return redirect()->route('dashboard')
                         ->with('success', 'Contact list deleted.');
    }

    //View
    public function showContacts(UsersContactList $contactList)
{
    $contacts = $contactList->contacts()->latest()->get();
    return view('contact-lists.contacts', compact('contactList', 'contacts'));
}
}
