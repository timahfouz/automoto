<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\CategoryResource;

class CategoryController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Category');
    }
    
    public function __invoke()
    {
        $data = $this->pipeline->where('visible', 1)->orderBy('order', 'DESC')->get();

        $response = CategoryResource::collection($data);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}
