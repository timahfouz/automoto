<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\API\ServiceResource;
use Illuminate\Http\Request;

class ServiceController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Service');
    }
    
    public function __invoke($categoryID)
    {
        $data = $this->pipeline->where('category_id', $categoryID)->get();

        $response = ServiceResource::collection($data);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}
