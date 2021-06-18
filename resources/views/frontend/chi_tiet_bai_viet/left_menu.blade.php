<div class="col-lg-3 col-md-8">
                           
                               
                                
                                <div class="blog_left_sidebar mb-50">
                                    <h3>bài viết mới nhất</h3>
                                    @foreach ($tintucnews as $item)
                                    <div class="recent_post mb-30">
                                        <div class="recent_post_title">
                                            <a href="{{route('get.chi_tiet_bai_viet',$item->slug)}}"><img src="{{pare_url_file($item->hinhanh)}}" alt=""></a>    
                                        </div>
                                        <div class="recent_post_content">
                                            <h4><a href="{{route('get.chi_tiet_bai_viet',$item->slug)}}">{{$item->tieude}}</a></h4>
                                            <span class="post_date">{{$item->thoigiandang}}</span>   
                                        </div>   
                                    </div>
                                 @endforeach
                                </div>
                                <div class="blog_left_sidebar mb-50">
                                    <h3>Tags</h3>
                                    <div class="blog-tags-style">
                                        <ul>
                                        @foreach ($tags_tt as $item)
                                            <li><a href="#">{{$item->theloai}}</a></li>
                                            @endforeach
                                        </ul>    
                                    </div>    
                                </div>    
                            </div>    
                      