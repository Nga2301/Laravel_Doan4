<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="exampleInputTenLoaiDoUong">Tiêu đề</label>
                <input type="text" class="form-control" name="tieude" aria-describedby="tieudeHelp"
                    value="{{old('tieude',$tintucs->tieude  ??  '')}}" placeholder="Tiêu đề">
                @if($errors->first('tieude'))
                <small id="tieudeHelp" class="form-text text-danger">{{$errors->first('tieude')}}</small>
                @endif
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" aria-describedby="hinhanh" id="hinhanh" name="hinhanh"
                        accept="image/*">
                    <label for="hinhanh" class="custom-file-label">Chọn ảnh từ máy của bạn</label>

                </div>
                @if(isset($tintucs) && ($tintucs->hinhanh))
                <img src="{{pare_url_file($tintucs->hinhanh)}}" class="img-thumbnail" style="width:150px; height:150px">
                @endif
                @if($errors->first('hinhanh'))
                <small id="hinhanhHelp" class="form-text text-danger">{{$errors->first('hinhanh')}}</small>
                @endif
            </div>


        </div>

        <div class="col-sm-8">

            <div class="form-group">
                <label for="exampleInputGia">Thể loại</label>
                <input type="text" class="form-control" name="theloai" aria-describedby="TheLoaiHelp"
                    value="{{old('theloai',$tintucs->theloai  ??  '')}}" placeholder="Thể loại">
                @if($errors->first('theloai'))
                <small id="TheLoaiHelp" class="form-text text-danger">{{$errors->first('theloai')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputMoTa1">Nội dung</label>
                <textarea  class="form-control" rows="14" cols="10" id="noidung"  name="noidung" aria-describedby="MoTa1Help"
                     placeholder="Nội dung" >
                     {{old('noidung',$tintucs->noidung  ??  '')}}
                    </textarea>



                @if($errors->first('noidung'))
                <small id="MoTa1Help" class="form-text text-danger">{{$errors->first('noidung')}}</small>
                @endif
            </div>




        </div>
        <button type="submit" class="btn btn-primary mb-5">Thêm mới</button>

    </div>

</form>
