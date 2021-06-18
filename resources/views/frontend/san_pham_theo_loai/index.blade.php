@extends('layouts.app_frontend')
@section('title','Smootthie & Fruit Shop')
@section('content')

<!-- :::::: Start Main Container Wrapper :::::: -->
<div class="organic_food_wrapper">

@include('frontend.san_pham_theo_loai.tag_header')

       
                <!--- shop_wrapper area  -->
                <div class="shop_wrapper ptb-90">
                    <div class="container-fluid">
                        <div class="row">

                        @include('frontend.san_pham_theo_loai.left_menu')

                            <div class="col-lg-9 col-md-12 col-12">
                                <div class="categories_banner">
                                    <div class="categories_banner_inner">
                                        <img src="assets/img/banner/shop.jpg" alt="">
                                    </div>
                                    <h3>SHOP</h3>
                                </div>
                                <div class="tav_menu_wrapper">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-7 col-sm-6">
                                            <div class="tab_menu shop_menu">
                                                <div class="tab_menu_inner">
                                                    <ul class="nav" role="tablist">
                                                        <li><a  class="active" data-toggle="tab" href="#shop_active" role="tab" aria-controls="shop_active" aria-selected="true"><i class="fa fa-th" aria-hidden="true"></i></a></li>

                                                        <li><a data-toggle="tab" href="#featured_active" role="tab" aria-controls="featured_active" aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="tab_menu_right">    
                                                    <p>Có {{$count}} sản phẩm</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-sm-6">
                                            <div class="Relevance">
                                            <form id="form_loc" method="get">
                                                <span>Hiển thị theo:</span>
                                                <div class="dropdown dropdown-shop">
                                                    <select name="drop" id="dropdown">
                                                        <option value="1">Mặc định</option>   
                                                        <option value="2">Theo tên, từ A đến Z</option>
                                                        <option value="3">Theo tên, từ Z đến A</option>
                                                        <option value="4">Theo giá, từ thấp đến cao</option>
                                                        <option value="5">Theo giá, từ cao đến thấp</option>
                                                        <option value="6">Mới nhất</option>
                                                    </select>
                                                </div>
                                            </form>
                                            </div>    
                                        </div>    
                                    </div>
                                </div> 
                                <div class="tab_product_wrapper">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="shop_active" >
                                            <div class="row">
                                            @foreach ($sanphambyloai as $item)
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                    <div class="single__product">
                                                        <div class="single_product__inner">
                                                            <!-- <span class="new_badge">new</span>
                                                            <span class="discount_price">-5%</span> -->
                                                            <div class="product_img">
                                                                <a href="{{route('get.chi_tiet_san_pham',$item->slug)}}">
                                                                    <img src="{{pare_url_file($item->hinhanh)}}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="product__content text-center">
                                                                <div class="produc_desc_info">
                                                                    <div class="product_title">
                                                                        <h4><a href="{{route('get.chi_tiet_san_pham',$item->id)}}">{{$item->tensanpham}}</a></h4>
                                                                    </div>
                                                                    <div class="product_price">
                                                                        <p>{{number_format($item->gia,0,',',',')}} đ</p>
                                                                    </div>
                                                                </div>
                                                                <div class="product__hover">
                                                                    <ul>
                                                                        <li><a class="js-add-cart" href="{{route('get_ajax.shopping.add',$item->id)}}"><i class="ion-android-cart"></i></a></li>
                                                                        <li><a class="cart-fore" href="{{route('get.chi_tiet_san_pham',$item->slug)}}"  ><i class="ion-android-open"></i></a></li>

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
                                        <div class="tab-pane fade" id="featured_active" role="tabpanel">
                                        @foreach ($sanphambyloai as $item)
                                            <div class="tab_product_bottom_wrapper">    
                                                <div class="row">
                                                   <div class="col-lg-4 col-md-5 col-sm-5">
                                                        <div class="single_product__inner inner_shop">
                                                           
                                                            <div class="product_img">
                                                                <a href="{{route('get.chi_tiet_san_pham',$item->slug)}}">
                                                                    <img src="{{pare_url_file($item->hinhanh)}}" alt="">
                                                                </a>
                                                            </div>

                                                        </div> 
                                                    </div> 
                                                    <div class="col-lg-8 col-md-7 col-sm-7">
                                                        <div class="product__content text-left">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title title_shop">
                                                                    <h4><a href="{{route('get.chi_tiet_san_pham',$item->id)}}">{{$item->tensanpham}}</a></h4>
                                                                </div>
                                                                <div class="product_price price_shop">
                                                                 
                                                                    <p>{{number_format($item->gia,0,',',',')}} đ</p>
                                                                </div>
                                                                <div class="product_content_shop">
                                                              <p>  <?php
                                $str = "{$item->mota}"; //Tạo chuỗi
                               // $str = strip_tags($str); //Lược bỏ các tags HTML

                                echo $str;
                            ?>
                                          </p>                      </div>
                                                            </div>
                                                            <div class="product__hover hover_shop">
                                                               <div class="product_addto_cart">
                                                                    <button type="submit" ><a href="{{route('get_ajax.shopping.add',$item->id)}}" class="js-add-cart"> ADD TO CART</a></button> 
                                                               </div>
                                                               <div class="product_cart_icone">
                                                                    <ul>
                                                                        <li><a class="js-add-cart" href="{{route('get_ajax.shopping.add',$item->id)}}"><i class="ion-android-cart"></i></a></li>
                                                                        <li><a class="cart-fore" href="{{route('get.chi_tiet_san_pham',$item->slug)}}"  ><i class="ion-android-open"></i></a></li>

                                                                        <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
                                                                    </ul>
                                                                </div>    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach 
                                        </div>
                                    </div>  
                                   
                                </div>
                                <div class="shop_pagination">
                                    <div class="row align-items-center">   
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="total_item_shop">
                                            Hiển thị 1-{{$count_page}} trong tổng số {{$count}} 
                                            </div>
                                        </div>
                                        <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                                             <div class="d-flex justify-content-center">
                                                 {{ $sanphambyloai->links() }}
                                            </div>      
                                        </div>
                                    </div>          
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>   
                <!--- shop_wrapper area end  -->

                <!--Brand logo start-->  
                <div class="brand_logo">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="brand_list_carousel owl-carousel shop_page">
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/1.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/2.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/3.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/4.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/5.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/1.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/2.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/3.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/4.png" alt="brand logo">
                                        </a>
                                    </div>
                                    <div class="single_brand_logo">
                                        <a href="#">
                                            <img src="assets/img/brand/5.png" alt="brand logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--Brand logo end-->   
                
            

            </div>
           
           
           <!--organicfood wrapper end--> 
           
          
@stop
