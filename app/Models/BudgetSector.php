<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetSector extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'sub_sector',
        'sub_sector_job',
    ];
}
