<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicAgencyInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'information',
        'type',
        'target'
    ];
}
