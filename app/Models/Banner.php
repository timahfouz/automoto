<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }
}
