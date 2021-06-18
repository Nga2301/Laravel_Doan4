@extends('layouts.app_backend')
@section('title','Cập nhật tin tức')
@section('content')
<div class="bg-light">
    <div class="container">
        <h1 class="mb-5">Cập nhật tin tức</h1>
        @include('layouts.flash_message')
        @include('backend.bai_viet.form')
    </div>
</div>
@stop
