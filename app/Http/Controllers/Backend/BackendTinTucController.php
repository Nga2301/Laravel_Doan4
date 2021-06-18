<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;use App\Models\Admin;


class BackendTinTucController extends Controller
{
    protected $folder = 'backend.bai_viet.';
    public function index()
    {        $admin=Admin::find(get_data_user('admins'));

        $tintucs = TinTuc::orderByDesc('id')->paginate(100);
        $viewData = [
            'tintucs' => $tintucs,'admin'=>$admin,
        ];
        return view($this->folder . 'index', $viewData);
    }

    public function create()
    {
        $admin=Admin::find(get_data_user('admins'));

        $tintuc = TinTuc::all();
        $viewData = [
            'tintuc' => $tintuc,'admin'=>$admin,
        ];

        return view($this->folder . 'create', $viewData);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($request->tieude);
        $data['thoigiandang'] = Carbon::now();
        if ($request->hinhanh) {
            $image = upload_image('hinhanh');

            if (isset($image['code'])) {
                $data['hinhanh'] = $image['name'];
            }
        }
        TinTuc::create($data);
        return redirect()->back()->with('success', 'Thêm thành công!');;
    }

    public function edit($id)
    {        $admin=Admin::find(get_data_user('admins'));

        $tintucs = TinTuc::find($id);
        //dd($tintucs);
        $viewData = [
            'tintucs' => $tintucs,'admin'=>$admin,
        ];
        return view($this->folder . 'update', $viewData);
    }

    public function update(Request $request, $id)
    {        $admin=Admin::find(get_data_user('admins'));

        $data = $request->except('_token');
        if ($request->hinhanh) {
            $image = upload_image('hinhanh');

            if (isset($image['code'])) {
                $data['hinhanh'] = $image['name'];
            }
        }
        TinTuc::find($id)->update($data);

        return redirect()->back()->with('success', 'Sửa thành công!');
    }
    public function delete($id)
    {
        \DB::table('tintuc')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}