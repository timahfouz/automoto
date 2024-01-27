<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\BrandsAlertRequest;
use App\Http\Resources\API\BrandResource;
use App\Http\Resources\API\BrandsAlertResource;
use Illuminate\Http\Request;

class BrandAlertController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Alarm');
    }
    
    public function __invoke(BrandsAlertRequest $request)
    {
        $user = getUser();
        
        $brands = $this->pipeline->setModel('Brand')->pluck('id')->toArray();

        $data = [];
        foreach ($brands as $brandID) {
            $active = in_array($brandID, $request->brands) ? 1 : 0;
            $data[] = [
                'brand_id' => $brandID,
                'user_id' => $user->id,
                'active_alert' => $active,
            ];
        }
        
        $this->pipeline->setModel('Alarm');

        $this->pipeline->where(['user_id' => $user->id])->delete();

        $this->pipeline->insert($data);
        
        $response = BrandsAlertResource::collection($user->alerts);

        return jsonResponse(code: 201, message: 'done.', data: $response);
    }
    
    public function index()
    {
        $user = getUser();
        
        $response = BrandsAlertResource::collection($user->alerts);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}