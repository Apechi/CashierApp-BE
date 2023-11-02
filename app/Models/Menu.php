<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    use HasFactory;


    public function jenis(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class);
    }
}
