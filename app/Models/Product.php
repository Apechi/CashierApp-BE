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



    // $table->id();
    //         $table->unsignedBigInteger('category_id');
    //         $table->string('name', 255);
    //         $table->double('price');
    //         $table->integer('stock');
    //         $table->string('tag', 255);
    //         $table->string('image', 255);
    //         $table->timestamps();
    //         $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
}
