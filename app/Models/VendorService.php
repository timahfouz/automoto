<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id')->withDefault();
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id')->withDefault();
    }
}
