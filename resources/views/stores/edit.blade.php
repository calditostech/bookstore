@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Store</h1>
    <a href="{{ route('stores.index') }}" class="btn btn-success mb-3"><i class="bi bi-eye"></i> Table Store</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('stores.update', $store->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $store->name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $store->address }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="active" name="active" {{ $store->active ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
