<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\API\ReviewResource;
use Illuminate\Http\Request;

class ReviewController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Review');
    }
    
    public function __invoke($vendorID)
    {
        $data = $this->pipeline->where('vendor_id', $vendorID)->get();

        $response = ReviewResource::collection($data);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}


