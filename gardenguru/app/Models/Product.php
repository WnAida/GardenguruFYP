<?php

namespace App\Models;

use App\Enums\ProductCategoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'quantity',
        'category',
        'price',
        'min_order_qty',
        'photo_path',
    ];

    protected $casts = [
        'category' => ProductCategoryEnumEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
