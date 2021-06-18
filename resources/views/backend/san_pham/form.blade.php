<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="exampleInputTenSanPham">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensanpham" aria-describedby="nameHelp"
                    value="{{old('tensanpham',$sanphams->tensanpham  ??  '')}}" placeholder="Tên sản phẩm">
                @if($errors->first('tensanpham'))
                <small id="nameHelp" class="form-text text-danger">{{$errors->first('tensanpham')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputLoaiSanPham">Loại sản phẩm</label>
                <select name="loaisanpham_id" id="" class="form-control" aria-describedby="loaisanphamHelp">
                    <option value="">__Chọn loại sản phẩm__</option>
                    @foreach($loaisanpham as $item)
                    <option value="{{$item->id}}"
                        {{old('loaisanpham_id',$sanphams->loaisanpham_id ?? 0) == $item->id ? "selected":""}}>
                        {{$item->tenloai}}
                    </option>

                    @endforeach

                </select>
                @if($errors->first('loaisanpham_id'))
                <small id=" loaisanphamHelp" class="form-text text-danger">{{$errors->first('loaisanpham_id')}}</small>
                @endif
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" aria-describedby="hinhanh" id="hinhanh" name="hinhanh"
                        accept="image/*">
                    <label for="hinhanh" class="custom-file-label">Chọn ảnh từ máy của bạn</label>

                </div>
                @if(isset($sanphams) && ($sanphams->hinhanh))
                <img src="{{pare_url_file($sanphams->hinhanh)}}" class="img-thumbnail" style="width:150px; height:150px">
                @endif
                @if($errors->first('hinhanh'))
                <small id="hinhanhHelp" class="form-text text-danger">{{$errors->first('hinhanh')}}</small>
                @endif
            </div>


        </div>

        <div class="col-sm-8">

            <div class="form-group">
                <label for="exampleInputGia">Giá</label>
                <input type="text" class="form-control" name="gia" aria-describedby="GiaHelp"
                    value="{{old('gia',$sanphams->gia  ??  0)}}" placeholder="Giá">
                @if($errors->first('gia'))
                <small id="GiaHelp" class="form-text text-danger">{{$errors->first('gia')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputGia">Số lượng</label>
                <input type="text" class="form-control" name="soluong" aria-describedby="SoLuongHelp"
                    value="{{old('soluong',$sanphams->soluong  ??  0)}}" placeholder="Số lượng">
                @if($errors->first('soluong'))
                <small id="SoLuongHelp" class="form-text text-danger">{{$errors->first('soluong')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputMoTa1">Mô tả</label>
                <textarea  class="form-control" rows="14" cols="10" id="mota"  name="mota" aria-describedby="MoTa1Help"
                     placeholder="Mô tả">

                     {{old('mota',$sanphams->mota  ??  '')}}</textarea>


                @if($errors->first('mota'))
                <small id="MoTa1Help" class="form-text text-danger">{{$errors->first('mota')}}</small>
                @endif
            </div>




        </div>
        <button type="submit" class="btn btn-primary mb-5">Thêm mới</button>

    </div>

</form>
