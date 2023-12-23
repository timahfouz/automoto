<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Requests\Admin\Cases\CreateRequest;
use App\Http\Requests\Admin\Cases\UpdateRequest;

class CaseController extends CRUDController
{
    protected $model = 'Condition';
    protected $index_route = 'admin.cases.index';
    protected $delete_route = 'admin.cases.destroy';
    
    protected $index_view = 'admin.cases.index';
    protected $edit_view = 'admin.cases.edit';
    protected $create_view = 'admin.cases.create';

    protected $store_request = CreateRequest::class;
    protected $update_request = UpdateRequest::class;

    public function __construct()
    {
        parent::__construct();
        if(in_array(\Request::route()->getName(), ["admin.cases.create","admin.cases.edit"])) {
            $users = $this->pipeline->setModel('User')->get();
            View::share('users', $users);
        }
    }


    public function show($id)
    {
        $item = $this->pipeline->setModel($this->model)->findOrFail($id);
        return view('admin.cases.show', compact('item'));
    }
}