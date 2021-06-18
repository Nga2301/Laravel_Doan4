<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShoppingMailController;
use Illuminate\Support\Facades\Session;

class GioHangController extends Controller
{
    protected $folder='frontend.gio_hang.';
    public function index(Request $request){
        $sanphamcart=\Cart::content();
        $tukhoa=$request->tim_kiem;
        if($tukhoa)
        {
            $search_sanpham=SanPham::where('tensanpham','like','%'.$tukhoa.'%')->get();
            $viewData=[
                'search_sanpham' => $search_sanpham,

                'query'        => $request->query(),
            ];
            return view($this->folder.'search',$viewData);
        }
    	$viewData  =[
            'sanphamcart'=>$sanphamcart,

        ];
       return view($this->folder.'index',$viewData);
    }

    public function checkout(Request $request){
        $sanphamcart = \Cart::content();
        $user       = User::find(get_data_user('web'));
        $tukhoa=$request->tim_kiem;
        if($tukhoa)
        {
            $search_sanpham=SanPham::where('tensanpham','like','%'.$tukhoa.'%')->get();
            $viewData=[
                'search_sanpham' => $search_sanpham,
                'query'        => $request->query(),
            ];
            return view($this->folder.'search',$viewData);
        }
    	$viewData = [
            'user'       => $user,
            'sanphamcart' => $sanphamcart,

        ];
       return view($this->folder.'checkout',$viewData);
    }

    public function pay(Request $request)
    {
        $dataDonHang             = $request->except('_token');
        $dataDonHang['ngaytao']  = Carbon::now();
        $dataDonHang['user_id']  = get_data_user('web') ?? 0;
        $dataDonHang['tongtien'] = (int)str_replace(',','',\Cart::subtotal(0));//xóa dấu phẩy
        $donhang                 = DonHang::create($dataDonHang);//tạo mới đơn hàng
        $donhangs                = [];
        if($donhang){//nếu tồn tại đơn hàng
            $sanpham = \Cart::content();//lấy thông tin của giỏ hàng 
           // Mail::to($request->email)->send(new ShoppingMailController($sanpham));
           
            foreach($sanpham as $item){//tạo chi tiết đơn hàng từ giỏ hàng
                $ctdonhang = ChiTietDonHang::create([
                    'donhang_id' => $donhang->id,
                    'sp_id'      => $item->id,
                    'soluong'    => $item->qty,
                    'gia'        => $item->price,
                    'thanhtien'  => $item->qty * $item->price,
                ]);
                
               
               
            }
        }
        Session::flash('toastr',[
            'type'=>'success',
            'message'=>'Đơn hàng của bạn đã được lưu'
        ]);
        \Cart::destroy();//xóa giỏ
        return redirect()->route('get.home');
    }
}