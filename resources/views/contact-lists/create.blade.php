@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create Contact List</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contact-lists.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">List Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save List</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection