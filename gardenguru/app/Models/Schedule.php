<?php

namespace App\Models;

use App\Enums\ScheduleStageEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'location',
        'planted_at',
        'notes',
        'stage',
        'seed',
        'photo_path',
    ];

    protected $casts = [
        'planted_at' => 'datetime',
        'stage' => ScheduleStageEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
