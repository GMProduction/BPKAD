<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector',
        'type_file',
        'url',
        'service_type',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
