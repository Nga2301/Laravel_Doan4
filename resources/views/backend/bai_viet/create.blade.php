@extends('layouts.app_backend')

@section('title','Thêm mới tin tức')
@section('content')

<div class="bg-light">
    <div class="container">
        <h1 class="mb-5">Thêm mới tin tức</h1>
        @include('layouts.flash_message')
        @include('backend.bai_viet.form')


    </div>
</div>

@stop
