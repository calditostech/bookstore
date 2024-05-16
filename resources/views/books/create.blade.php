@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Add Book</h1>
    <a href="{{ route('books.index') }}" class="btn btn-success mb-3"><i class="bi bi-eye"></i> Table Book</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="number" step="0.01" class="form-control" id="value" name="value" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

