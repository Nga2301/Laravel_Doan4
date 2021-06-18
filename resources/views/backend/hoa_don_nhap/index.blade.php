@extends('layouts.app_backend')
@section('title','Danh sách hóa đơn nhập')
@section('content')


<div class="dataTables_wrapper dt-bootstrape bg-light">
    <div class="container">
        <h1 class="mb-5">Danh sách hóa đơn nhập</h1>
        @include('layouts.flash_message')

        <div class="row mb-3">
            <div class="col-sm-12 left">
                <div class="dataTables_filter">
                    <a href="{{route('get_backend.hoa_don_nhap.create')}}" class="btn btn-xs btn-primary">Thêm mới</a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example" class="table table-striped table-bordered bg-light" style="width:100%">
                    <thead style="text-align:center">
                        <tr>
                            <th>ID</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Nhân viên nhập</th>
                            <th>Ngày tạo</th>
                            <th>Tổng tiền</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hoadonnhap as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nhacungcap->tennhacungcap ?? "[N/A]"}}</td>
                            <td>{{$item->ngaynhap}}</td>
                            <td>{{$item->nhanvien->tennhanvien ?? "[N/A]"}}</td>
                            <td>{{$item->tongtien}}</td>

                            <td style="text-align:center">
                                <a href=" {{route('get_backend.hoa_don_nhap.update',$item->id)}}"
                                    class="btn btn-xs btn-primary">Sửa</a>
                                <a href="{{route('get_backend.hoa_don_nhap.show',$item->id)}}"
                                    class="btn btn-xs btn-danger">Xem chi tiết</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@stop