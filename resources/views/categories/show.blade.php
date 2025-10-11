@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
<div style="color: white;"class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Category Details</h2>
        <div>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
        </div>
    </div>

    <div class="mb-3">
        <strong>Name:</strong> {{ $category->name }}
    </div>
    

    <div class="mb-3">
        <strong>Created:</strong> {{ $category->created_at->format('M d, Y H:i') }}
    </div>

    <div class="mb-3">
        <strong>Updated:</strong> {{ $category->updated_at->format('M d, Y H:i') }}
    </div>
</div>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="color: white;">Expenses in this Category ({{ $category->expenses->count() }})</h3>
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">Add New Expense</a>
    </div>

    @if($category->expenses->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->expenses as $expense)
                    <tr>
                        <td>{{ $expense->title }}</td>
                        <td>{{ number_format($expense->amount, 2) }}</td>
                        <td>{{ $expense->expense_date->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('expenses.show', $expense) }}" class="btn btn-secondary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total:</th>
                    <th>{{ number_format($category->expenses->sum('amount'), 2) }}</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    @else
        <p>No expenses found in this category.</p>
    @endif
</div>
@endsection