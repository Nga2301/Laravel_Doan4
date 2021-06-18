@extends('layouts.app_backend')
@section('title','Cập nhật giá bán')
@section('content')
<div class="bg-light">
    <div class="container">
        <h1 class="mb-5">Cập nhật giá bán</h1>
        @include('layouts.flash_message')
        @include('backend.gia_ban.form')
    </div>
</div>
@stop