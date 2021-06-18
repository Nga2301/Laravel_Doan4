@extends('layouts.app_frontend')
@section('title','Organic Shop')
@section('content')
 <!--breadcrumb area start-->
 <div class="breadcrumb_container ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">     
                            <nav>
                        <ul>
                            <li>
                                <a href="index.html">Home ></a>
                            </li>
                            <li>checkout</li>
                        </ul>
                    </nav>
                        </div>
                    </div> 
                </div>        
            </div>
             <!--breadcrumb area end-->

   <!--Checkout page section-->
   <div class="Checkout_page_section">
                <div class="container">
                   
                    <div class="checkout-form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <form action="" method="post">
                                    @csrf
                                    <h3>Thông tin khách hàng nhận hàng</h3>
                                    <div class="row">
                                       
                                        <div class="col-lg-6 mb-30">
                                            <label for="b_f_name">Họ tên <span>*</span></label>
                                            <input id="b_f_name" name="hoten" value="{{$user->name ?? ''}}" type="text">    
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label for="b_name">Số điện thoại  <span>*</span></label>
                                            <input id="b_name" value="{{$user->phone ?? ''}}" name="sodienthoai" type="text"> 
                                        </div>
                                        
                                        <div class="col-12 mb-30">
                                            <label>Địa chỉ <span>*</span></label>
                                            <input placeholder="Street address" value="{{$user->address ?? ''}}" name="diachi" type="text">     
                                        </div>
                                       
                                      
                                      
                                        <div class="col-lg-12 mb-30">
                                            <label for="b_email">Email <span>*</span></label>
                                            <input id="b_email" value="{{$user->email ?? ''}}" name="email" type="email">    
                                        </div> 
                                        
                                       
                                       
                                        <div class="col-12">
                                            <div class="order-notes">
                                                 <label for="order_note">Ghi chú</label>
                                                <textarea id="order_note" name="ghichu"  placeholder="Ghi chú về đơn hàng, ví dụ: Giao hàng nhanh."></textarea>
                                            </div>    
                                        </div>     	    	    	    	    	    	    
                                    </div>
                                    <div class="order-button">
                                            <button  type="submit">Đặt hàng</button> 
                                        </div>  
                                </form>    
                            </div>
                            <div class="col-lg-6 col-md-6">
                               
                                <div class="order-wrapper">
                                    <h3>Đơn hàng của bạn</h3>
                                    <div class="order-table table-responsive mb-30">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($sanphamcart as $row => $item)
                                                <tr>
                                                    <td class="product-name">{{$item->name}} <strong> × {{$item->qty}}</strong></td>
                                                    <td class="amount"> {{number_format($item->price * $item->qty )}} VNĐ</td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                            <tfoot>
                                               
                                                <tr>
                                                    <th>Tổng tiền</th>
                                                    <td><strong>{{\Cart::subtotal(0)}} VNĐ</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>    
                                    </div>
                                  
                                </div>  
                            </div>
                        </div> 
                    </div>     
                </div>    
            </div>
            <!--Checkout page section end-->
@stop
