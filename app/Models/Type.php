<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    use HasFactory;


    public function menu(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
