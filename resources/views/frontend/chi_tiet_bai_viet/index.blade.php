@extends('layouts.app_frontend')
@section('title','Smootthie & Fruit Shop')
@section('content')   
            <!--breadcrumb area start-->
            <div class="breadcrumb_container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">     
                            <nav>
                        <ul>
                            <li>
                                <a href="index.html">Home ></a>
                            </li>
                            <li>Blog Details</li>
                        </ul>
                    </nav>
                        </div>
                    </div> 
                </div>        
            </div>
             <!--breadcrumb area end-->
            
            <!--blog details area start-->      
            <div class="blog_details_area">
                <div class="container">
                    <div class="row">
                        @include('frontend.chi_tiet_bai_viet.left_menu')
                        <div class="col-lg-9 col-md-12">
                            <div class="blog_details_info">
                                <div class="blog_meta">
                                    <ul>
                                        <li>{{$baivietchitiet->theloai}}</li>
                                        <li> {{date('d/m/Y',strtotime($baivietchitiet->thoigiandang))}}</li>
                                    </ul>   
                                </div>
                                <h3>{{$baivietchitiet->tieude}} </h3> 
                                <div class="blog_details_img">
                                    <img src="{{pare_url_file($baivietchitiet->hinhanh)}}" alt="">    
                                </div>   
                                <div class="post_excerpt">
                                    <?php
                                $str = "{$baivietchitiet->noidung}"; //Tạo chuỗi
                               // $str = strip_tags($str); //Lược bỏ các tags HTML

                                echo $str;
                            ?>
                                </div>
                           
                           
							
								
                            </div>
                               
                        </div>    
                    </div>    
                </div>    
            </div>
            
             <!--blog details area end-->  
@stop