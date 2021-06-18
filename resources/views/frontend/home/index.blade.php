@extends('layouts.app_frontend')
@section('title','OrganicFood Shop')
@section('content')
       <!--best seller-->
<div class="new_product mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section_title space_2 text-left">
                    <h3>Sản phẩm khuyến mại</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="features_product_active owl-carousel">
                @foreach($giabans as $item)

                <div class="col-lg-2">
                    <div class="single__product">
                        <div class="single_product__inner">
                            <span class="discount_price">-{{floor(100-((($item->gia)/($item->sanpham->gia))*100))}} %</span>
                            <div class="product_img">
                            <a href="{{route('get.chi_tiet_san_pham',$item->sanpham->slug)}}">
                                <img src="{{pare_url_file($item->sanpham->hinhanh)}}" alt="Hình ảnh">
                                </a>
                            </div>
                            <div class="product__content text-center">
                                <div class="produc_desc_info">
                                    <div class="product_title">
                                        <h4><a href="{{route('get.chi_tiet_san_pham',$item->sanpham->slug)}}">{{$item->sanpham->tensanpham}}</a></h4>
                                    </div>
                                    <div class="product_price">
                                        <span class="regular_price">{{number_format($item->gia ?? 0,0,',',',')}} đ  <del>{{number_format($item->sanpham->gia ?? 0,0,',',',')}} đ</del></span>
                                       
                                    </div>
                                </div>
                                <div class="product__hover">
                                    <ul>
                                        <li><a class="js-add-cart"  href="{{route('get_ajax.shopping.add',$item->sanpham->id)}}"><i class="ion-android-cart"></i></a></li>
                                        <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>
                                        <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--new product end-->


<!--Shipping area start-->
<div class="shipping_area mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="shipping_list d-flex justify-content-between flex-xs-column">
                    <div class="single_shipping_box d-flex">
                        <div class="shipping_icon">
                            <img src="{{URL::asset('/')}}assets/img/ship/1.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>Giao hàng miễn phí cho đơn hàng trên 100K</h6>
                            <p>Giao hàng miễn phí cho tất cả các đơn đặt hàng</p>
                        </div>
                    </div>
                    <div class="single_shipping_box one d-flex">
                        <div class="shipping_icon">
                            <img src="{{URL::asset('/')}}assets/img/ship/2.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>Trả lại tiền</h6>
                            <p>Đảm bảo trở lại dưới 7 ngày</p>
                        </div>
                    </div>
                    <div class="single_shipping_box two d-flex">
                        <div class="shipping_icon">
                            <img src="{{URL::asset('/')}}assets/img/ship/3.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>Giảm giá thành viên</h6>
                            <p>Hỗ trợ trực tuyến 24 giờ một ngày</p>
                        </div>
                    </div>
                    <div class="single_shipping_box three d-flex">
                        <div class="shipping_icon">
                            <img src="{{URL::asset('/')}}assets/img/ship/4.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>Hỗ trợ trực tuyến 24/7</h6>
                            <p>Giao hàng miễn phí cho tất cả các đơn đặt hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Shipping area end-->


<!--New product area-->
<div class="new_product mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section_title space_2 text-left">
                    <h3>Sản phẩm mới</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="features_product_active owl-carousel">
                @foreach ($sanphamnews as $item1)
                <div class="col-lg-2">
                    <div class="single__product">
                        <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                            <a href="{{route('get.chi_tiet_san_pham',$item1->slug)}}">
                                <img src="{{pare_url_file($item1->hinhanh)}}" style="height:250px" alt="">
                            </a>
                            </div>
                            <div class="product__content text-center">
                                <div class="produc_desc_info">
                                    <div class="product_title">
                                        <h4><a href="{{route('get.chi_tiet_san_pham',$item1->slug)}}">{{$item1->tensanpham}}</a></h4>
                                    </div>
                                    <div class="product_price">
                                        <p>{{number_format($item1->gia ?? 0,0,',',',')}} đ</p>
                                    </div>
                                </div>
                                <div class="product__hover">
                                    <ul>
                                        <li><a class="js-add-cart"  href="{{route('get_ajax.shopping.add',$item1->id)}}"><i class=" ion-android-cart"></i></a></li>
                                        <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>
                                        <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--new product end-->

<!--Banner area start-->
<div class="banner_area banner_area-2 pb-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/banner-4.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/banner-5.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/banner-6.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
   <!--Banner area end-->
@stop
