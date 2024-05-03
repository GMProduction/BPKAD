<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicService extends Model
{
    use HasFactory;

    protected $fillable = [
      'year',
      'quarter_1',
      'quarter_2',
      'quarter_3',
      'quarter_4',
    ];
}
