<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function point_account()
    {
        return $this->belongsTo(PointAccount::class, 'point_account_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id', 'id');
    }
}
