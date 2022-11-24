<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'document'
    ];

    public function details()
    {
        return $this->hasMany(ProgramActivityDetail::class, 'program_activity_id');
    }
}
