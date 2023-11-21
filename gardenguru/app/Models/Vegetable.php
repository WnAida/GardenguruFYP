<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetable extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        'name',
        'description',
        'note',
        'photo',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function pests()
    {
        return $this->belongsToMany(Pest::class);
    }

    public function guidances()
    {
        return $this->belongsToMany(Guidance::class);
    }

}
