<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Requests\Admin\Cases\CreateRequest;
use App\Http\Requests\Admin\Cases\UpdateRequest;

class DonationController extends CRUDController
{
    protected $model = 'Donation';
    protected $index_route = 'admin.donations.index';
    protected $delete_route = 'admin.donations.destroy';
    
    protected $index_view = 'admin.donations.index';
    protected $edit_view = 'admin.donations.edit';
    protected $create_view = 'admin.donations.create';

    protected $store_request = CreateRequest::class;
    protected $update_request = UpdateRequest::class;

    public function __construct()
    {
        parent::__construct();
    }
}