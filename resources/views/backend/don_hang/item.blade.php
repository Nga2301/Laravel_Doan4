@extends('layouts.app_backend')
@section('title','Chi tiết đơn hàng')
@section('content')

<div class="dataTables_wrapper dt-bootstrape bg-light">
    <div class="container">
        <h1 class="mb-5">Chi tiết đơn hàng #{{$donhang->id}} - Tổng tiền <b class="text-muted">{{number_format($donhang->tongtien,0,'.','.')}} đ</b></h1>
        @include('layouts.flash_message')
        <div class="row center">
            <div class="col-sm-8">
                <h3 class="mt-15">Thông tin khách hàng</h3>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Họ tên</th>
                        <td>{{$donhang->hoten}}</td>


                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <th>Địa chỉ</th>
                        <td>{{$donhang->diachi}}</td>
                      </tr>

                      <tr>
                        <th>Số điện thoại</th>
                        <td>{{$donhang->sodienthoai}}</td>
                      </tr>

                      <tr>
                        <th>Email</th>
                        <td>{{$donhang->email}}</td>
                      </tr>

                    </tbody>
                  </table>
            </div>

            <div class="col-sm-4">
                <h3>Trạng thái đơn hàng: <span class="{{$donhang->getStatus($donhang->trangthai)['class']}}">{{$donhang->getStatus($donhang->trangthai)['name']}} </span></h3>
                @if($donhang->getStatus($donhang->trangthai)['name']==="Đang xử lí")
                <a href="{{route('get_backend.don_hang.success1',$donhang->id)}}" class="btn btn-sm btn-info">Đang giao hàng</a>
                <a href="{{route('get_backend.don_hang.success2',$donhang->id)}}" class="btn btn-sm btn-success">Đã giao hàng </a>
                <a href="{{route('get_backend.don_hang.cancel',$donhang->id)}}" class="btn btn-sm btn-danger">Hủy bỏ</a>
                @elseif($donhang->getStatus($donhang->trangthai)['name']==="Đang giao hàng")
                <a href="{{route('get_backend.don_hang.success2',$donhang->id)}}" class="btn btn-sm btn-success">Đã giao hàng </a>
                <a href="{{route('get_backend.don_hang.cancel',$donhang->id)}}" class="btn btn-sm btn-danger">Hủy bỏ</a>
                @else
                @endif
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-12">
                <h3>Danh sách chi tiết đơn hàng</h3>
                <table id="example" class="table table-striped table-bordered bg-light" style="width:100%">
                    <thead style="text-align:center">
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>

                        </tr>
                    </thead>
                    <tbody style="text-align:center">
                        <?php $i=1;?>
                        @foreach($ctdonhang as $item)

                        <tr>
                            <th><?php echo $i++?></th>
                            <td>
                                <img class="img-thumbnail"
                                style="width:60px;height:60px"
                                 src="{{pare_url_file($item->sanpham->hinhanh)}}"  alt="">
                            </td>
                            <td>{{$item->sanpham->tensanphm ?? "[N/A]"}}</td>

                            <td>
                                <span class="text-danger">{{number_format($item->gia,0,',',',')}} đ</span>
                            </td>
                            <td >
                                {{$item->soluong}}
                            </td>

                            <td class="text-danger">{{number_format($item->thanhtien,0,',',',') }} đ</td>



                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>



</div>


@stop
