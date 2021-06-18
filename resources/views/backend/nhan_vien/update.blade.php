@extends('layouts.app_backend')
@section('title','Cập nhật nhân viên')
@section('content')
<div class="bg-light">
    <div class="container">
        <h1 class="mb-5">Cập nhật nhân viên</h1>
        @include('layouts.flash_message')
        @include('backend.nhan_vien.form')
    </div>
</div>
@stop