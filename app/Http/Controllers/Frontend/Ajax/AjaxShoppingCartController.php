<?php

namespace App\Http\Controllers\Frontend\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\ChiTietHoaDonNhap;
use Carbon\Carbon;
use App\Models\GiaBan;


class AjaxShoppingCartController extends Controller
{
    public function add(Request $request,$id){
        if($request->ajax()){
            $qty = $request->qty;
          //  dd($qty);
            //1.Kiểm tra sản phẩm có tồn tại k
            $sanpham = SanPham::find($id);
            if(!$sanpham){
                return response()->json([
                    'status' => 404
                ]);
            }
            //2.Kiểm tra số lượng sản phẩm
            if($sanpham->soluong < 1){

                return response()->json([
                    'status'  => 404,
                    'message' => 'Số lượng không đủ'
                ]);
            }
            $cart = \Cart::content();
            //3.Kiểm tra trong giỏ hàng đã có sản phẩm đó chưa
            $idCartSanPham = $cart->search(function($cartItem) use ($sanpham){
                if($cartItem->id == $sanpham->id)
                {
                    return $cartItem->id;
                }
            });
            //3.1.Nếu đã có sản phẩm thì cộng thêm số lượng và kiểm tra tiếp số lượng còn không
            if($idCartSanPham){
                $sanphamByCart = \Cart::get($idCartSanPham);
                if($sanpham->soluong < ($sanphamByCart->qty + $qty)){
                    return response()->json([
                        'status'  => 200,
                        'message' => 'Số lượng không đủ'
                    ]);
                }
            }
            //3.2.Nếu chưa có thì thêm sản phẩm vào giỏ hàng
            //3.2.1.Nếu sp đó đang có giá khuyến mại thì sẽ lấy theo giá khuyến mại
            $a=Carbon::now();
            $giabans = GiaBan::where('sanpham_id',$id)->where('ngayhieuluc', '<=', $a)
            ->where('ngayhethieuluc', '>=', $a)->first();
            if($giabans){
                \Cart::add([
                    'id'       => $sanpham->id,
                    'name'     => $sanpham->tensanpham,
                    'qty'      => $qty,
                    'price'    => $giabans->gia,
                    'weight'   => '1',
                    'options'  => [
                       'image' => $sanpham->hinhanh,
                       'slugg' => $sanpham->slug,
                    ]
                ]);
            }
              //3.2.2.Nếu sp đó k có giá khuyến mại thì lấy giá bán của sp
            else{
                \Cart::add([
                    'id'       => $sanpham->id,
                    'name'     => $sanpham->tensanpham,
                    'qty'      => $qty,
                    'price'    => $sanpham->gia,
                    'weight'   => '1',
                    'options'  => [
                       'image' => $sanpham->hinhanh,
                       'slugg' => $sanpham->slug,
                    ]
                ]);
            }
            // Session::flash('toastr',[
            //     'type'=>'success',
            //     'message'=>'Thêm vào giỏ hàng thành công'
            // ]);
            return redirect()->back();
       }
    }

    public function delete(Request $request,$id){
        if($request->ajax()){
            \Cart::remove($id);
            return response()->json([
                'status'  => 200,
                'message' => 'Xóa thành công'
            ]);
        }
    }

    public function update(Request $request,$id){
        if($request->ajax()){
            \Cart::update($id,$request->qty);
            return response()->json([
                'status'  => 200,
                'message' => 'Sửa thành công'
            ]);
        }
    }
}