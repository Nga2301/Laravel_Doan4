@extends('layouts.app_backend')
@section('title','Danh sách giá bán')
@section('content')

<div class="dataTables_wrapper dt-bootstrape bg-light">
    <div class="container">
        <h1 class="mb-5">Danh sách giá bán </h1>
        @include('layouts.flash_message')

        <div class="row mb-3">


            <div class="col-sm-12">
                <div class="dataTables_filter">
                    <a href="{{route('get_backend.gia_ban.create')}}" class="btn btn-xs btn-primary">Thêm mới</a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example" class="table table-striped table-bordered bg-light" style="width:100%">
                    <thead style="text-align:center">
                        <tr>
                            <th>ID</th>
                            <th>Tên đồ uống</th>
                            <th>Giá bán</th>
                            <th>Ngày hiệu lực</th>
                            <th>Ngày hết hiệu lực</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($giabans as $item)

                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->douong->tendouong ?? "[N/A]"}}</td>

                            <td>
                                <span class="text-danger">{{number_format($item->gia,0,',',',')}} đ</span>
                            </td>
                            <td>
                                {{$item->ngayhieuluc}}
                            </td>

                            <td>{{$item->ngayhethieuluc}}</td>


                            <td style="text-align:center">
                                <a href=" {{route('get_backend.gia_ban.update',$item->id)}}"
                                    class="btn btn-xs btn-primary">Sửa</a>
                                <a href="{{route('get_backend.gia_ban.delete',$item->id)}}"
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