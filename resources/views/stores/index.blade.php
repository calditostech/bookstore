@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Store</h1>

    <a href="{{ route('books.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus"></i> Add Book</a>
    <a href="{{ route('store.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add Store</a>

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
                <tr>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->address }}</td>
                    <td>{{ $store->active ? 'Disponível' : 'Indisponível' }}</td>
                    <td>
                        <a class="btn btn-primary me-1" href="{{ route('stores.show', $store->id) }}"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display: inline-block;">
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
