@extends('layouts.app_backend')

@section('title','Thêm mới hóa đơn nhập')
@section('content')

<div class="bg-light">
    <div class="container">
        <h1 class="mb-5">Thêm mới hóa đơn nhập</h1>
        @include('layouts.flash_message')
        @include('backend.hoa_don_nhap.form')


    </div>
</div>

@stop