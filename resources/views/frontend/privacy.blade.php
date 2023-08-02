@extends('frontend.frontend_master')
@section('title','Privacy')
@section('main_content')
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $pageData->privacy_title }}</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $pageData->privacy_title }}</li>
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
                    {!! $pageData->privacy_detail !!}
                </div>
            </div>
        </div>
    </div>
@endsection

