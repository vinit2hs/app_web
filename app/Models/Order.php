<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function budget()
    {
        return $this->belongsTo(Budget::class, 'budget_id', 'id');
    }

    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id', 'id');
    }
}
