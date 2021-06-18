<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class BackendHomeController extends Controller
{
    public function index(){
       
        $admin=Admin::find(get_data_user('admins'));
        $viewData=[
            'admin'=>$admin,
        ];
    	return view('backend.home.index',$viewData);
    }
}