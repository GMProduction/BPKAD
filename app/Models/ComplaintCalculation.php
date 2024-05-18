<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'total',
        'process',
        'finish'
    ];
}
