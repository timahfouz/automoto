<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Pipelines\Criterias\SearchUsersPipeline;

class UserController extends CRUDController
{
    protected $model = 'User';
    protected $index_route = 'admin.users.index';
    protected $delete_route = 'admin.users.destroy';
    
    protected $index_view = 'admin.users.index';
    protected $edit_view = 'admin.users.edit';
    protected $create_view = 'admin.users.create';

    protected $store_request = CreateRequest::class;
    protected $update_request = UpdateRequest::class;
    protected $has_files = true;

    public function __construct()
    {
        parent::__construct();
    }
    

    public function index(Request $request)
    {
        $items = $this->pipeline->setModel($this->model)
            ->pushPipeline([new SearchUsersPipeline($request)])
            ->get();
        
        $delte_route = $this->delete_route ?? null;
        
        return view($this->index_view, compact('items','delte_route'));
    }

    public function update($id)
    {
        $request = app($this->update_request);
        
        $data = $request->validated();

        $data['verified'] = 0;
        if ($request->filled('verified')) {
            $data['verified'] = 1;
        }
        
        $obj = $this->pipeline->setModel($this->model)->findOrFail($id);

        if ($this->has_files) {
            $this->updateData($request, $data, $obj);
        }

        $obj->update($data);

        return redirect()->route($this->index_route);
    }

    public function store()
    {
        $request = app($this->store_request);

        $data = $request->validated();
        
        $data['verified'] = 0;
        if ($request->filled('verified')) {
            $data['verified'] = 1;
        }

        if ($this->has_files) {
            $this->storeData($request, $data);
        }

        $this->pipeline->setModel($this->model)->create($data);

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