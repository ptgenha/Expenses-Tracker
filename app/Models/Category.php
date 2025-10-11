<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    // One-to-Many relationship: Category has many expenses
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}