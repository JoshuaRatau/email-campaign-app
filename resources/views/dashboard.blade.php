@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
      
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Campaigns ({{ $campaigns->count() }})</h4>
                <a href="{{ route('campaigns.create') }}" class="btn btn-primary btn-sm">+ New Campaign</a>
            </div>
            <ul class="list-group">
                @forelse($campaigns as $campaign)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $campaign->title }}</strong>
                            <br>
                            <small class="text-muted">List: {{ $campaign->contactList->name }}</small>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('campaigns.edit', $campaign) }}" class="btn btn-outline-secondary">Edit</a>
                            <form action="{{ route('campaigns.destroy', $campaign) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger"
                                        onclick="return confirm('Delete this campaign?')">Delete</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No campaigns yet.</li>
                @endforelse
            </ul>
        </div>

 
<div class="col-md-6">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Contact Lists ({{ $contactLists->count() }})</h4>
        <a href="{{ route('contact-lists.create') }}" class="btn btn-success btn-sm">+ New List</a>
    </div>
    <ul class="list-group">
        @forelse($contactLists as $list)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $list->name }}</strong>
                    <br>
                    <small class="text-muted">{{ $list->contacts_count }} contacts</small>
                </div>
                <div class="btn-group btn-group-sm">
                   
                    <a href="{{ route('contacts.create', ['list' => $list->id]) }}"
                       class="btn btn-outline-primary btn-sm">
                        + Add Contact
                    </a>
                  <a href="{{ route('contact-lists.contacts', $list) }}"
   class="btn btn-outline-info btn-sm">
   View Contacts
</a>
                </div>
            </li>
        @empty
            <li class="list-group-item text-muted">No lists yet.</li>
        @endforelse
    </ul>
</div>
@endsection