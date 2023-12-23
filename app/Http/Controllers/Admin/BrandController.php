<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Brands\CreateRequest;
use App\Http\Requests\Admin\Brands\UpdateRequest;

class BrandController extends CRUDController
{
    protected $model = 'Brand';
    protected $index_route = 'admin.brands.index';
    protected $delete_route = 'admin.brands.destroy';
    
    protected $index_view = 'admin.brands.index';
    protected $edit_view = 'admin.brands.edit';
    protected $create_view = 'admin.brands.create';

    protected $store_request = CreateRequest::class;
    protected $update_request = UpdateRequest::class;

    protected $has_files = true;

    private $cities;

    public function __construct()
    {
        parent::__construct();
    }
    

    public function store()
    {
        $request = app($this->store_request);

        $data = $request->validated();
        
        $data['for_jobs'] = 0;
        if ($request->filled('for_jobs')) {
            $data['for_jobs'] = 1;
        }
        $data['for_alarm'] = 0;
        if ($request->filled('for_alarm')) {
            $data['for_alarm'] = 1;
        }

        if ($this->has_files) {
            $this->storeData($request, $data);
        }

        $this->pipeline->setModel($this->model)->create($data);

        return redirect()->route($this->index_route);
    }

    public function update($id)
    {
        $request = app($this->update_request);
        
        $data = $request->validated();

        $obj = $this->pipeline->setModel($this->model)->findOrFail($id);

        if ($this->has_files) {
            $this->updateData($request, $data, $obj);
        }

        $data['for_jobs'] = 0;
        if ($request->filled('for_jobs')) {
            $data['for_jobs'] = 1;
        }

        $data['for_alarm'] = 0;
        if ($request->filled('for_alarm')) {
            $data['for_alarm'] = 1;
        }
        
        $obj->update($data);

        return redirect()->route($this->index_route);
    }

    protected function storeData($request, &$data)
    {
        if ($request->hasFile('image')) {
            $imageID = resizeImage($request->image, 'uploads', [200, 200]);
            $data['image_id'] = $imageID;
        }
    }

    protected function updateData($request, &$data, $item)
    {
        if ($request->hasFile('image')) {
            $imageID = resizeImage($request->image, 'uploads', [200, 200]);
            $data['image_id'] = $imageID;
        }
    }
}

