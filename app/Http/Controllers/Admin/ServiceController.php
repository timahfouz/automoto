<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Services\CreateRequest;
use App\Http\Requests\Admin\Services\UpdateRequest;
use Illuminate\Support\Facades\View;
// use Illuminate\Http\Request;

class ServiceController extends CRUDController
{
    protected $model = 'Service';
    protected $index_route = 'admin.services.index';
    protected $delete_route = 'admin.services.destroy';
    
    protected $index_view = 'admin.services.index';
    protected $edit_view = 'admin.services.edit';
    protected $create_view = 'admin.services.create';

    protected $store_request = CreateRequest::class;
    protected $update_request = UpdateRequest::class;

    protected $has_files = true;

    public function __construct()
    {
        parent::__construct();
        if(in_array(\Request::route()->getName(), ["admin.services.create","admin.services.edit"])) {
            $cities = $this->pipeline->setModel('City')->whereNull('parent_id')->get();
            $categories = $this->pipeline->setModel('Category')->where(['for_brands' => 0])->get();
            $brands = $this->pipeline->setModel('Brand')->get();

            View::share('cities', $cities);
            View::share('categories', $categories);
            View::share('brands', $brands);
        }
    }

    public function store()
    {
        $request = app($this->store_request);

        $data = $request->validated();
        
        $category = $this->pipeline->setModel('Category')->find($request->category_id);
        $data['for_jobs'] = $category->for_jobs;
        $data['for_alarm'] = $category->for_alarm ?? 0;
        

        if ($this->has_files) {
            $this->storeData($request, $data);
        }

        $this->pipeline->setModel($this->model)->create($data);

        return redirect()->route($this->index_route)->with(['success' => 'Greeting']);
    }

    public function update($id)
    {
        $request = app($this->update_request);
        
        $data = $request->validated();

        $category = $this->pipeline->setModel('Category')->find($request->category_id);

        $data['for_jobs'] = $category->for_jobs ?? 0;
        $data['for_alarm'] = $category->for_alarm ?? 0;

        $obj = $this->pipeline->setModel($this->model)->findOrFail($id);

        if ($this->has_files) {
            $this->updateData($request, $data, $obj);
        }

        if ($this->has_files) {
            $this->storeData($request, $data);
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

