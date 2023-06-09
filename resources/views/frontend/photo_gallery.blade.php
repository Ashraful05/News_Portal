@extends('frontend.frontend_master')
@section('title','Photo Gallery')
@section('main_content')
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Photo Gallery</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="photo-gallery">
                <div class="row">
                    @foreach($photos as $photo)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="photo-thumb">
                            <img src="{{ asset('uploads/'.$photo->photo) }}" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="{{ asset('uploads/'.$photo->photo) }}" class="magnific"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="photo-caption">
                            <a href="">{{ $photo->caption }}</a>
                        </div>
                        <div class="photo-date">
                            @php
                                $ts = strtotime($photo->created_at);
                                $created_date = date('d F, Y',$ts);
                            @endphp
                            <i class="fas fa-calendar-alt"></i> {{ $created_date }}
                        </div>
                    </div>
                    @endforeach

                    <div class="col-md-12">
                        {{ $photos->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
