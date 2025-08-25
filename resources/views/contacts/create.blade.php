@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add New Contact</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contacts.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="contact_list_id" class="form-label">Contact List *</label>
                            <select class="form-select @error('contact_list_id') is-invalid @enderror"
                                    id="contact_list_id" name="contact_list_id" required>
                                <option value="" disabled selected>-- choose list --</option>
                                @foreach (\App\Models\UsersContactList::orderBy('name')->get() as $list)
                                    <option value="{{ $list->id }}" {{ old('contact_list_id') == $list->id ? 'selected' : '' }}>
                                        {{ $list->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contact_list_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Contact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection