<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Requests\Admin\Cities\CreateRequest;
use App\Http\Requests\Admin\Cities\UpdateRequest;
use Illuminate\Http\Request;

class AreaController extends CRUDController
{
    protected $model = 'City';
    protected $index_route = 'admin.areas.index';
    protected $delete_route = 'admin.areas.destroy';
    
    protected $index_view = 'admin.areas.index';
    protected $edit_view = 'admin.areas.edit';
    protected $create_view = 'admin.areas.create';

    protected $store_request = CreateRequest::class;
    protected $update_request = UpdateRequest::class;

    public function __construct()
    {
        parent::__construct();
        if(in_array(\Request::route()->getName(), ["admin.areas.create","admin.areas.edit"])) {
            $cities = $this->pipeline->setModel('City')->whereNull('parent_id')->get();
            View::share('cities', $cities);
        }
    }

    public function index(Request $request)
    {
        $items = $this->pipeline->setModel($this->model)->whereNotNull('parent_id')->get();
        $delte_route = $this->delete_route ?? null;
        
        return view($this->index_view, compact('items','delte_route'));
    }
}