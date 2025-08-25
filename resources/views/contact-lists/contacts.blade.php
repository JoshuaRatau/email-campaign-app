@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Contacts in “{{ $contactList->name }}” ({{ $contacts->count() }})</h4>
        <a href="{{ route('contacts.create', ['list' => $contactList->id]) }}"
           class="btn btn-primary btn-sm">+ Add Contact</a>
    </div>

    @if($contacts->isEmpty())
        <div class="alert alert-info">No contacts yet.</div>
    @else
        <ul class="list-group">
            @foreach($contacts as $contact)
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <strong>{{ $contact->name }}</strong>
                        <br>
                        <small class="text-muted">{{ $contact->email }}</small>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection