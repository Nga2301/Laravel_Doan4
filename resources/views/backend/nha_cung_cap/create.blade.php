@extends('layouts.app_backend')

@section('title','Thêm mới nhà cung cấp')
@section('content')

<div class="bg-light">
    <div class="container">
        <h1 class="mb-5">Thêm mới nhà cung cấp</h1>
        @include('layouts.flash_message')
        @include('backend.nha_cung_cap.form')


    </div>
</div>

@stop