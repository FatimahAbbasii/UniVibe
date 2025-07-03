<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'category', 'image',
        'organizer', 'vibe_score', 'address', 'time'
    ];
}
