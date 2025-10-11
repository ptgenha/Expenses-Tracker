@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="card">
    <h2 style="color: white;">Edit Category</h2>

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Category Name *</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Update Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection