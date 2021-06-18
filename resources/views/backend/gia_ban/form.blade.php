<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-6">

            <div class="form-group">
                <label for="exampleInputTeDoUong">Tên đồ uống</label>
                <select name="douong_id" id="" class="form-control" aria-describedby="douongHelp">
                    <option value="">__Chọn đồ uống__</option>
                    @foreach($douong as $item)
                    <option value="{{$item->id}}"
                        {{old('douong_id',$giabans->douong_id ?? 0) == $item->id ? "selected":""}}>
                        {{$item->tendouong}}
                    </option>

                    @endforeach

                </select>
                @if($errors->first('douong_id'))
                <small id=" douongHelp" class="form-text text-danger">{{$errors->first('douong_id')}}</small>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputNHL">Ngày hiệu lực</label>
                <input type="date" class="form-control" name="ngayhieuluc" aria-describedby="nameNHL"
                    value="{{old('ngayhieuluc',$giabans->ngayhieuluc  ??  '')}}">

            </div>


        </div>

        <div class="col-sm-6">

            <div class="form-group">
                <label for="exampleInputGiaban">Giá bán</label>
                <input type="text" class="form-control" name="gia" aria-describedby="GiaBanHelp"
                    value="{{old('gia',$giabans->gia  ??  0)}}" placeholder="Giá">
                @if($errors->first('gia'))
                <small id="GiaBanHelp" class="form-text text-danger">{{$errors->first('gia')}}</small>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputNHHL">Ngày hết hiệu lực</label>
                <input type="date" class="form-control" name="ngayhethieuluc" aria-describedby="nameNHHL"
                    value="{{old('ngayhethieuluc',$giabans->ngayhethieuluc  ??  '')}}">

            </div>



        </div>
        <button type="submit" class="btn btn-primary mb-5">Thêm mới</button>

    </div>

</form>