<?php

namespace App\Models;

use App\Enums\ProductCategoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'name',
        'description',
        'quantity',
        'category',
        'price',
        'min_order_qty',
        'photo_path',
    ];

    protected $casts = [
        'category' => ProductCategoryEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getCategoryLabelAttribute(){
        return ProductCategoryEnum::from($this->attributes['category'])->label;
    }
}
