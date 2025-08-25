@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Create Campaign</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('campaigns.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Body *</label>
                            <textarea name="body" rows="5" class="form-control @error('body') is-invalid @enderror" required>{{ old('body') }}</textarea>
                            @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact List *</label>
                            <select name="contact_list_id" class="form-select @error('contact_list_id') is-invalid @enderror" required>
                                <option value="">-- choose --</option>
                                @foreach($contactLists as $list)
                                    <option value="{{ $list->id }}" {{ old('contact_list_id') == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                                @endforeach
                            </select>
                            @error('contact_list_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Campaign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection