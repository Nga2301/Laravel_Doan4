<?php

    namespace App\Http\Controllers\Frontend;
    
    use App\Models\SanPham;
    use App\Models\GiaBan;
    use App\Models\LoaiSanPham;
    use Illuminate\Http\Request;
    use Illuminate\Support\Carbon;
    
    use App\Http\Controllers\Controller;
    class ChiTietSanPhamController extends Controller
    {
        protected $folder='frontend.chi_tiet_san_pham.';
         public function index($slug){
            $sanphamchitiet = SanPham::where('slug',$slug)->first();
            $sanphamtuongtu=SanPham::where('loaisanpham_id',$sanphamchitiet->loaisanpham_id)->limit(10)->get();
           // dd($sanphamtuongtu);
            $sanphamnews = SanPham::orderByDesc('id')->limit(10)->get();
            $sanphamcart=\Cart::content();
            $datenow = Carbon::now();
    
            $giabans = GiaBan::where('ngayhieuluc', '<=', $datenow)
            ->where('ngayhethieuluc', '>=', $datenow)
            ->with('sanpham')
            ->get();
    
    
            $sanphamct=$giabans->where('sanpham_id',$sanphamchitiet->id)->first();
            
            foreach($sanphamtuongtu as $item){
                $sanphamtt_giaban= $giabans->where('sanpham_id',$item->id);
            }
            foreach($sanphamtuongtu as $item){
                $sanphamtt_new= $sanphamnews->where('sanpham_id',$item->id);
                foreach($sanphamtt_new as $value){
                    $sanphamtt_new_giaban= $giabans->where('sanpham_id',$value->id);
                    
                        $viewData=[
                            'sanphamct'=>$sanphamct,
                            'sanphamchitiet'=>$sanphamchitiet,
                            'sanphamtt_new_giaban'=>$sanphamtt_new_giaban,
                            'sanphamtt_giaban'=>$sanphamtt_giaban,
                            'sanphamtuongtu'=>$sanphamtuongtu,
                            'sanphamtt_new'=>$sanphamtt_new,
                            'sanphamcart'=>$sanphamcart,
                            
                        ];
                       return view($this->folder.'index',$viewData);
                    
                }
                
            }
           
        
            $viewData=[
                'sanphamct'=>$sanphamct,
                'sanphamchitiet'=>$sanphamchitiet,
               // 'sanphamtt_new_giaban'=>$sanphamtt_new_giaban,
                'sanphamtt_giaban'=>$sanphamtt_giaban,
                'sanphamtuongtu'=>$sanphamtuongtu,
                'sanphamtt_new'=>$sanphamtt_new,
                'sanphamcart'=>$sanphamcart,
                
            ];
           return view($this->folder.'index',$viewData);
    
        }
}
    