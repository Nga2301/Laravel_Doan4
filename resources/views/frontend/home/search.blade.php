@extends('layouts.app_frontend')
@section('title','Smootthie & Fruit Shop')
@section('content')

<!-- :::::: Start Main Container Wrapper :::::: -->

    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
 <!-- ::::::  Start  Breadcrumb Section  ::::::  -->

 <div class="page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="page-breadcrumb__menu">
                    <li class="page-breadcrumb__nav"><a href="#">Home</a></li>

                    <li class="page-breadcrumb__nav active" >Kết quả tìm kiếm</li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- ::::::  End Breadcrumb Section  ::::::  -->

 @include('frontend.san_pham_theo_loai.left_menu')
     <!-- Start Rightside - Product Type View -->
            <div class="col-lg-9">
                
                <!-- ::::::  Start Sort Box Section  ::::::  -->
                <div class="sort-box m-tb-40">
                    <!-- Start Sort Left Side -->
                    <div class="sort-box-item">
                        <div class="sort-box__tab">
                            <ul class="sort-box__tab-list nav">
                                <li><a class="sort-nav-link active" data-toggle="tab" href="#sort-grid"><i class="fas fa-th"></i>  </a></li>
                                <li><a class="sort-nav-link" data-toggle="tab" href="#sort-list"><i class="fas fa-list-ul"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- Start Sort Left Side -->

                    <div class="sort-box-item d-flex align-items-center flex-warp">
                        <span>Hiển thị theo:</span>
                        <div class="sort-box__option">
                            <label class="select-sort__arrow">
                                <select name="select-sort" class="select-sort">
                                    <option value="1">Mặc định</option>
                                    <option value="2">Theo tên, từ A đến Z</option>
                                    <option value="3"> Theo tên, tư Z đến A </option>
                                    <option value="4"> Theo giá, từ thấp đến cao</option>
                                    <option value="5">Theo giá, từ cao đến thấp</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <div class="sort-box-item">
                        <span>Hiển thị 1-9 trong tổng số 12</span>
                    </div>
                </div> <!-- ::::::  Start Sort Box Section  ::::::  -->

                <div class="product-tab-area">
                    <div class="tab-content tab-animate-zoom">
                        <div class="tab-pane show active shop-grid" id="sort-grid">
                            <div class="row">
                                @foreach ($search_douong as $item)
                                <div class="col-md-4 col-12">
                                    <!-- Start Single Default Product -->
                                    <div class="product__box product__default--single text-center">
                                        <!-- Start Product Image -->
                                        <div class="product__img-box  pos-relative" style="width:100%;height:300px">
                                            <a href="{{route('get.chi_tiet_san_pham',$item->slug)}}" class="product__img--link">
                                                <img class="product__img img-fluid" style="width:100%;height:100%" src="{{pare_url_file($item->hinhanh)}}" alt="">
                                            </a>
                                            <!-- Start Procuct Label -->
                                            <!-- End Procuct Label -->
                                            <!-- Start Product Action Link-->
                                            <ul class="product__action--link pos-absolute">
                                                <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                                                <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                                <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                                <li><a href="{{route('get.chi_tiet_san_pham',$item->slug)}}" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                            </ul> <!-- End Product Action Link -->
                                        </div> <!-- End Product Image -->
                                        <!-- Start Product Content -->
                                        <div class="product__content m-t-20">

                                            <a href="{{route('get.chi_tiet_san_pham',$item->slug)}}" class="product__link">{{$item->tensanpham}}</a>
                                            <div class="product__price m-t-5">
                                                <span class="product__price">{{number_format($item->gia,0,',',',')}} đ{{-- <del>$29.00</del>--}}</span>
                                            </div>
                                        </div> <!-- End Product Content -->
                                    </div> <!-- End Single Default Product -->
                                </div>
                                @endforeach



                            </div>
                        </div>
                        <div class="tab-pane shop-list" id="sort-list">
                            <div class="row">
                                @foreach ($search_sanpham as $item)
                                <!-- Start Single List Product -->
                                <div class="col-12">
                                    <div class="product__box product__box--list">
                                        <!-- Start Product Image -->
                                        <div class="product__img-box  pos-relative text-center">
                                            <a href="{{route('get.chi_tiet_san_pham',$item->slug)}}" class="product__img--link">
                                                <img class="product__img img-fluid" src="{{pare_url_file($item->hinhanh)}}" alt="">
                                            </a>
                                            <!-- Start Procuct Label -->
                                                <span class="product__label product__label--sale-dis">-31%</span>
                                            <!-- End Procuct Label -->
                                        </div> <!-- End Product Image -->
                                        <!-- Start Product Content -->
                                        <div class="product__content">

                                            <a href="{{route('get.chi_tiet_san_pham',$item->slug)}}" class="product__link"><h5 class="font--regular">{{$item->tensanpham}}</h5></a>
                                            <div class="product__price m-t-5">
                                                 <span class="product__price">{{number_format($item->gia,0,',',',')}} đ{{-- <del>$80.00</del>--}}</span>
                                            </div>
                                            <div class="product__desc">
                                                <p>{{$item->mota}}
                                                </p>
                                            </div>
                                            <!-- Start Product Action Link-->
                                            <ul class="product__action--link-list m-t-30">
                                                <li><a href="#modalAddCart" data-toggle="modal" class="btn--black btn--black-hover-green">Thêm vào giỏ hàng</a></li>
                                                <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                                                <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                            </ul> <!-- End Product Action Link -->
                                        </div> <!-- End Product Content -->
                                    </div>
                                </div> <!-- End Single List Product -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-pagination">
                    <ul class="page-pagination__list">
                        <li class="page-pagination__item"><a class="page-pagination__link"  href="#">Prev</a>
                        <li class="page-pagination__item"><a class="page-pagination__link active"  href="#">1</a></li>
                        <li class="page-pagination__item"><a class="page-pagination__link"  href="#">2</a></li>
                        <li class="page-pagination__item"><a class="page-pagination__link"  href="#">Next</a>
                        </li>
                      </ul>
                </div>
            </div>  <!-- Start Rightside - Product Type View -->
        </div>
    </div>
 <!-- :::::: End MainContainer Wrapper :::::: -->

@stop
