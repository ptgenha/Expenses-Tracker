<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('category')->orderBy('expense_date', 'desc')->get();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'expense_date' => 'required|date',
            'category_id' => 'required|exists:categories,id'
        ]);

        Expense::create($request->all());

        return redirect()->route('expenses.index')
            ->with('success', 'Expense created successfully.');
    }

    public function show(Expense $expense)
    {
        $expense->load('category');
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $categories = Category::all();
        return view('expenses.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'expense_date' => 'required|date',
            'category_id' => 'required|exists:categories,id'
        ]);

        $expense->update($request->all());

        return redirect()->route('expenses.index')
            ->with('success', 'Expense updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense deleted successfully.');
    }
}