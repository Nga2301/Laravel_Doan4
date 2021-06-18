@extends('layouts.app_frontend')
@section('title','Organic Shop')
@section('content')

   <!--breadcrumb area start-->
   <div class="breadcrumb_container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">     
                            <nav>
                        <ul>
                            <li><a href="{{route('get.home')}}">Home ></a></li>
                            <li>Cart</li>
                        </ul>
                    </nav>
                        </div>
                    </div> 
                </div>        
            </div>
            <div class="cart_main_area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">  
                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="width:5%">STT</th>
                                                <th class="img-thumbnail">Hình ảnh</th>
                                                <th class="product-name">Sản phẩm</th>
                                                <th  class="product-price">Giá (VNĐ)</th>
                                                <th style="width:15%" class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Thành tiền (VNĐ)</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $tt=1;  ?>
                                        @foreach($sanphamcart as $row => $item)
                                            <tr>
                                                <td><?php echo $tt++ ?></td>
                                                <td class="product-thumbnail"><img style="width:100px;height:100px" src="{{pare_url_file($item->options->image)}}" alt=""></td>
                                                <td class="product-name"><a href="#">{{$item->name}}</a></td>
                                                <td class="product-price ml-2" style="text-align:left"><span class="amount">{{number_format($item->price)}} </span></td>
                                                <td class="product-quantity">
                                                    <div class="quickview_plus_minus quick_cart">
                                                        <div class="quickview_plus_minus_inner">
                                                            <div class="cart-plus-minus cart_page">
                                                                <input type="text" min="1" step="1" value="{{$item->qty}}" name="qtybutton" class="val-qty cart-plus-minus-box">
                                                            </div>
                                                        </div>    
                                                    </div> 
                                                </td>
                                                <td class="product-subtotal ml-2" style="text-align:left">{{number_format($item->price * $item->qty)}}</td>
                                                <td class="product-remove">
                                                    <a class="js-update-cart" href="{{route('get_ajax.shopping.update',$row)}}"><i class="fa fa-pencil-alt"></i></a>
                                                    <a class="js-delete-cart ml-3" href="{{route('get_ajax.shopping.delete',$row)}}"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                      
                                    </table>
                                </div>
                                <div class="row table-responsive_bottom">
                                    <div class="col-lg-7 col-sm-7 col-md-7">
                                       <div class="buttons-carts">
                                           
                                            <a href="{{route('get.home')}}">Tiếp tục mua sắm</a>   
                                        </div> 
                                        
                                    </div> 
                                    <div class="col-lg-5 col-sm-5 col-md-5">
                                         <div class="cart_totals  text-right">
                                            <h2>Tổng giỏ hàng</h2>
                                            <div class="cart-subtotal">
                                                <span>Tổng tiền</span>    
                                                <span>{{\Cart::subtotal(0)}} VNĐ</span>    
                                            </div>

                                            @if(get_data_user('web'))
                                            <div class="wc-proceed-to-checkout">
                                                <a href="{{route('get.gio_hang.thanh_toan')}}">Thanh toán</a>
                                            </div>
                                            @else
                                            <div class="wc-proceed-to-checkout">
                                                <a href="{{route('get.login')}}">Thanh toán</a>
                                            </div>
                                            @endif
                                         </div>    
                                    </div>    
                                </div>
                            </form>         
                        </div>    
                    </div>    
                </div>   
            </div>
@stop