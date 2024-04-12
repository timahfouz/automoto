<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\API\CityResource;
use App\Pipelines\Criterias\FilterPlacesPipeline;
use Illuminate\Http\Request;
use App\Http\Controllers\API\InitController;

class AreaController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('City');
    }

    public function __invoke($id)
    {
        $this->pipeline->pushPipeline(new FilterPlacesPipeline());

        $data = $this->pipeline->where('parent_id', $id)->get();
        
        $response = CityResource::collection($data);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}