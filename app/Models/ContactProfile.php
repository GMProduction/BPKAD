<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactProfile extends Model
{
    use HasFactory;

    protected $casts = [
        'social_media' => 'array'
    ];

    protected $fillable = [
      'email',
      'address',
      'phone',
      'office_hours',
      'location',
      'social_media'
    ];
}
