<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\API\BrandResource;
use Illuminate\Http\Request;
use App\Http\Resources\API\CategoryResource;

class BrandController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Brand');
    }
    
    public function __invoke()
    {
        $data = $this->pipeline->get();

        $response = BrandResource::collection($data);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}

