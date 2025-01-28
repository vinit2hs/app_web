<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function volume()
    {
        return $this->belongsTo(Volume::class, 'volume_id');
    }

    public function budget_products()
    {
        return $this->belongsTo(BudgetProduct::class, 'id', 'product_id')
            ->where('budget_id', 61);
    }
}
