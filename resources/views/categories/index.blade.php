@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div style="color: white;" class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style='color: white;'>Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
    </div>

    @if($categories->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Expenses Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->expenses_count }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{ route('categories.destroy', $category) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No categories found. <a href="{{ route('categories.create') }}">Create your first category</a>.</p>
    @endif
</div>
@endsection