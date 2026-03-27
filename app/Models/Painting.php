<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'height',
        'width',
        'technique',
        'price',
        'is_available',
        'image_path',
        'period_id',
    ];

    protected $casts = [
    'height' => 'integer',
    'width' => 'integer',
    'is_available' => 'boolean',
    ];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}

