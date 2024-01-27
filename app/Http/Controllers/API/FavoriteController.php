<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\API\FavoriteResource;
use App\Http\Resources\API\VendorResource;
use Illuminate\Http\Request;

class FavoriteController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Favorite');
    }
    
    public function __invoke($vendorID)
    {
        $vendor = $this->pipeline->setModel('Vendor')->find($vendorID);
        if (!$vendor) {
            return jsonResponse(code: 404, message: 'not found!');
        }

        $user = getUser();

        $data = [
            'vendor_id' => $vendorID,
            'user_id' => $user->id,
        ];

        $this->pipeline->setModel('Favorite');
        
        $existed = $this->pipeline->where($data)->first();
        
        if ($existed) {
            $existed->delete();
            $message = 'deleted from favorites';
        } else {
            $this->pipeline->create($data);
            $message = 'added to favorites';
        }

        $response = VendorResource::collection($user->favorites);

        return jsonResponse(code: 201, message: $message, data: $response);
    }
    
    public function index()
    {
        $user = getUser();
        
        $response = VendorResource::collection($user->favorites);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}


