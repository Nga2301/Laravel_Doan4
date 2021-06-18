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
	                        <div class="col-sm-12 col-md-3 col-lg-3">
	                            <!-- Nav tabs -->
	                            <ul role="tablist" class="nav flex-column dashboard-list">
                                    
	                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Thông tin cá nhân</a></li>
	                                <li> <a href="#orders" {{Request::get('user')}} data-toggle="tab" class="nav-link">Đơn hàng</a></li>
	                               
	                            </ul>
	                        </div>
	                        <div class="col-sm-12 col-md-9 col-lg-9">
	                            <!-- Tab panes -->
	                            <div class="tab-content dashboard-content">
	                                <div class="tab-pane fade show active" id="dashboard">
                                    <form action="" method="post">
                                    @csrf
                                  
                                    <div class="row">
                                       
                                        <div class="col-lg-6 mb-30">
                                            <label for="b_f_name">Họ tên <span>*</span></label>
                                            <input id="b_f_name" name="name" value="{{$user->name ?? ''}}" type="text">    
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label for="b_name">Số điện thoại  <span>*</span></label>
                                            <input id="b_name" value="{{$user->phone}}" name="phone" type="text"> 
                                        </div>
                                        
                                        <div class="col-12 mb-30">
                                            <label>Địa chỉ <span>*</span></label>
                                            <input placeholder="Street address" value="{{$user->address}}" name="address" type="text">     
                                        </div>
                                       
                                      
                                      
                                        <div class="col-lg-12 mb-30">
                                            <label for="b_email">Email <span>*</span></label>
                                            <input  value="{{$user->email}}" name="email" type="email">    
                                        </div> 
                                        
                                       
                                       
                                          	    	    	    	    	    	    
                                    </div>
                                    <div class="order-button">
                                            <button  type="submit">Cập nhật</button> 
                                        </div>  
                                </form>  
	                                </div>
	                                <div class="tab-pane fade" id="orders">
                                   

                                
                                       
	                                    <h3>Tất cả đơn hàng của bạn</h3>
                                        <form class="form-inline" id="form_status" style="float:right">

                                        <div class="form-group mx-sm-3 mb-2" >
                                        <select name="status" class="form-controll status" >
                                                <option>Trạng thái đơn hàng</option>
                                                 <option value="1" {{ Request::get('status') == 1 ?? "selected='selected'" }}>Đang xử lí</option>
                                                <option value="2" {{ Request::get('status') == 2 ?? "selected='selected'" }}>Đang giao hàng</option>
                                                <option value="3" {{ Request::get('status') == 3 ?? "selected='selected'" }}>Đã giao hàng</option>
                                                 <option value="-1" {{ Request::get('status') == -1 ?? "selected='selected'" }}>Đã hủy</option>
                                        </select>
                                        </div>

                                        </form>
	                                    <div class="organic-table-area table-responsive">
	                                        <table class="table">
	                                            <thead>
	                                                <tr>
	                                                    <th>STT</th>
	                                                    <th>Thời gian tạo</th>
	                                                    <th>Trạng thái</th>
	                                                    <th>Tổng tiền</th>
	                                                    <th>Chức năng</th>	 	 	 	
	                                                </tr>
	                                            </thead>
	                                            <tbody>
                                                <?php $tt=1?>
                                                 @foreach($donhang as $item)
	                                                <tr>
                                                    <th scope="row"><?php  echo $tt++ ?></th>
	                                                    <td>{{date('d/m/Y',strtotime($item->ngaytao))}}</td>
	                                                    <td><span class="{{$item->getStatus($item->trangthai)['class']}}">{{$item->getStatus($item->trangthai)['name']}}</span></td>
	                                                    <td>{{number_format($item->tongtien,0,',',',')}} đ </td>
	                                                    <td><a href="{{route('get_user.don_hang.view',$item->id)}}" class="view">Xem</a></td>
	                                                </tr>
                                                    @endforeach
	                                            </tbody>
	                                        </table>
                                           

	                                
                                   
                                    </div>
	                              
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>       	
            </section>			
			<!-- End Maincontent  -->
@stop 