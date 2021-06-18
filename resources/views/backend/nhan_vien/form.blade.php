<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputTenNhanVien">Tên nhà cung cấp</label>
                <input type="text" class="form-control" name="tennhanvien" aria-describedby="nhanvienHelp"
                    value="{{old('tennhanvien',$nhanviens->tennhanvien  ??  '')}}" placeholder="Tên nhân viên">
                @if($errors->first('tennhanvien'))
                <small id="nhanvienHelp" class="form-text text-danger">{{$errors->first('tennhanvien')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputDiaChi">Địa chỉ</label>
                <input type="text" class="form-control" name="diachi" aria-describedby="DiachiHelp"
                    value="{{old('diachi',$nhanviens->diachi  ??  '')}}" placeholder="Địa chỉ">
                @if($errors->first('diachi'))
                <small id="DiachiHelp" class="form-text text-danger">{{$errors->first('diachi')}}</small>
                @endif
            </div>

        </div>
        <div class="col-sm-6">

            <div class="form-group">
                <label for="exampleInputSoDienThoai">Số điện thoại</label>
                <input type="text" class="form-control" name="sodienthoai" aria-describedby="SdtHelp"
                    value="{{old('sodienthoai',$nhanviens->sodienthoai  ??  '')}}" placeholder="Mô tả">
                @if($errors->first('sodienthoai'))
                <small id="SdtHelp" class="form-text text-danger">{{$errors->first('sodienthoai')}}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <input type="mail" class="form-control" name="email" aria-describedby="EmailHelp"
                    value="{{old('email',$nhanviens->email  ??  '')}}" placeholder="abc@gmail.com">
                @if($errors->first('email'))
                <small id="EmailHelp" class="form-text text-danger">{{$errors->first('email')}}</small>
                @endif
            </div>


        </div>

    </div>
    <button type="submit" class="btn btn-primary mb-5">Thêm mới</button>

</form>