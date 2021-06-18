<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChinhSachController extends Controller
{
    protected $folder='frontend.chinh_sach.';
     public function index(){
    	return view($this->folder.'index');
    }
}