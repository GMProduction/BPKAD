<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover',
        'is_highline',
        'type_article',
        'description',
        'slug',
        'date',
        'author_id'
    ];

    public function autor(){
        return $this->belongsTo(User::class,'author_id');
    }
}
