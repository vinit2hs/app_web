<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function sellers(): HasMany
    {
        return $this->hasMany(Seller::class);
    }

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class, 'store_id', 'id');
    }
}
