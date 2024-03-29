<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_masjid',
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
    ];

    /**
     * Get the profile associated with the User
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'id_user', 'id');
    }

    /**
     * Get the masjid that owns the User
     *
     * @return BelongsTo
     */
    public function masjid(): BelongsTo
    {
        return $this->belongsTo(Masjid::class, 'id_masjid', 'id');
    }

    /**
     * Get all of the santri for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function santri(): HasMany
    {
        return $this->hasMany(Profile::class, 'id_khidmat', 'id');
    }
}
