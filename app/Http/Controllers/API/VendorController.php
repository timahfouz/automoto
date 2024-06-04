<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\API\VendorResource;
use App\Pipelines\Criterias\SearchVendorsPipeline;
use DB;
use Illuminate\Http\Request;

class VendorController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Vendor');
    }
    
    public function __invoke(Request $request)
    {
        $categoryID = $request->categoryID;
        $serviceID = $request->serviceID;
        $brandID = $request->brandID;
        $cityId = $request->cityId;
        $areaID = $request->areaID;
        $keyword = $request->keyword;

        $lat = $request->lat;
        $lon = $request->lon;
        // $distance = 5; // In in Kilometers

        // $places = DB::table('vendors')
        $query = $this->pipeline;

        $this->pipeline->pushPipeline(new SearchVendorsPipeline($request));

        if ($lat && $lon) {
            $query = $query->select('*',
                DB::raw('(6371 * 2 * ASIN(
                    SQRT(
                        POWER(SIN((RADIANS(geo_lat) - RADIANS(' . $lat . ')) / 2), 2) +
                        COS(RADIANS(' . $lat . ')) * COS(RADIANS(geo_lat)) * POWER(SIN((RADIANS(geo_lon) - RADIANS(' . $lon . ')) / 2), 2)
                    )
                )) AS distance')
            );
        }
        
        
        if ($serviceID) {
            $query = $query->whereHas('getServices', function ($sql) use ($serviceID) {
                $sql->where('services.id', $serviceID);
            });
        }
        if ($brandID) {
            $query = $query->whereHas('getBrands', function ($sql) use ($brandID) {
                $sql->where('brands.id', $brandID);
            });
        }
        
        if ($cityId) {
            $query = $query->where(['city_id' => $cityId,]);
        }
        if ($areaID) {
            $query = $query->where(['area_id' => $areaID,]);
        }
        if ($categoryID) {
            $query = $query->where('category_id', $categoryID);
        }
        
        if ($lat && $lon) {
            // $query->having('distance', '<=', $distance)
            $query->orderBY('distance', 'ASC');  
        }
        
        
        $data = $query->get();
        // return $query->toSql();
        // $data = $this->pipeline->where('service_id', $serviceID)->get();

        $response = VendorResource::collection($data);

        return jsonResponse(code: 200, message: 'done.', data: $response);
    }
}

