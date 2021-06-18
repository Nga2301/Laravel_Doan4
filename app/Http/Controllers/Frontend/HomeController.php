<?php



namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\GiaBan;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    protected $folder = 'frontend.home.';
    protected $folder_search = 'frontend.san_pham_theo_loai.';
    //protected $folder='backend.san_pham.';

    public function index(Request $request)
    {

        $loaisanpham = LoaiSanPham::get();
        $sanphamnews = SanPham::orderByDesc('id')->limit(10)->get();
        $tags = LoaiSanPham::get();

        $sanphamcart = \Cart::content();


         //Khuyến mại
         $datenow = Carbon::now();
         $giabans = GiaBan::where('ngayhieuluc', '<=', $datenow)
             ->where('ngayhethieuluc', '>=', $datenow)->with('sanpham')->get();
      
        //Tìm kiếm
        $tukhoa = $request->tim_kiem;
        if ($request->tim_kiem) {
            $search_sanpham = DoUong::where('tensanpham', 'like', '%' . $tukhoa . '%')->paginate(9);
            $viewData = [
                'search_sanpham' => $search_douong,
                'tags' => $tags,
                'sanphamcart' => $sanphamcart,
                'query' => $request->query(),
            ];
            return view($this->folder . 'search', $viewData);
        }




        $viewData = [
            'giabans'                 => $giabans,
            'loaisanpham'              => $loaisanpham,
            'sanphamcart'              => $sanphamcart,
            'sanphamnews'              => $sanphamnews,
           
        ];
        return view($this->folder . 'index', $viewData);
    }
   public function autocomplete(Request $request)
   {
       $t=$request->tim_kiem;
       $sanpham_auto=SanPham::select('tensanpham')->where('tensanpham','like','%'.$t.'%')->get();

      return response()->json($sanpham_auto);
   }





}