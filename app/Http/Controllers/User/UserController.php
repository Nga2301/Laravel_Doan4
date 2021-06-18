<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(get_data_user('web'));
        $sanphamcart=\Cart::content();
        $donhang    = DonHang::where('user_id',get_data_user('web'))->orderByDesc('id');
       
        if($trangthai = $request->status){
            $donhang->where('trangthai','=',$trangthai);
        }
        $donhang = $donhang->paginate(10);
        $viewData=[

            'sanphamcart' =>$sanphamcart,
            'user'       =>$user,
            'donhang'    => $donhang,
           
        ];
        return view('user.index',$viewData);
    }
    public function update(Request $request)
    {
       
        $data=$request->except('_token');
        User::find(get_data_user('web'))->update($data);
        
        return redirect()->back();
    }

    public function view($id)
    {
        $user = User::find(get_data_user('web'));
        $donhang_a   = DonHang::find($id);
        $donhang    = DonHang::where('user_id',get_data_user('web'))->orderByDesc('id');
        $ctdonhang = ChiTietDonHang::where('donhang_id', $id)->with('sanpham')->get();
      // dd($ctdonhang);
      
        $viewData  = [
            'donhang_a'   => $donhang_a,
            'ctdonhang' => $ctdonhang,
             'user'       =>$user,
             'donhang'    => $donhang,
        ];
        return view('user.order_view', $viewData);
    }

  

    public function cancel($id)
    {
        $donhang = DonHang::find($id);
        $donhang->trangthai = DonHang::STATUS_CANCEL;
        $donhang->save();
        return redirect()->back();
    }
}
