<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputTenLoaiDoUong">Tên loại sản phẩm</label>
                <input type="text" class="form-control" name="tenloai" aria-describedby="nameHelp"
                    value="{{old('tenloai',$loaisanphams->tenloai  ??  '')}}" placeholder="Tên loại ">
                @if($errors->first('tenloai'))
                <small id="nameHelp" class="form-text text-danger">{{$errors->first('tenloai')}}</small>
                @endif
            </div>


        </div>
        <div class="col-sm-6">

            <div class="form-group">
                <label for="exampleInputMoTa">Mô tả</label>
                <input type="text" class="form-control" name="mota" aria-describedby="MoTaHelp"
                    value="{{old('mota',$loaisanphams->mota  ??  '')}}" placeholder="Mô tả">
                @if($errors->first('mota'))
                <small id="MoTaHelp" class="form-text text-danger">{{$errors->first('mota')}}</small>
                @endif
            </div>



        </div>

    </div>
    <button type="submit" class="btn btn-primary mb-5">Thêm mới</button>

</form>
