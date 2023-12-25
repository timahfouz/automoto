<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends CRUDController
{
    public function __invoke(Request $request)
    {
        $data = [
            'admins' => $this->pipeline->setModel('Admin')->count(),
            'users' => $this->pipeline->setModel('User')->count(),
            'services' => $this->pipeline->setModel('Service')->count(),
            'brands' => $this->pipeline->setModel('Brand')->count(),
        ];
        return view('admin.home')->with($data);
    }

}
