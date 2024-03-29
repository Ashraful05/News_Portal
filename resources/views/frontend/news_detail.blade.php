@extends('frontend.frontend_master')
@section('title')
    {{$newsDetail->post_title}}
@endsection
@section('main_content')
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $newsDetail->post_title }}</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category',$newsDetail->sub_category_id) }}">{{ $newsDetail->rSubCategory->sub_category_name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $newsDetail->post_title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="featured-photo">
                        <img src="{{ asset('uploads/'.$newsDetail->post_photo) }}" alt="">
                    </div>
                    <div class="sub">
                        <div class="item">
                            <b><i class="fas fa-user"></i></b>
                            <a href="">{{$userData->name}}</a>
                        </div>
                        <div class="item">
                            <b><i class="fas fa-edit"></i></b>
                            <a href="{{ route('category',$newsDetail->sub_category_id) }}">{{ $newsDetail->rSubCategory->sub_category_name }}</a>
                        </div>
                        <div class="item">
                            <b><i class="fas fa-clock"></i></b>
                            @php
                                $ts = strtotime($newsDetail->updated_at);
                                $updatedDate =  date('d F Y',$ts);
                            @endphp
                            {{ $updatedDate }}
                        </div>
                        <div class="item">
                            <b><i class="fas fa-eye"></i></b>
                            {{ $newsDetail->visitors }}
                        </div>
                    </div>
                    <div class="main-text">
                        <p>
                            {!! $newsDetail->post_detail !!}
                        </p>
                    </div>
                    <div class="tag-section">
                        <h2>Tags</h2>
                        <div class="tag-section-content">
                            @foreach($tags as $tag)
                                <a href=""><span class="badge bg-success">{{ $tag->tag_name }}</span></a>
                            @endforeach
                        </div>
                    </div>

                    @if($newsDetail->is_share == 1)
                        <div class="share-content">
                            <h2>Share</h2>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    @else
                    @endif

                    @if($newsDetail->is_comment == 1)
                        {!! $global_setting_data->disqus_code !!}
                    @endif

                    <div class="related-news">
                        <div class="related-news-heading">
                            <h2>Related News</h2>
                        </div>
                        <div class="related-post-carousel owl-carousel owl-theme">
                            @foreach($relatedPostArray as $data)
                                @if($data->id == $newsDetail->id)
                                    @continue
                                @endif
                                <div class="item">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/'.$data->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                        <span class="badge bg-success">{{ $data->rSubCategory->sub_category_name }}</span>
                                    </div>
                                    <h3><a href="{{ route('news_details',$data->id) }}">{{ $data->post_title }}</a></h3>
                                    <div class="date-user">
                                        <div class="user">
                                            <a href="">{{$userData->name}}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                                $ts = strtotime($data->updated_at);
                                                $updatedDate =  date('d F Y',$ts);
                                            @endphp
                                            {{ $updatedDate }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 sidebar-col">

                    @include('frontend.layout.sidebar')

                </div>
            </div>
        </div>
    </div>
@endsection
