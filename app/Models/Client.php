<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function document_type()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
