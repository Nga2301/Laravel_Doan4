<!doctype html>
<html class="no-js" lang="zxx">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('/')}}assets/img/favicon.png">

		<!-- all css here -->
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/animate.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/chosen.min.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/ionicons.min.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/bundle.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/style.css">
        <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/responsive.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
                <script src="{{URL::asset('/')}}assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
            <!-- Add your site or application content here -->

            <!--organicfood wrapper start-->
            <div class="organic_food_wrapper">
                <!--Header start-->
                <header class="header sticky-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="header_wrapper_inner">

                                    <div class="logo col-xs-12">
                                        <a href="index.html">
                                            <img src="{{URL::asset('/')}}assets/img/logo/logo.png" alt="">
                                        </a>
                                    </div>


                                    <div class="main_menu_inner">

                                        <div class="menu">
                                            <nav>
                                                <ul>
                                                    <li class="active"><a href="{{route('get.home')}}">Trang chủ </a>

                                                    </li>

                                                    <li><a href="about.html">Sản phẩm <i class="fa fa-angle-down"></i></a>
                                                        <ul class="sub_menu">
                                                            @foreach($loaisanphamGlobal as $item1)
                                                            <li><a href="{{route('get.san_pham_theo_loai',$item1->slug)}}">{{$item1->tenloai}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                     </li>

                                                    @foreach(config('nav.home.top') as $item)
                                                    <li><a href="{{route($item['route'])}}" class="{{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}">{{$item['name']}}</a>  </li>
                                                    @endforeach


                                                 </ul>
                                            </nav>
                                        </div>

                                        <div class="mobile-menu d-lg-none">
                                            <nav>
                                                <ul>
                                                    <li class="active"><a href="{{route('get.home')}}">Trang chủ </a>

                                                    </li>

                                                    <li><a href="about.html">Sản phẩm<i class="fa fa-angle-down"></i> </a>

                                                        <ul class="sub_menu">
                                                            @foreach($loaisanphamGlobal as $item1)
                                                            <li><a href="{{route('get.san_pham_theo_loai',$item1->slug)}}">{{$item1->tenloai}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                     </li>

                                                    @foreach(config('nav.home.top') as $item)
                                                    <li><a href="{{route($item['route'])}}" class="{{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}">{{$item['name']}}</a>  </li>
                                                    @endforeach


                                                 </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="header_right_info d-flex">
                                        <div class="search_box">
                                            <div class="search_inner">
                                                <form action="">
                                                    <input type="text" id="tukhoas" name="tim_kiem" value="{{\Request::get('tim_kiem')}}" placeholder="Tìm kiếm sản phẩm">
                                                    <button type="submit"><i class="ion-ios-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="mini__cart">
                                            <div class="mini_cart_inner">
                                                <div class="cart_icon">
                                                    <a href="#">
                                                        <span class="cart_icon_inner">
                                                            <i class="ion-android-cart"></i>
                                                            <span class="cart_count">{{\Cart::count()}}</span>
                                                        </span>
                                                        <span class="item_total">{{\Cart::subtotal(0)}}</span>
                                                    </a>
                                                </div>
                                                <!--Mini Cart Box-->
                                                <div class="mini_cart_box cart_box_one">

        @foreach ($sanphamcart as $row=> $item)
                                                    <div class="mini_cart_item">
                                                        <div class="mini_cart_img">
                                                            <a href="#">
                                                                <img src="{{pare_url_file($item->options->image)}}" alt="">
                                                                <span class="cart_count">{{$item->qty}}</span>
                                                            </a>
                                                        </div>
                                                        <div class="cart_info">
                                                            <h5><a href="product-details.html">{{$item->name}}</a></h5>
                                                            <span class="cart_price">{{number_format($item->price)}}</span>
                                                        </div>
                                                        <div class="cart_remove">
                                                            <a class="js-delete-cart-to" href="{{route('get_ajax.shopping.delete',$row)}}"><i class="zmdi zmdi-delete "></i></a>
                                                        </div>
                                                       
                                                    </div>
                                                    @endforeach

                                                    <div class="price_content">
                                                       
                                                        <div class="cart-total-price">
															<span class="label">Tổng tiền </span>
															<span class="value">{{\Cart::subtotal(0)}}</span>
														</div>
                                                    </div>
                                                    <div class="min_cart_checkout mb-5">
                                                        <a href="{{route('get.gio_hang')}}">Xem giỏ hàng</a>
                                                    </div>
													<div class="min_cart_checkout">
                                                        <a href="{{route('get.gio_hang.thanh_toan')}}">Thanh toán</a>
                                                    </div>
                                                </div>
                                                <!--Mini Cart Box End -->
                                            </div>
                                        </div>
                                        <div class="header_account">
                                            <div class="account_inner">
                                                <a href="#"><i class="ion-gear-b"></i></a>
                                            </div>
                                            <div class="content-setting-dropdown">
												<div class="language-selector-wrapper">
													
                                                @if(get_data_user('web'))
													<div class="user_info_top">
														<ul>
                                                        <li><h3>{{get_data_user('web','name')}}</h3></li>
															<li><a href="{{route('get_user.home')}}">Tài khoản của tôi</a></li>
															<li><a href="checkout.html">Đơn hàng</a></li>
															<li><a href="{{route('get.logout')}}">Đăng xuất</a></li>
														</ul>
													</div>
                                                    @else
                                                    <div class="user_info_top">
														<ul>
															<li><a href="{{route('get.login')}}">Đăng nhập</a></li>
															
														</ul>
													</div>
                                                    @endif
												</div>
											</div>
                                        </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!--Header end-->
                @if(\Request::route()->getName()=='get.home' && !\Request::get('tim_kiem') )
                <!--Slider start-->
                <div class="slider_area">
                    <div class="slider_list  owl-carousel">
                        <div class="single_slide" style="background-image: url(assets/img/slider/1.jpg);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slider__content">
                                            
                                            <div class="slider_btn">
                                                <a href="shop.html">Shopping now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_slide" style="background-image: url(assets/img/slider/2.jpg);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slider__content">
                                           
                                            <div class="slider_btn">
                                                <a href="shop.html">Shopping now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Slider end-->

                <!--Banner area start-->
                <div class="banner_area home1_banner mt-30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_banner banner_three">
                                    <a href="#">
                                        <img src="assets/img/banner/3.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Banner area end-->
                @endif

                @yield('content')

                <!--Brand logo start-->
                <div class="brand_logo">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="brand_list_carousel owl-carousel">
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

                <!-- footer start -->
                <footer class="footer pt-90">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-12 col-xs-12">
                                <!--Single Footer-->
                                <div class="single_footer widget">
                                    <div class="single_footer_widget_inner">
                                        <div class="footer_logo">
                                            <a href="#"><img src="assets/img/logo/logo_footer.png" alt=""></a>
                                        </div>
                                        <div class="footer_content">
                                            <p>Address: 28th floor, Lotte Center Hanoi Building, 54 Lieu Giai, Cong Vi ward, Ba Dinh , Hanoi..</p>
                                            <p>Phone: +(000) 800 456 789</p>
                                            <p>Email: Contact@posthemes.com</p>
                                        </div>
                                        <div class="footer_social">
                                            <h4>Liên lạc:</h4>
                                            <div class="footer_social_icon">
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-youtube"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Single Footer-->
                            </div>
                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <div class="footer_menu_list d-flex justify-content-between">
                                    <!--Single Footer-->
                                    <div class="single_footer widget">
                                        <div class="single_footer_widget_inner">
                                            <div class="footer_title">
                                                <h2>Các sản phẩm</h2>
                                            </div>
                                            <div class="footer_menu">
                                                <ul>
                                                    <li><a href="#">Giá giảm</a></li>
                                                    <li><a href="#"> Sản phẩm mới</a></li>
                                                    <li><a href="#"> Hàng bán tôt nhât</a></li>
                                                    <li><a href="#"> Liên hệ chúng tôi</a></li>
                                                    <li><a href="#"> Tài khoản của tôi</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Single footer end-->
                                    <!--Single footer start-->
                                    <div class="single_footer widget">
                                        <div class="single_footer_widget_inner">
                                            <div class="footer_title">
                                                <h2>Đăng nhập</h2>
                                            </div>
                                            <div class="footer_menu">
                                                <ul>
                                                    <li><a href="#">Sơ đồ trang web</a></li>
                                                    <li><a href="#"> Cửa hàng</a></li>
                                                    <li><a href="#"> Đăng nhập</a></li>
                                                    <li><a href="#"> Liên hệ chúng tôi</a></li>
                                                    <li><a href="#"> Tài khoản của tôi</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Single Footer end-->
                                    <!--Single footer start-->
                                    <div class="single_footer widget">
                                        <div class="single_footer_widget_inner">
                                            <div class="footer_title">
                                                <h2> Tài khoản của bạn </h2>
                                            </div>
                                            <div class="footer_menu">
                                                <ul>
                                                    <li><a href="#">Personal info</a></li>
                                                    <li><a href="#"> Đơn hàng</a></li>
                                                    <li><a href="#"> Đăng nhập</a></li>
                                                    <li><a href="#"> Phiếu tín dụng</a></li>
                                                    <li><a href="#"> Địa chỉ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Single Footer end-->
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-xs-12">
                                <div class="footer_title">
                                    <h2> Tham gia bản tin của chúng tôi ngay bây giờ </h2>
                                </div>
                                <div class="footer_news_letter">
                                    <p>Nhận cập nhật qua email về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                                    <div class="newsletter_form">
                                        <form action="#">
                                            <input type="email" required placeholder="Địa chỉ email của bạn">
                                            <input type="submit" value="Đăng ký">
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="copyright">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="copyright_text">
                                        <p>Copyright 2021 <a href="#">Organicfood</a>. All Rights Reserved</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="footer_mastercard text-right">
                                        <a href="#"><img src="assets/img/brand/payment.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </footer>

                <!-- footer end -->
            </div>

		<!-- all js here -->
        <script src="{{URL::asset('/')}}assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="{{URL::asset('/')}}assets/js/popper.js"></script>
        <script src="{{URL::asset('/')}}assets/js/bootstrap.min.js"></script>
        <script src="{{URL::asset('/')}}assets/js/jquery.meanmenu.min.js"></script>
        <script src="{{URL::asset('/')}}assets/js/isotope.pkgd.min.js"></script>
        <script src="{{URL::asset('/')}}assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{URL::asset('/')}}assets/js/jquery.counterup.min.js"></script>
        <script src="{{URL::asset('/')}}assets/js/waypoints.min.js"></script>
        <script src="{{URL::asset('/')}}assets/js/ajax-mail.js"></script>
        <script src="{{URL::asset('/')}}assets/js/owl.carousel.min.js"></script>
        <script src="{{URL::asset('/')}}assets/js/plugins.js"></script>
        <script src="{{URL::asset('/')}}assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>

        <script>
            var path="{{route('get.autocomplete')}}";

                $('input.typeahead').typeahead({
                    source: function(tim_kiem,process){
                        return $.get(path,{tim_kiem:tim_kiem},function(data){
                            return process(data);

    console.log(data)
                        });
                    }
                });





                var substringMatcher = function(strs) {
      return function findMatches(q, cb) {
        var matches, substringRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function(i, str) {
          if (substrRegex.test(str)) {
            matches.push(str);
          }
        });

        cb(matches);
      };
    };
                var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
      'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
      'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
      'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
      'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
      'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
      'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
      'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
      'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
    ];

    $('#the-basics .typeahead').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'states',
      source: substringMatcher(states)
    });


    $("body").on('click','.js-add-cart',function(event){
         event.preventDefault()//k reload trang
         let $this=$(this)
         let URL=$this.attr('href')
         let qty=1
         let $elementQty=$this.parents('.box-qty').find(".val-qty")
         if($elementQty.length){
             qty=$elementQty.val()
         }
         console.log(qty)
         $.ajax({
             url: URL,
             data:{
                 qty:qty
             },
         }).done(function(results){
            window.location.reload();
         });
     });


     $("body").on('click','.js-delete-cart',function(event){
         event.preventDefault()
         let $this=$(this)
         let URL=$this.attr('href')
         $.ajax({
             url: URL,
         }).done(function(results){
            console.log(results);
            if(results.status === 200) {
                    $this.parents('tr').remove();
                    window.location.reload();
                }
         });
     });
     $("body").on('click','.js-delete-cart-to',function(event){
         event.preventDefault()
         let $this=$(this)
         let URL=$this.attr('href')
         $.ajax({
             url: URL,
         }).done(function(results){
            console.log(results);
            if(results.status === 200) {
                    $this.parents('.mini_cart_item').remove();
                    window.location.reload();
                }
         });
     });

     $("body").on('click','.js-update-cart',function(event){
         event.preventDefault()
         let $this=$(this)
         let URL=$this.attr('href')
         let qty=1
         let $elementQty=$this.parents('tr').find(".val-qty")
         if($elementQty.length){
             qty=$elementQty.val()
         }
         $.ajax({
             url: URL,
             data:{
                 qty:qty
             },
         }).done(function(results){
            console.log(results);
            window.location.reload();
         });
     });

         $(function () {
        $('.dropdown').change(function () {
           $('#form_loc').submit();
        });
        $('.status').change(function () {
           $('#form_status').submit();
        });

     });


        </script>
    </body>

</html>
