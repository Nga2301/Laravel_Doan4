<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Exports\DonHangExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Admin;

class BackendDonHangController extends Controller
{
    protected $folder = 'backend.don_hang.';
    public function index(Request $request)
    {
        $donhang = DonHang::orderByDesc('id')->get();
        $donhang_1 = DonHang::orderByDesc('id')->where('trangthai','=',1)->get();
        $donhang_2 = DonHang::orderByDesc('id')->where('trangthai','=',2)->get();
        $donhang_3 = DonHang::orderByDesc('id')->where('trangthai','=',3)->get();
        $donhang_4 = DonHang::orderByDesc('id')->where('trangthai','=',4)->get();

        $admin=Admin::find(get_data_user('admins'));

         
        $viewData = [
            'donhang' => $donhang,
            'donhang_1' => $donhang_1,
            'donhang_2' => $donhang_2,
            'donhang_3' => $donhang_3,
            'donhang_4' => $donhang_4,'admin'=>$admin,
        ];
        return view($this->folder . 'index', $viewData);
    }

    public function view($id)
    {        $admin=Admin::find(get_data_user('admins'));

        $donhang = DonHang::find($id);
        $ctdonhang = ChiTietDonHang::with('sanpham')->where('donhang_id', $id)->get();
        $viewData = [
            'donhang' => $donhang,
            'ctdonhang' => $ctdonhang,'admin'=>$admin,
        ];
        return view($this->folder . 'item', $viewData);
    }

    public function success1($id)
    {
        $donhang = DonHang::find($id);
        $donhang->trangthai = DonHang::STATUS_SUCCESS1;
        $donhang->save();
        return redirect()->back();
    }

    public function success2(Request $request,$id)
    {
        $donhang = DonHang::find($id);
        $donhang->trangthai = DonHang::STATUS_SUCCESS2;
      
        $donhang->save();
        $donhang_3_ct = ChiTietDonHang::where('donhang_id',$donhang->id)->get();
        foreach($donhang_3_ct as $value){
          
            $dataSanPham=SanPham::find($value->sanpham_id);
            $data = $request->except('_token');
           
            $dataSanPham['soluong'] = $dataSanPham['soluong'] - $value->soluong;
            $data['soluong'] = $dataSanPham['soluong'];
            $dataSanPham->update($data);
    
           
        }       
        return redirect()->back();
    }

    public function cancel($id)
    {
        $donhang = DonHang::find($id);
        $donhang->trangthai = DonHang::STATUS_CANCEL;
        $donhang->save();
        return redirect()->back();
    }
}