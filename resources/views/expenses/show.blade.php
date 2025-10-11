@extends('layouts.app')

@section('title', 'Expense Details')

@section('content')
<div style="color: white;" class="card">
    <div style="color: white; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 >Expense Details</h2>
        <div>
            <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back to Expenses</a>
        </div>
    </div>

    <div class="mb-3">
        <strong>Title:</strong> {{ $expense->title }}
    </div>
    
    <div class="mb-3">
        <strong>Category:</strong> 
        <a href="{{ route('categories.show', $expense->category) }}">{{ $expense->category->name }}</a>
    </div>

    <div class="mb-3">
        <strong>Amount:</strong> {{ number_format($expense->amount, 2) }}
    </div>

    <div class="mb-3">
        <strong>Expense Date:</strong> {{ $expense->expense_date->format('M d, Y') }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $expense->description ?? 'N/A' }}
    </div>

    <div class="mb-3">
        <strong>Created:</strong> {{ $expense->created_at->format('M d, Y H:i') }}
    </div>

    <div class="mb-3">
        <strong>Updated:</strong> {{ $expense->updated_at->format('M d, Y H:i') }}
    </div>
</div>
@endsection