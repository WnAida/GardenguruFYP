<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RegistrationStatusEnum;
use App\Enums\UserExpertiseEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'profile_photo_path',
        'expertise',
        // 'registration_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'expertise' => UserExpertiseEnum::class,
        // 'registration_status' => RegistrationStatusEnum::class,
    ];

    public function vegetables()
    {
        return $this->hasMany(Vegetable::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function isSeller(): bool
    {
        return $this->seller()->exists();
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getExpertiseLabelAttribute(){
        return UserExpertiseEnum::from($this->attributes['expertise'])->label;
    }

    // public function getRegistrationStatusLabelAttribute(){
    //     return RegistrationStatusEnum::from($this->attributes['registration_status'])->label;
    // }

}
