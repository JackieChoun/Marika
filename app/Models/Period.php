<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
     protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'description',
        'image_path',
    ];

    public function paintings()
    {
        return $this->hasMany(Painting::class);
    }
}
