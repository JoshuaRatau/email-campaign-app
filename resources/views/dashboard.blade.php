@extends('layouts.app')
@section('content')
<h1>Dashboard</h1>
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-6">
    <h3>Campaigns ({{ $campaigns->count() }})</h3>
    <a class="btn btn-primary mb-2" href="{{ route('campaigns.create') }}">+ New Campaign</a>
    <ul class="list-group">
      @foreach($campaigns as $c)
        <li class="list-group-item d-flex justify-content-between">
          <span>{{ $c->title }} → <strong>{{ $c->contactList->name }}</strong></span>
          <div>
            <a href="{{ route('campaigns.edit', $c) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <form action="{{ route('campaigns.destroy', $c) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </div>
        </li>
      @endforeach
    </ul>
  </div>

  <div class="col-md-6">
    <h3>Contact Lists ({{ $contactLists->count() }})</h3>
    <a class="btn btn-success mb-2" href="{{ route('contact-lists.create') }}">+ New List</a>
    <ul class="list-group">
      @foreach($contactLists as $list)
        <li class="list-group-item d-flex justify-content-between">
          <span>{{ $list->name }} ({{ $list->contacts->count() }} contacts)</span>
          <div>
            <a href="{{ route('contact-lists.edit', $list) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
@endsection
