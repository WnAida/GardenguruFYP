<?php

namespace App\Models;

use App\Enums\EventActionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'do_at',
        'schedule_id',
    ];

    protected $casts = [
        'do_at' => 'datetime',
        'action' => EventActionEnum::class,
    ];

    public function schedule()
    {
        return $this->BelongsTo(Schedule::class);
    }
}
