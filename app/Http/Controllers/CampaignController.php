<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\UsersContactList;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
      $campaigns = Campaign::with('contactList')->latest()->get();

        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $userContactLists = UsersContactList::orderBy('name')->get();
        return view('campaigns.create', compact('userContactLists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'body'             => 'required|string',
            'contact_list_id'  => 'required|exists:contact_lists,id',
        ]);

        Campaign::create($validated);

        return redirect()->route('dashboard')->with('success', 'Campaign created.');
    }

  public function edit(Campaign $campaign)
{
    $contactLists = UsersContactList::orderBy('name')->get();
    return view('campaigns.edit', compact('campaign', 'contactLists'));
}
    public function update(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'body'             => 'required|string',
            'contact_list_id'  => 'required|exists:contact_lists,id',
        ]);

        $campaign->update($validated);

        return redirect()->route('dashboard')->with('success', 'Campaign updated.');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('dashboard')->with('success', 'Campaign deleted.');
    }
}