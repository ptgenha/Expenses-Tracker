@extends('layouts.app')

@section('title', 'Edit Expense')

@section('content')
<div class="card">
    <h2 style="color: white;">Edit Expense</h2>

    <form method="POST" action="{{ route('expenses.update', $expense) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $expense->title) }}" required>
            @error('title')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Category *</label>
            <select id="category_id" name="category_id" class="form-control" required style="background:#fff !important;color:#22223b !important;border:1px solid #6366f1 !important;">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $expense->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="amount">Amount *</label>
            <input type="number" id="amount" name="amount" class="form-control" step="0.01" min="0.01" value="{{ old('amount', $expense->amount) }}" required>
            @error('amount')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="expense_date">Expense Date *</label>
            <input type="date" id="expense_date" name="expense_date" class="form-control" value="{{ old('expense_date', $expense->expense_date->format('Y-m-d')) }}" required>
            @error('expense_date')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $expense->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Update Expense</button>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection