<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\NhaCungCap;
use App\Models\NhanVien;
use App\Models\HoaDonNhap;
use App\Models\SanPham;
use App\Http\Requests\BackendNhaCungCapRequest;
use App\Http\Requests\BackendNhanVienNRequest;
use App\Http\Requests\BackendHoaDonNhapRequest;
use Carbon\Carbon;

class BackendHoaDonNhapController extends Controller
{
    protected $folder='backend.hoa_don_nhap.';
    protected $folder1='backend.chi_tiet_hoa_don_nhap.';
    public function index(){
        $hoadonnhap= HoaDonNhap::with(
            'nhacungcap:id,tennhacungcap',
            'nhanvien:id,tennhanvien')
            ->orderByDesc('id')->paginate(70);
        $viewData=[
            'hoadonnhap'=>$hoadonnhap,
        ];
       return view($this->folder.'index',$viewData);
   }

    public function create(){

        $nhacungcap=NhaCungCap::all();
        $nhanvien=NhanVien::all();
        $viewData=[
           'nhacungcap'=>$nhacungcap,
           'nhanvien'=>$nhanvien,
       ];

       return view($this->folder.'create',$viewData);
   }

    public function store(BackendHoaDonNhapRequest $request){
       $data=$request->except('_token');
       $data['ngaynhap']=Carbon::now();

       SanPham::create($data);
       return redirect()->back()->with('success','Thêm thành công!');;
   }

    public function edit($id){
       $nhanvien = NhanVien::all();
       $nhacungcap = NhaCungCap::all();
       $hoadonnhaps = HoaDonNhap::find($id);

       $viewData=[
           'nhacungcap'=>$nhacungcap,
           'nhanvien'=>$nhanvien,
           'hoadonnhaps'=>$hoadonnhaps
       ];
       return view($this->folder.'update',$viewData);
   }

    public function update(BackendHoaDonNhapRequest $request,$id){
       $data=$request->except('_token');
       SanPham::find($id)->update($data);

       return redirect()->back()->with('success','Sửa thành công!');

   }
    public function show($id){
        $hoadonnhaps = HoaDonNhap::find($id);

        $viewData=[
            'hoadonnhaps'=>$hoadonnhaps
        ];
        return view($this->folder1.'index',$viewData);
   }
}