<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function city()
    {
        return $this->belongsTo(City::class, 'parent_id')->withDefault();
    }

    public function areas()
    {
        return $this->hasMany(City::class, 'parent_id');
    }
}
