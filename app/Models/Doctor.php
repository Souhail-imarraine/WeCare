<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialty',
        'consultation_price',
        'years_experience',
        'bio',
        'profile_image',
        'license_number',
        'is_verified',
        'available_days',
        'available_hours'
    ];

    protected $casts = [
        'available_days' => 'array',
        'available_hours' => 'array',
        'is_verified' => 'boolean',
    ];

    /**
     * Get the user that owns the doctor profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
