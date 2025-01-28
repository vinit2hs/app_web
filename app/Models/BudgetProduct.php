<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function budget()
    {
        return $this->belongsTo(Budget::class, 'budget_id', 'id');
    }

    public function budget_products()
    {
        return $this->hasMany(BudgetProduct::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
