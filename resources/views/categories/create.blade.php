@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="card">
    

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="name">Category Name *</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-success">Create Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection