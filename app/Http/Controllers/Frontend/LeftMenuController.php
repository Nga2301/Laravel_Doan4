<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiSanPham;

class LeftMenuController extends Controller
{
    protected $folder='frontend.left_menu.';
    //protected $folder='backend.san_pham.';

   public function index(){

    $loaisanpham1 = LoaiSanPham::get();
    $viewData=[
            'loaisanpham1'=>$loaisanpham1,
        ];
       return view($this->folder.'index',$viewData);
   }

}