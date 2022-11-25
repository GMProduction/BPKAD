<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'information_category_id',
        'year',
        'type',
        'target'
    ];

    public function information_category()
    {
        return $this->belongsTo(InformationCategory::class, 'information_category_id');
    }
}
