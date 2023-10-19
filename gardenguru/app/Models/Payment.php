<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'transaction_id',
        'user_id',
    ];

    public function vegetables()
    {
        return $this->belongsTo(Vegetable::class);
    }

    public function transation()
    {
        return $this->hasOne(Transaction::class);
    }
}
