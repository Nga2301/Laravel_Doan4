<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\SanPham;

class ChiTietBaiVietController extends Controller
{
    protected $folder='frontend.chi_tiet_bai_viet.';
    public function index(Request $request,$slug){
    	$baivietchitiet = TinTuc::where('slug',$slug)->first();
        $sanphamcart=\Cart::content();
        $tintucnews = TinTuc::orderByDesc('id')->limit(3)->get();
        $tukhoa = $request->tim_kiem;
        $tags_tt = TinTuc::select('theloai')->distinct()->get();
        $tags = LoaiSanPham::all();
        if ($tukhoa) {
            $search_sanpham = SanPham::where('tensanpham', 'like', '%' . $tukhoa . '%')->get();
            $viewData = [
                'search_sanpham' => $search_sanpham,
                'tags' => $tags,
                'sanphamcart' => $sanphamcart,
                'query' => $request->query(),
            ];
            return view($this->folder . 'search', $viewData);
        }
        $viewData=[
            'baivietchitiet'=>$baivietchitiet,
          
            'sanphamcart'=>$sanphamcart,
            'tintucnews' => $tintucnews,
            'tags_tt' => $tags_tt,
            
        ];
       return view($this->folder.'index',$viewData);

    }
}