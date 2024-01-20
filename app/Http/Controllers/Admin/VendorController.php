<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Requests\Admin\Vendors\CreateRequest;
use App\Http\Requests\Admin\Vendors\UpdateRequest;
use App\Pipelines\Criterias\SearchVendorsPipeline;
use Illuminate\Http\Request;

class VendorController extends CRUDController
{
    protected $model = 'Vendor';
    protected $index_route = 'admin.vendors.index';
    protected $delete_route = 'admin.vendors.destroy';
    
    protected $index_view = 'admin.vendors.index';
    protected $edit_view = 'admin.vendors.edit';
    protected $create_view = 'admin.vendors.create';

    protected $store_request = CreateRequest::class;
    protected $update_request = UpdateRequest::class;

    protected $has_files = true;

    public function __construct()
    {
        parent::__construct();
        if(in_array(\Request::route()->getName(), ["admin.vendors.create","admin.vendors.edit"])) {
            $cities = $this->pipeline->setModel('City')->whereNull('parent_id')->get();
            $areas = $this->pipeline->setModel('City')->whereNotNull('parent_id')->get();
            $categories = $this->pipeline->setModel('Category')->get();
            $brands = $this->pipeline->setModel('Brand')->get();
            $services = $this->pipeline->setModel('Service')->get();

            View::share('cities', $cities);
            View::share('areas', $areas);
            View::share('categories', $categories);
            View::share('brands', $brands);
            View::share('services', $services);
        }
    }

    public function index(Request $request)
    {
        $items = $this->pipeline->setModel($this->model)
            ->pushPipeline([new SearchVendorsPipeline($request)])
            ->get();
        
        $delte_route = $this->delete_route ?? null;
        
        return view($this->index_view, compact('items','delte_route'));
    }
    
    public function store()
    {
        $request = app($this->store_request);

        $data = $request->validated();
        
        $geo = $this->getGeoLocation($request->geo_url);
        $data['geo_lat'] = $geo['geo_lat'];
        $data['geo_lon'] = $geo['geo_lon'];

        $type = $data['service_type'] ?? null;
        $data['is_new_job'] = $type == 'is_new_job';
        $data['is_driver'] = $type == 'is_driver';
        unset($data['service_type']);

        if ($this->has_files) {
            $this->storeData($request, $data);
        }

        $vendor = $this->pipeline->setModel($this->model)->create($data);

        $allBrands = false;
        if (in_array(-1, $request->brands)) {
            $allBrands = true;
        }
        
        $this->saveBrands($vendor, $request->brands ?? [], $allBrands);
        $this->saveServices($vendor, $request->services ?? []);

        return redirect()->route($this->index_route)->with(['success' => 'Greeting']);
    }

    public function update($id)
    {
        $request = app($this->update_request);
        
        $data = $request->validated();

        $geo = $this->getGeoLocation($request->geo_url);
        $data['geo_lat'] = $geo['geo_lat'];
        $data['geo_lon'] = $geo['geo_lon'];

        $type = $data['service_type'] ?? null;
        $data['is_new_job'] = $type == 'is_new_job';
        $data['is_driver'] = $type == 'is_driver';
        
        unset($data['service_type']);

        $vendor = $this->pipeline->setModel($this->model)->findOrFail($id);

        if ($this->has_files) {
            $this->updateData($request, $data, $vendor);
        }
        
        $vendor->update($data);

        $allBrands = false;
        if (in_array(-1, $request->brands)) {
            $allBrands = true;
        }
        
        $this->saveBrands($vendor, $request->brands ?? [], $allBrands);
        $this->saveServices($vendor, $request->services ?? []);

        return redirect()->route($this->index_route);
    }

    protected function storeData($request, &$data)
    {
        if ($request->hasFile('image')) {
            $imageID = resizeImage($request->image, 'uploads', [200, 200]);
            $data['image_id'] = $imageID;
        }
        if ($request->hasFile('bg_image')) {
            $imageID = resizeImage($request->bg_image, 'uploads', [300, 200]);
            $data['bg_image_id'] = $imageID;
        }
    }

    protected function updateData($request, &$data, $item)
    {
        if ($request->hasFile('image')) {
            $imageID = resizeImage($request->image, 'uploads', [200, 200]);
            $data['image_id'] = $imageID;
        }
        if ($request->hasFile('bg_image')) {
            $imageID = resizeImage($request->bg_image, 'uploads', [300, 200]);
            $data['bg_image_id'] = $imageID;
        }
    }

    private function getGeoLocation($url)
    {
        $latitude = 0;
        $longitude = 0;

        preg_match('/@([0-9.-]+),([0-9.-]+)/', $url, $matches);

        if (count($matches) == 3) {
            $latitude = $matches[1];
            $longitude = $matches[2];
        }
        return [
            'geo_lat' => $latitude,
            'geo_lon' => $longitude
        ];
    }

    private function saveBrands($vendor, $brands, $allBrands = false)
    {
        if ($allBrands) {
            $brands = $this->pipeline->setModel('Brand')->pluck('id')->toArray();
        }
        
        $brandData = [];
        foreach($brands as $brand) {
            $brandData[] = ['brand_id' => $brand];
        };
        $vendor->brands()->createMany($brandData);
    }
    private function saveServices($vendor, $services)
    {
        $serviceData = [];
        foreach($services as $service) {
            $serviceData[] = ['service_id' => $service];
        };
        $vendor->services()->createMany($serviceData);
    }
}