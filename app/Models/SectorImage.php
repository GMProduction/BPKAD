<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'sector_id',
        'image',
    ];
}
