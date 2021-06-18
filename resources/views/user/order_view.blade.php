@extends('layouts.app_frontend')
@section('title','OrganicFood Shop')
@section('content')
    <!--breadcrumb area start-->
    <div class="breadcrumb_container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">     
                            <nav>
                        <ul>
                            <li><a href="#">Home</a> ></li>
                            <li>My account</li>
                        </ul>
                    </nav>
                        </div>
                    </div> 
                </div>        
            </div>
             <!--breadcrumb area end-->
            
			<!-- Start Maincontent  -->
            <section class="main-content-area my-account ptb-100">
				<div class="container">
	                <div class="account-dashboard">
	                    <div class="row">
	                       
	                        <div class="col-sm-12 col-md-12 col-lg-12">
	                            <!-- Tab panes -->
	                          
	                               
     <h4><a href="{{route('get_user.home')}}">    <i class="fas fa-arrow-circle-left">Quay lại</i>
</h4>                              
                                       </a>
                                
                                    <h1 class="mb-5">Chi tiết đơn hàng #{{$donhang_a->id}}</h1>
        @include('layouts.flash_message')
        <div class="row">
            <div class="col-sm-12 center">
                <h3 class="mt-15 text-muted">Thông tin khách hàng nhận hàng</h3>
                <table class="table">



                    <tbody>
                        <tr>
                            <th>Họ tên</th>
                            <td style="float:left">{{$donhang_a->hoten}}</td>


                          </tr>

                      <tr>
                        <th>Địa chỉ</th>
                        <td style="float:left">{{$donhang_a->diachi}}</td>
                      </tr>

                      <tr>
                        <th>Số điện thoại</th>
                        <td style="float:left">{{$donhang_a->sodienthoai}}</td>
                      </tr>

                      <tr>
                        <th>Email</th>
                        <td style="float:left">{{$donhang_a->email}}</td>
                      </tr>

                    </tbody>
                  </table>
            </div>

            <div class="col-sm-12 ">
                <h3 class="mt-10 text-muted">Trạng thái đơn hàng: <span class="{{$donhang_a->getStatus($donhang_a->trangthai)['class']}}">{{$donhang_a->getStatus($donhang_a->trangthai)['name']}} </span></h3>

                @if($donhang_a->getStatus($donhang_a->trangthai)['name']==="Đang xử lí")
                <a href="{{route('get_user.don_hang.cancel',$donhang_a->id)}}" class="btn btn-sm btn-danger">Hủy bỏ</a>
                @else
                @endif
            </div>

           
        </div>


        <div class="row mt-5">
            <div class="col-sm-12">
                <h3>Danh sách chi tiết đơn hàng</h3>
                <table  class="table table-striped table-bordered bg-light" style="width:100%">
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
                            <td>{{$item->sanpham->tensanpham ?? "[N/A]"}}</td>

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

                <h3 align="right">Tổng tiền: <b class="text-danger">{{number_format($donhang_a->tongtien,0,'.','.')}} đ</b></h3>
            </div>


        </div>
                                           

	                                </div>
	                              
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                	
            </section>			
			<!-- End Maincontent  -->
@stop 


 