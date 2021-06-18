@extends('layouts.app_frontend')
@section('title','Smootthie & Fruit Shop')
@section('content')

@include('frontend.bai_viet.tag_header')
   
           <!--blog area start-->
           <div class="blog_list_area">
                <div class="container">
                    <div class="row">

                    @foreach ($tintucs as $item )
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="single_blog_list">
                                <div class="blog__thumb">
                                    <a href="{{route('get.chi_tiet_bai_viet',$item->slug)}}"><img src="{{pare_url_file($item->hinhanh)}}" alt=""></a>    
                                </div>
                                <div class="post__content">
                                    <h3><a href="{{route('get.chi_tiet_bai_viet',$item->slug)}}">{{$item->tieude}}</a></h3>
                                    <ul>
                                        <li><a href="blog-details.html">Read More</a></li>
                                        <li class="post_date">{{date('d/m/Y',strtotime($item->thoigiandang))}}</li>
                                    </ul>    
                                </div>
                            </div>    
                        </div> 
                       @endforeach
                      
                      
                      
                       
                        <div class="col-12">
                        <div class="d-flex justify-content-center">
                    {{ $tintucs->links() }}
                </div>
                        </div>                        
                    </div>    
                </div>   
           </div>
           <!--blog area end-->
@stop
