<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendChiTietHoaDonNhapController extends Controller
{
    protected $folder='backend.chi_tiet_hoa_don_nhap.';
     public function index(){
    	return view($this->folder.'index');
    }

     public function create(){
    	return view($this->folder.'create');
    }

     public function store(){
    	
    }

     public function edit($id){
    	
    }

     public function update($id){
     	return view($this->folder.'update');
    	
    }
     public function delete($id){
    	return view($this->folder.'delete');
    }
}