<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function volume()
    {
        return $this->belongsTo(Volume::class,'volume_id');
    }
}
