<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\API\VendorResource;
use Illuminate\Http\Request;

class JobController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Vendor');
    }
    
    public function __invoke(Request $request)
    {
        $data = $this->pipeline->where([
            'category_id' => $request->category_id,
            'city_id' => $request->city_id,
            'area_id' => $request->area_id,
            'is_new_job' => 1,
        ])->get();

        $response = VendorResource::collection($data);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}
