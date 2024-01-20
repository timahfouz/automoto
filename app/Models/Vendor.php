<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    // name	geo_lat	geo_lon	phone	whatsapp	bio	category_id	image_id	bg_image_id	service_id	

    protected $guarded = ['id'];
    // protected $casts = [
    //     'start_time' => 'datetime',
    //     'end_time' => 'datetime',
    // ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withDefault();
    }

    public function area()
    {
        return $this->belongsTo(City::class, 'area_id')->withDefault();
    }
    
    public function services()
    {
        return $this->hasMany(VendorService::class, 'vendor_id');
    }
    public function brands()
    {
        return $this->hasMany(VendorBrand::class, 'vendor_id');
    }


    public function getServices()
    {
        return $this->belongsToMany(Service::class, VendorService::class, 'vendor_id', 'service_id');
    }
    public function getBrands()
    {
        return $this->belongsToMany(Brand::class, VendorBrand::class, 'vendor_id', 'brand_id');
    }


    protected static function boot() {
		parent::boot();
		static::deleting(function($model) {
			$model->services()->delete();
			$model->brands()->delete();
		});
	}
}
