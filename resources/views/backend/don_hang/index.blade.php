@extends('layouts.app_backend')
@section('title','Danh sách đơn hàng')
@section('content')

<div class="dataTables_wrapper dt-bootstrape bg-light">
    <div class="container">
        <h1 class="mb-5">Danh sách đơn hàng</h1>
        @include('layouts.flash_message')

       
        <div class="row">
            <div class="col-sm-12">
                <table id="example" class="table table-striped table-bordered bg-light" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1?>
                    @if(\Request::route()->getName() =='get_backend.don_hang.index')
                        @foreach($donhang as $item)
                           @include('backend.don_hang.index_item')
                        @endforeach

                    @elseif(\Request::route()->getName() =='get_backend.don_hang.index1')
                        @foreach($donhang_1 as $item)

                           @include('backend.don_hang.index_item')
                        @endforeach
                    @elseif(\Request::route()->getName() =='get_backend.don_hang.index2')
                        @foreach($donhang_2 as $item)

                           @include('backend.don_hang.index_item')
                        @endforeach
                    @elseif(\Request::route()->getName() =='get_backend.don_hang.index3')
                        @foreach($donhang_3 as $item)

                           @include('backend.don_hang.index_item')
                        @endforeach
                    @elseif(\Request::route()->getName() =='get_backend.don_hang.index4')
                        @foreach($donhang_4 as $item)

                           @include('backend.don_hang.index_item')
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>



</div>


@stop
