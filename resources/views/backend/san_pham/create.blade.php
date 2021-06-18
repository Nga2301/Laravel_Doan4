@extends('layouts.app_backend')

@section('title','Thêm mới sản phẩm')
@section('content')

<div class="bg-light">
    <div class="container">
        <h1 class="mb-5">Thêm mới sản phẩm</h1>
        @include('layouts.flash_message')
        @include('backend.san_pham.form')


    </div>
</div>

@stop
