@extends('layouts.app_backend')
@section('title','Danh sách loại sản phẩm')
@section('content')


<div class="dataTables_wrapper dt-bootstrape bg-light">
    <div class="container">
        <h1 class="mb-5">Danh sách loại sản phẩm</h1>
        @include('layouts.flash_message')

        <div class="row mb-3">


            <div class="col-sm-12">
                <div class="dataTables_filter">
                    <a href="{{route('get_backend.loai_san_pham.create')}}" class="btn btn-xs btn-primary">Thêm mới</a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example" class="table table-striped table-bordered bg-light" style="width:100%">
                    <thead style="text-align:center">
                        <tr>
                            <th>ID</th>
                            <th>Tên loại sản phẩm</th>
                            <th>Mô tả</th>

                            <th>Chức năng</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loaisanpham as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->tenloai}}</td>
                            <td>{{$item->mota}}</td>



                            <td style="text-align:center">
                                <a href=" {{route('get_backend.loai_san_pham.update',$item->id)}}"
                                    class="btn btn-xs btn-primary">Sửa</a>
                                <a href="{{route('get_backend.loai_san_pham.delete',$item->id)}}"
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
