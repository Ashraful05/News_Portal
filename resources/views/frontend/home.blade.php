@extends('frontend.frontend_master')
@section('title','Home')
@section('main_content')

    @if($settingData->news_ticker_status == 'show')
        <div class="news-ticker-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acme-news-ticker">
                            <div class="acme-news-ticker-label">Latest News</div>
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

                                    {{--                                    <li><a href="">Canadian police appear to end protesters' siege of Ottawa</a></li>--}}
                                    {{--                                    <li><a href="">Speedskating champ chooses sportsmanship over Olympic medal</a></li>--}}
                                    {{--                                    <li><a href="">USDA head: US farmers to help if Ukraine exports threatened</a></li>--}}
                                    {{--                                    <li><a href="">Actor Lindsey Pearlman found dead after going missing in LA</a></li>--}}
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
                                                    <p>I will work with this section later.</p>
                                                @endif
                                                <a href="">{{ $userData->name }}</a>
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
                                                    <p> I will work this section later</p>
                                                @endif
                                                <a href="">{{ $userData->name }}</a>
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
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="" class="form-control" placeholder="Title or Description">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="" class="form-select">
                                <option value="">Select Category</option>
                                <option value="">Sports</option>
                                <option value="">National</option>
                                <option value="">Lifestyle</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="" class="form-select">
                                <option value="">Select SubCategory</option>
                                <option value="">Football</option>
                                <option value="">Cricket</option>
                                <option value="">Baseball</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
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
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/tvsyp08Uylw/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=tvsyp08Uylw" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/PKATJiyz0iI/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=PKATJiyz0iI" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/ekgUjyWe1Yc/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=ekgUjyWe1Yc" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/LEcpS6pX9kY/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=LEcpS6pX9kY" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/N88TwF4D2PI/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=N88TwF4D2PI" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


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
@endsection
