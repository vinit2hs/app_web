<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryContract extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shipping_company(){
        return $this->belongsTo(ShippingCompany::class, 'shipping_company_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
