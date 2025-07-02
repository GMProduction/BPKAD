<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactProfile extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'social_media' => 'array'
    // ];

    protected $fillable = [
        'email',
        'address',
        'phone',
        'office_hours',
        'location',
        'instagram' => 'nullable|string|max:255',
        'twitter' => 'nullable|string|max:255',
        'facebook' => 'nullable|string|max:255',
        'youtube' => 'nullable|string|max:255',
    ];
}
