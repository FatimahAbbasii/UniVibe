<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'name', 'description', 'category', 'image',
        'organizer', 'vibe_score', 'address', 'time'
    ];
}
