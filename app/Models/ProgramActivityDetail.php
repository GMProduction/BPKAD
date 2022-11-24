<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramActivityDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_activity_id',
        'year',
        'type',
        'target'
    ];

    public function program_activity()
    {
        return $this->belongsTo(ProgramActivity::class, 'program_activity_id');
    }
}
