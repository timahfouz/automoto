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
            'services' => 20,
            'brands' => 12,
        ];
        return view('admin.home')->with($data);
    }

}
