<?php

namespace App\Models;

use App\Enums\TransactionStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'amount',
        'bill_id',
        'status',
        'transactionable_id',
        'transactionable_type',
    ];

    protected $casts = [
        'status' => TransactionStatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
