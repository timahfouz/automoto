<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Requests\Admin\Tags\CreateRequest;
use App\Http\Requests\Admin\Tags\UpdateRequest;

class TagController extends CRUDController
{
    protected $model = 'Tag';
    protected $index_route = 'admin.tags.index';
    protected $delete_route = 'admin.tags.destroy';
    
    protected $index_view = 'admin.tags.index';
    protected $edit_view = 'admin.tags.edit';
    protected $create_view = 'admin.tags.create';

    protected $store_request = CreateRequest::class;
    protected $update_request = UpdateRequest::class;

    protected $has_files = true;
    
    public function __construct()
    {
        parent::__construct();
        if(in_array(\Request::route()->getName(), ["admin.tags.create","admin.tags.edit"])) {
            $categories = $this->pipeline->setModel('Category')->get();
            View::share('categories', $categories);
        }
    }

    protected function storeData($request, &$data)
    {
        if ($request->hasFile('image')) {
            $imagePath = resizeImage($request->image, 'uploads', [200, 200]);
            $data['image'] = $imagePath;
        }
    }

    protected function updateData($request, &$data, $item)
    {
        if ($request->hasFile('image')) {
            $imagePath = resizeImage($request->image, 'uploads', [200, 200]);
            $data['image'] = $imagePath;
        }
    }

}

