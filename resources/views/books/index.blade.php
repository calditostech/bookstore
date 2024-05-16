@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Books</h1>

    <a href="{{ route('books.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus"></i> Add Book</a>
    <a href="{{ route('store.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add Store</a>

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>ISBN</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->value }}</td>
                    <td>
                        <a class="btn btn-primary me-1" href="{{ route('books.show', $book->id) }}"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
