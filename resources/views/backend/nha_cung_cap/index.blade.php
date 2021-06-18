@extends('layouts.app_backend')
@section('title','Danh sách nhà cung cấp')
@section('content')


<div class="dataTables_wrapper dt-bootstrape bg-light">
    <div class="container">
        <h1 class="mb-5">Danh sách nhà cung cấp</h1>
        @include('layouts.flash_message')

        <div class="row mb-3">
            <div class="col-sm-12 left">
                <div class="dataTables_filter">
                    <a href="{{route('get_backend.nha_cung_cap.create')}}" class="btn btn-xs btn-primary">Thêm mới</a>

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
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nhacungcap as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->tennhacungcap}}</td>
                            <td>{{$item->diachi}}</td>
                            <td>{{$item->sodienthoai}}</td>
                            <td>{{$item->email}}</td>

                            <td style="text-align:center">
                                <a href=" {{route('get_backend.nha_cung_cap.update',$item->id)}}"
                                    class="btn btn-xs btn-primary">Sửa</a>
                                <a href="{{route('get_backend.nha_cung_cap.delete',$item->id)}}"
                                    class="btn btn-xs btn-danger">Xóa</a>

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