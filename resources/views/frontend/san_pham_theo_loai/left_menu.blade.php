
                            <div class="col-lg-3 col-md-8 col-12">
                                <div class="shop_sidebar">
                                	<div class="block_categories">
										<div class="category_top_menu widget">
											<div class="widget_title">
												<h3>Loại sản phẩm</h3>
											</div>
											<ul class="shop_toggle">
                                            @foreach($loaisanphamGlobal as $item1)
											   <li class="has-sub"><a href="{{route('get.san_pham_theo_loai',$item1->slug)}}">{{$item1->tenloai}} </a>
													
												</li>
                                            @endforeach
											</ul>   
										</div>
									</div>
									
                                </div>
                            </div>