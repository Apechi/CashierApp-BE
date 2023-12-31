<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{

    protected $fillable = [
        'name',
        'price',
        'stock',
        'tag',
        'image',
        'category_id',
    ];

    use HasFactory;

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
