@extends('frontend.frontend_master')
@section('title','Home')
@section('main_content')

{{--    @if(!session()->get('session_short_name'))--}}
{{--        @php--}}
{{--            $current_short_name = $global_default_language_data;--}}
{{--        @endphp--}}
{{--    @else--}}
{{--        @php--}}
{{--            $current_short_name = session()->get('session_short_name');--}}
{{--        @endphp--}}
{{--    @endif--}}
{{--    --}}{{--    {{ $current_short_name }}--}}
{{--    @php--}}
{{--        $jsonData = json_decode(file_get_contents(resource_path('languages/'.$current_short_name.'.json')));--}}
{{--        foreach ($jsonData as $key=>$value){--}}
{{--            define($key,$value);--}}
{{--        }--}}
{{--    @endphp--}}

    @if($settingData->news_ticker_status == 'show')
        <div class="news-ticker-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acme-news-ticker">
                            <div class="acme-news-ticker-label">{{LATEST_NEWS}}</div>
                            <div class="acme-news-ticker-box">
                                <ul class="my-news-ticker">
                                    @php $i=0; @endphp
                                    @foreach($postData as $data)
                                        @php $i++; @endphp
                                        @if($i>$settingData->news_ticker_total)
                                            @break;
                                        @endif
                                        <li><a href="{{ route('news_details',$data->id) }}">{{ $data->post_title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="home-main">
        <div class="container">
            <div class="row g-2">
                <div class="col-lg-8 col-md-12 left">
                    @php $i=0; @endphp
                    @foreach($postData as $data)
                        @php $i++; @endphp
                        @if($i>1)
                            @break
                        @endif
                        <div class="inner">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{ asset('uploads/'.$data->post_photo) }}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span class="badge bg-success badge-sm">{{ $data->rSubCategory->rCategory->category_name }}</span>
                                        </div>
                                        <h2><a href="{{ route('news_details',$data->id) }}">{{ $data->post_title }}</a></h2>
                                        <div class="date-user">
                                            <div class="user">
                                                @if($data->author_id==0)
                                                    @php
                                                        $userData = \App\Models\Admin::where('id',$data->admin_id)->first();
                                                    @endphp
                                                @else
                                                    @php
                                                        $userData = \App\Models\Author::where('id',$data->author_id)->first();
                                                    @endphp
                                                @endif
                                                <a href="javascript:void;">{{ $userData->name }}</a>
                                            </div>
                                            <div class="date">
                                                @php
                                                    $ts = strtotime($data->updated_at);
                                                    $updated_date = date('d F,Y',$ts);
                                                @endphp

                                                <a href="">{{ $updated_date }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-12">
                    @php $i=0; @endphp
                    @foreach($postData as $data)
                        @php $i++; @endphp
                        @if($i==1)
                            @continue
                        @endif
                        @if($i>2)
                            @break
                        @endif
                        <div class="inner inner-right">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{ asset('uploads/'.$data->post_photo) }}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span class="badge bg-success badge-sm">{{ $data->rSubCategory->rCategory->category_name }}</span>
                                        </div>
                                        <h2><a href="{{ route('news_details',$data->id) }}">{{$data->post_title}}</a></h2>
                                        <div class="date-user">
                                            <div class="user">
                                                @if($data->author_id==0)
                                                    @php
                                                        $userData = \App\Models\Admin::where('id',$data->admin_id)->first();
                                                    @endphp
                                                @else
                                                    @php
                                                        $userData = \App\Models\Author::where('id',$data->author_id)->first();
                                                    @endphp
                                                @endif
                                                <a href="javascript:void;">{{ $userData->name }}</a>
                                            </div>
                                            <div class="date">
                                                @php
                                                    $ts = strtotime($data->updated_at);
                                                    $updated_date = date('d F,Y',$ts);
                                                @endphp
                                                <a href="">{{ $updated_date }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if($homeData->above_search_ad_status == 'show')
        <div class="ad-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if($homeData->above_search_ad_url == '')
                            <a href="#"><img src="{{ asset('frontend/assets/uploads/'.$homeData->above_search_ad) }}" alt=""></a>
                        @else
                            <a href="{{ $homeData->above_search_ad_url }}"><img src="{{ asset('frontend/assets/uploads/'.$homeData->above_search_ad) }}" alt=""></a>
                        @endif
                        {{--                        <a href=""><img src="{{ asset($homeData->above_search_ad) }}" alt=""></a>--}}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="search-section">
        <div class="container">
            <div class="inner">
                <form action="{{ route('search_result') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="text_portion" class="form-control" placeholder="Title or Description">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="category" id="category" class="form-select">
                                    <option value="" selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="sub_category" id="sub_category" class="form-select">
                                    <option value="" >Select SubCategory</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="home-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 left-col">
                    <div class="left">
                    @foreach($subCategoryData as $subCategory)
                        @if(count($subCategory->rPost)==0)
                            @continue
                        @endif
                        <!-- News Of Category -->
                            <div class="news-total-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h2>{{ $subCategory->sub_category_name }}</h2>
                                    </div>
                                    <div class="col-lg-6 col-md-12 see-all">
                                        <a href="{{ route('category',$subCategory->id) }}" class="btn btn-primary btn-sm">See All News</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($subCategory->rPost as $item)
                                        @if($loop->iteration == 2)
                                            @break
                                        @endif
                                        <div class="col-lg-6 col-md-12">
                                            <div class="left-side">
                                                <div class="photo">
                                                    <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                                                </div>
                                                <div class="category">
                                                    <span class="badge bg-success">{{$subCategory->sub_category_name}}</span>
                                                </div>
                                                <h3><a href="{{ route('news_details',$item->id) }}">{{ $item->post_title }}</a></h3>
                                                <div class="date-user">
                                                    <div class="user">
                                                        @if($item->author_id == 0)
                                                            @php
                                                                $userData = \App\Models\Admin::where('id',$item->admin_id)->first();
                                                            @endphp
                                                        @endif
                                                        <a href="">{{ $userData->name }}</a>
                                                    </div>
                                                    <div class="date">
                                                        @php
                                                            $ts = strtotime($item->updated_at);
                                                            $updated_at = date('d F,Y',$ts);
                                                        @endphp
                                                        <a href="">{{ $updated_at }}</a>
                                                    </div>
                                                </div>
                                                <div class="post-short-text">
                                                    {!! $item->post_detail !!}
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                    <div class="col-lg-6 col-md-12">
                                        <div class="right-side">
                                            @foreach($subCategory->rPost as $item)
                                                @if($loop->iteration == 1)
                                                    @continue
                                                @endif
                                                @if($loop->iteration == 6)
                                                    @break
                                                @endif
                                                <div class="right-side-item">
                                                    <div class="left">
                                                        <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                                                    </div>
                                                    <div class="right">
                                                        <div class="category">
                                                            <span class="badge bg-success">{{ $subCategory->sub_category_name }}</span>
                                                        </div>
                                                        <h2><a href="{{ route('news_details',$item->id) }}">{{ $item->post_title }}</a></h2>
                                                        <div class="date-user">
                                                            <div class="user">
                                                                @if($item->author_id == 0)
                                                                    @php
                                                                        $userData = \App\Models\Admin::where('id',$item->admin_id)->first();
                                                                    @endphp
                                                                @endif
                                                                <a href="">{{ $userData->name }}</a>
                                                            </div>
                                                            <div class="date">
                                                                @php
                                                                    $ts = strtotime($item->updated_at);
                                                                    $updated_at = date('d F,Y',$ts);
                                                                @endphp
                                                                <a href="">{{ $updated_at }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 sidebar-col">
                    @include('frontend.layout.sidebar')
                </div>
            </div>
        </div>
    </div>

    @if($settingData->video_status == 'show')
        <div class="video-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-heading">
                            <h2>Videos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-carousel owl-carousel">
                            @foreach($homeVideo as $video)
                                @if($loop->iteration > $settingData->video_total)
                                    @break
                                @endif
                                <div class="item">
                                    <div class="video-thumb">
                                        <img src="http://img.youtube.com/vi/{{ $video->video_id }}/0.jpg" alt="">
                                        <div class="bg"></div>
                                        <div class="icon">
                                            <a href="http://www.youtube.com/watch?v={{ $video->video_id }}" class="video-button"><i class="fas fa-play"></i></a>
                                        </div>
                                    </div>
                                    <div class="video-caption">
                                        <a href="">{{ $video->caption }}</a>
                                    </div>
                                    <div class="video-date">
                                        @php
                                            $ts = strtotime($video->created_at);
                                            $created_date = date('d F, Y',$ts);
                                        @endphp
                                        <i class="fas fa-calendar-alt"></i> {{ $created_date }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($homeData->above_footer_ad_status == 'show')
        <div class="ad-section-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {{--                        <a href=""><img src="{{ asset($homeData->above_footer_ad) }}" alt=""></a>--}}
                        @if($homeData->above_footer_ad_url == '')
                            <a href=""><img src="{{ asset('frontend/assets/uploads/'.$homeData->above_footer_ad) }}" alt=""></a>
                        @else
                            <a href="{{ $homeData->above_footer_ad_url }}"><img src="{{ asset('frontend/assets/uploads/'.$homeData->above_footer_ad) }}" alt=""></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif


    <script>
        (function($){
            $(document).ready(function(){
                $("#category").on("change", function(){
                    var categoryId = $("#category").val();
                    if(categoryId) {
                        $.ajax({
                            type: "get",
                            url: "{{ url('subcategory-by-category') }}" + "/" + categoryId,
                            success: function(response) {
                                // alert(response.sub_category_data);
                                // console.log(response.sub_category_data);
                                $("#sub_category").html(response.sub_category_data);
                            },
                            error:function(err){

                            }
                        })
                    }
                })
            });
        })(jQuery);
    </script>

@endsection
