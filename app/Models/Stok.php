<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stok extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    use HasFactory;


    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
