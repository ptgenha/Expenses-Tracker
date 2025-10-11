@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style='color: white;'>Expenses</h2>
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">Add New Expense</a>
    </div>

    @if($expenses->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->title }}</td>
                        <td>{{ $expense->category->name }}</td>
                        <td>{{ number_format($expense->amount, 2) }}</td>
                        <td>{{ $expense->expense_date->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('expenses.show', $expense) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{ route('expenses.destroy', $expense) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total Expenses:</th>
                    <th>{{ number_format($expenses->sum('amount'), 2) }}</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    @else
        <p>No expenses found. <a href="{{ route('expenses.create') }}">Create your first expense</a>.</p>
    @endif
</div>
@endsection