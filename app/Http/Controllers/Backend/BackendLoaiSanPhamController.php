<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

use App\Models\LoaiSanPham;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Requests\BackendLoaiSanPhamRequest;
use Illuminate\Support\Facades\DB;


class BackendLoaiSanPhamController extends Controller
{
    protected $folder='backend.loai_san_pham.';
     public function index(){
        $admin=Admin::find(get_data_user('admins'));

        $loaisanpham= LoaiSanPham::orderByDesc('id')->paginate(20);
        $viewData=[
            'loaisanpham'=>$loaisanpham,'admin'=>$admin,
        ];
       return view($this->folder.'index',$viewData);
    }

    public function create(){
        $loaisanpham=LoaiSanPham::all();
        $admin=Admin::find(get_data_user('admins'));

        $viewData=[
           'loaisanpham'=>$loaisanpham,'admin'=>$admin,
       ];

       return view($this->folder.'create',$viewData);
   }

    public function store(BackendLoaiSanPhamRequest $request){
       $data=$request->except('_token');
       $data['slug']=Str::slug($request->tenloaisanpham);
       LoaiSanPham::create($data);

       return redirect()->back()->with('success','Thêm thành công!');

   }

    public function edit($id){
       $loaisanphams=LoaiSanPham::find($id);
       $admin=Admin::find(get_data_user('admins'));

       $viewData=[
           'loaisanphams'=>$loaisanphams,'admin'=>$admin,
       ];
       return view($this->folder.'update',$viewData);
   }

    public function update(BackendLoaiSanPhamRequest $request,$id){
       $data=$request->except('_token');
       LoaiSanPham::find($id)->update($data);
       return redirect()->back()->with('success','Sửa thành công!');

   }
    public function delete($id){
       DB::table('loaisanpham')->where('id',$id)->delete();
       return redirect()->back()->with('success','Xóa thành công!');
   }
}