@extends('layouts.app_backend')

@section('title','Thêm mới loại đồ uống')
@section('content')

<div class="bg-light">
    <div class="container">
        <h1 class="mb-5">Thêm mới loại sản phẩm</h1>
        @include('layouts.flash_message')
        @include('backend.loai_san_pham.form')


    </div>
</div>

@stop
