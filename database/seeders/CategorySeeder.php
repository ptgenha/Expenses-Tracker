<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Food & Dining'],
            ['name' => 'Transportation'],
            ['name' => 'Entertainment'],
            ['name' => 'Utilities'],
            ['name' => 'Healthcare'],
            ['name' => 'Shopping'],
            ['name' => 'Education'],
            ['name' => 'Travel'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}