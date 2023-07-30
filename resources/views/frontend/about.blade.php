@extends('frontend.frontend_master')
@section('title','About')
@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $pageData->about_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front_home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $pageData->about_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $pageData->about_detail !!}
            </div>
        </div>
    </div>
</div>
@endsection
