@extends('layouts.app_backend')
@section('title','Danh sách tin tức')
@section('content')


<div class="dataTables_wrapper dt-bootstrape bg-light">
    <div class="container">
        <h1 class="mb-5">Danh sách tin tức</h1>
        @include('layouts.flash_message')

        <div class="row mb-3">


            <div class="col-sm-12">
                <div class="dataTables_filter">
                    <a href="{{route('get_backend.tin_tuc.create')}}" class="btn btn-xs btn-primary">Thêm mới</a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example" class="table table-striped table-bordered bg-light" style="width:100%">
                    <thead style="text-align:center">
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Thời gian đăng</th>
                            <th>Thể loại</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tintucs as $item)

                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->tieude}}</td>



                            <?php
                                $str = "{$item->noidung}"; //Tạo chuỗi
                                $str = strip_tags($str); //Lược bỏ các tags HTML
                                if(strlen($str)>100) { //Đếm kí tự chuỗi $str, 100 ở đây là chiều dài bạn cần quy định
                                    $strCut = substr($str, 0, 200); //Cắt 100 kí tự đầu
                                    $str = substr($strCut, 0, strrpos($strCut, ' ')).'...'; //Tránh trường hợp cắt dang dở như "nội d... Read More"
                                }
                                echo '<td >'.$str.'</td>';

                            ?>

                            <td style="width:100px">
                                <a href="">
                                    <img src="{{pare_url_file($item->hinhanh)}}" class="img-thumbnail"
                                        style="width:60px;height:60px" alt="">
                                </a>
                            </td>

                            <td style="width:100px">{{$item->thoigiandang}}</td>
                            <td style="width:100px">{{$item->theloai}}</td>

                            <td style="text-align:center">
                                <a href=" {{route('get_backend.tin_tuc.update',$item->id)}}"
                                    class="btn btn-xs btn-primary">Sửa</a>
                                <a href="{{route('get_backend.tin_tuc.delete',$item->id)}}"
                                    class="btn btn-xs btn-danger">Xóa</a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>



</div>


@stop
