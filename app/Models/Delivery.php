<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_id', 'id');
    }
    
    public function delivery_contract()
    {
        return $this->belongsTo(DeliveryContract::class, 'delivery_contract_id', 'id');
    }
}
