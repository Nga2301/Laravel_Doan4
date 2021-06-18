<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BackendLoaiSanPhamRequest;
use Illuminate\Support\Str;
use App\Models\SanPham;
use App\Models\LoaiSanPham;

class SanPhamTheoLoaiController extends Controller
{

    protected $folder = 'frontend.san_pham_theo_loai.';
    public function index(Request $request, $slug)
    {
        $tags = LoaiSanPham::all();
        $loaisanpham = LoaiSanPham::where('slug', $slug)->first();
        if (!$loaisanpham) {
            abort(404);
        }

        $sanphambyloai = SanPham::where('loaisanpham_id', $loaisanpham->id);
        $tukhoa = $request->tim_kiem;
        $sanphamcart = \Cart::content();
        if ($tukhoa) {
            $sanphambyloai->where('tensanpham', 'like', '%' . $tukhoa . '%');
        }
    //     $sanphamnews = SanPham::orderByDesc('id')->limit(10)->get();
    //     $datenow = Carbon::now();
    //     $giabans = GiaBan::where('ngayhieuluc', '<=', $datenow)
    //         ->where('ngayhethieuluc', '>=', $datenow)->get();
    //         foreach($sanphambyloai as $item){
    //             $sanphambl_gia= $giabans->where('sanpham_id','=',$item->id);
    //         }
    //         dd($sanphambl_gia);
    //  //   dd($item);
        if($request->drop){
            $select=$request->drop;
            switch($select){
                case '2':
                    $sanphambyloai->orderBy('tensanpham','ASC');
                    break;
                case '3':
                    $sanphambyloai->orderByDesc('tensanpham');
                    break;
                case '4':
                    $sanphambyloai->orderBy('gia','ASC');
                    break;
                case '5':
                    $sanphambyloai->orderByDesc('gia');
                    break;
                case '6':
                    $sanphambyloai->orderByDesc('id');
                    break;
            }
        }
        $count=$sanphambyloai->count();
        $sanphambyloai = $sanphambyloai->paginate(8);
        $count_page= $sanphambyloai->count();
        $viewData = [
            'loaisanpham' => $loaisanpham,
            'sanphambyloai' => $sanphambyloai,
            'tags' => $tags,
            'count' => $count,
            'count' => $count,
            'count_page' => $count_page,
            'query' => $request->query(),
            'sanphamcart' => $sanphamcart,
        ];
        return view($this->folder . 'index', $viewData);
    }
}