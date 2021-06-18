<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\NhaCungCap;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Requests\BackendNhaCungCapRequest;
use App\Models\Admin;

class BackendNhaCungCapController extends Controller
{
    protected $folder='backend.nha_cung_cap.';
    
    public function index(){
        $nhacungcap= NhaCungCap::orderByDesc('id')->paginate(20);
        $admin=Admin::find(get_data_user('admins'));

        $viewData=[
            'nhacungcap'=>$nhacungcap,'admin'=>$admin,
        ];
       return view($this->folder.'index',$viewData);
    }

    public function create(){
        $nhacungcap=NhaCungCap::all();
        $admin=Admin::find(get_data_user('admins'));

        $viewData=[
           'nhacungcap'=>$nhacungcap,'admin'=>$admin,
       ];
       
       return view($this->folder.'create',$viewData);
    }

    public function store(BackendNhaCungCapRequest $request){
       $data=$request->except('_token');
       NhaCungCap::create($data);
     
       return redirect()->back()->with('success','Thêm thành công!');
       
    }

    public function edit($id){
      $admin=Admin::find(get_data_user('admins'));

       $nhacungcaps=NhaCungCap::find($id);
       $viewData=[
           'nhacungcaps'=>$nhacungcaps,'admin'=>$admin,
       ];
       return view($this->folder.'update',$viewData);
    }

    public function update(BackendNhaCungCapRequest $request,$id){
       $data=$request->except('_token');
       NhaCungCap::find($id)->update($data);
       return redirect()->back()->with('success','Sửa thành công!');
       
    }
    public function delete($id){
       \DB::table('nhacungcap')->where('id',$id)->delete();
       return redirect()->back()->with('success','Xóa thành công!');
    }
}