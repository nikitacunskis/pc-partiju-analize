<?php
// app/Models/Interaction.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'session_id', 'event', 'details', 'event_time'
    ];

    protected $casts = [
        'details' => 'array',
        'event_time' => 'datetime',
    ];
}