<!-- @if($sanphamtt_giaban!=null)
                                @foreach($sanphamtt_giaban as $item)
                                <div class="col-lg-2">
                                    <div class="single__product">
                                        <div class="single_product__inner">
                                           
                                            <span class="discount_price right">-{{floor(100-((($sanphamct->gia)/($sanphamct->sanpham->gia))*100))}} %</span> 
                                            <div class="product_img">
                                            <a href="{{route('get.chi_tiet_san_pham',$item->sanpham->slug)}}">
                                                <img src="{{pare_url_file($item->sanpham->hinhanh)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product__content text-center">
                                                <div class="produc_desc_info">
                                                    <div class="product_title">
                                                        <h4><a href="{{route('get.chi_tiet_san_pham',$item->sanpham->slug)}}">{$item->tensanpham}}</a></h4>
                                                    </div>
                                                    <div class="product__price">
                                                          <span class="product__price">{{number_format($item->gia,0,',',',')}} đ
                                                         <del>{{number_format($item->sanpham->gia,0,',',',')}} đ</del>
                                                             </span>
                                                      </div>
                                                </div>
                                                <div class="product__hover">
                                                    <ul>
                                                        <li><a href="{{route('get_ajax.shopping.add',$item->sanpham->id)}}"><i class="ion-android-cart js-add-cart"></i></a></li>
                                                          <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>
                                                        <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                @endforeach
              @elseif($sanphamtt_new!=null)
              @foreac ($sanphamtt_new as $item)
              <div class="col-lg-2">
                                    <div class="single__product">
                                        <div class="single_product__inner">
                                            <span class="new_badge">new</span>
                                          
                                            <div class="product_img">
                                            <a href="{{route('get.chi_tiet_san_pham',$item->sanpham->slug)}}">
                                                <img src="{{pare_url_file($item->hinhanh)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product__content text-center">
                                                <div class="produc_desc_info">
                                                    <div class="product_title">
                                                        <h4><a href="{{route('get.chi_tiet_san_pham',$item->slug)}}">{$item->tensanpham}}</a></h4>
                                                    </div>
                                                    <div class="product__price">
                                                          <span class="product__price">{{number_format($item->gia,0,',',',')}} đ
                                                       
                                                             </span>
                                                      </div>
                                                </div>
                                                <div class="product__hover">
                                                    <ul>
                                                        <li><a href="{{route('get_ajax.shopping.add',$item->id)}}"><i class="ion-android-cart js-add-cart"></i></a></li>
                                                          <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>
                                                        <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              @endforeach

                            @else -->