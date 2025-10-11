<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'expense_date',
        'category_id'
    ];

    protected $casts = [
        'expense_date' => 'date',
        'amount' => 'decimal:2'
    ];

    // Many-to-One relationship: Expense belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}