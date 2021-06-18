<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\SanPham;

class TinTucController extends Controller
{
    protected $folder = 'frontend.bai_viet.';

    public function index(Request $request)
    {
        $tintucs = TinTuc::orderByDesc('id')->paginate(6);
        $tintucnews = TinTuc::orderByDesc('id')->limit(3)->get();
        $tukhoa = $request->tim_kiem;
        $sanphamcart = \Cart::content();
       

        if ($tukhoa) {
            $search_sanpham = SanPham::where('tensanpham', 'like', '%' . $tukhoa . '%')->get();
            $viewData = [
                'search_sanpham' => $search_sanpham,
              
                'sanphamcart' => $sanphamcart,
                'query' => $request->query(),
            ];
            return view($this->folder . 'search', $viewData);
        }
        $viewData = [
            'tintucs' => $tintucs,
            'tintucnews' => $tintucnews,
            'sanphamcart' => $sanphamcart,
          
        ];
        return view($this->folder . 'index', $viewData);
    }
}