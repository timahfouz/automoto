<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Banners\CreateRequest;
use App\Http\Requests\Admin\Banners\UpdateRequest;

class BannerController extends CRUDController
{
    protected $model = 'Banner';
    protected $index_route = 'admin.banners.index';
    protected $delete_route = 'admin.banners.destroy';
    
    protected $index_view = 'admin.banners.index';
    protected $edit_view = 'admin.banners.edit';
    protected $create_view = 'admin.banners.create';

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

