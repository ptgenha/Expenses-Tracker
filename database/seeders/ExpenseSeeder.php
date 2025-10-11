<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExpenseSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        
        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Please run CategorySeeder first.');
            return;
        }

        $expenses = [
            ['title' => 'Grocery Shopping', 'amount' => 85.50, 'category_name' => 'Food & Dining'],
        ];

        foreach ($expenses as $expenseData) {
            $category = $categories->where('name', $expenseData['category_name'])->first();
            
            if ($category) {
                Expense::create([
                    'title' => $expenseData['title'],
                    'description' => 'Sample expense for ' . $expenseData['title'],
                    'amount' => $expenseData['amount'],
                    'expense_date' => Carbon::now()->subDays(rand(1, 30)),
                    'category_id' => $category->id,
                ]);
            }
        }
    }
    
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('expenses.create', compact('categories'));
    }
}