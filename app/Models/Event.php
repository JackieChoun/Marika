<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title',
        'type',
        'date_start',
        'date_end',
        'location',
        'description',
        'external_link',
        'image_path',
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
    ];

    public function isMasterclass(): bool
    {
        return $this->type === 'stage';
    }

    public function isExposition(): bool
    {
        return $this->type === 'exposition';
    }
}