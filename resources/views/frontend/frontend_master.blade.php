<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <title>@yield('title')</title>

@include('frontend.layout.styles')

<!-- All Javascripts -->
    @include('frontend.layout.scripts')

    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script type="text/javascript" src="//s7.addthis.com/{{ asset('/') }}frontend/assets/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

    <!-- Google Analytics -->
    @if($global_setting_data->analytic_id_status == 'show')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$global_setting_data->analytic_id}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{$global_setting_data->analytic_id}}');
    </script>
    @endif

    <style>
        .website-menu,
        .website-menu .bg-primary,
        .acme-news-ticker-label,
        .search-section button[type="submit"],
        .home-content .left .news-total-item .see-all a,
        .nav-pills .nav-link.active,
        .video-content,
        .footer ul.social li a,
        .footer input[type="submit"],
        .scroll-top,
        .widget .poll button,
        .scroll-top
        {
            background: #{{ $global_setting_data->theme_color_1 }}!important;
        }
        .home-main .inner .text-inner .category span,
        .home-main .inner .text-inner .category span a,
        .home-content .left .news-total-item .right-side-item .right .category span,
        .home-content .left .news-total-item .right-side-item .right .category span a,
        .widget .news-item .right .category span,
        .widget .news-item .right .category span a,
        .related-news .item .category span,
        .related-news .item .category span a,
        .tag-section-content span
        {
            background: #{{ $global_setting_data->theme_color_2 }}!important;
        }
        .acme-news-ticker{
            border-color: #{{ $global_setting_data->theme_color_1 }}!important;
        }
        ul.my-news-ticker li a.form-control,
        .home-content .left .news-total-item .left-side h3 a:hover,
        .home-content .left .news-total-item .right-side-item .right h2 a:hover,
        .home-content .left .news-total-item .left-side .date-user .user a:hover,
        .home-content .left .news-total-item .left-side .date-user .date a:hover,
        .acme-news-ticker-box ul li a,
        .home-content .left .news-total-item .right-side-item .right .date-user .user a:hover,
        .home-content .left .news-total-item .right-side-item .right .date-user .date a:hover,
        .widget .news-item .right h2 a:hover,
        .widget .news-item .right .date-user .user a:hover,
        .widget .news-item .right .date-user .date a:hover,
        .video-carousel .owl-nav .owl-next,
        .video-carousel .owl-nav .owl-prev,
        li.breadcrumb-item a,
        .category-page-post-item h3 a:hover,
        .category-page-post-item .date-user .user a:hover,
        .category-page-post-item .date-user .date a:hover,
        .related-news .item h3 a,
        .related-news .related-news-heading h2,
        .related-news .item .date-user .user a:hover,
        .related-news .item .date-user .date:hover,
        h1, h2, h3, h4, h5, h6
        {
            color: #{{$global_setting_data->theme_color_1}}!important;
        }
        .nav-pills .nav-link.active{
            color: #fff!important;
        }
    </style>

</head>
<body>
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    @if($global_setting_data->top_bar_date_status == 'show')
                        <li class="today-text">Today: {{ date('F d,Y') }}</li>
                    @endif
                    @if($global_setting_data->top_bar_email_status == 'show')
                        <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                    @endif
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">
                    @if($global_pages->faq_status == 'show')
                        <li class="menu"><a href="{{ route('front_faq') }}">FAQ</a></li>
                    @endif
                    @if($global_pages->about_status == 'show')
                        <li class="menu"><a href="{{ route('front_about') }}">About</a></li>
                    @endif
                    @if($global_pages->contact_status == 'show')
                        <li class="menu"><a href="{{ route('front_contact') }}">Contact</a></li>
                    @endif
                    @if($global_pages->login_status == 'show')
                        <li class="menu"><a href="{{ route('front_login') }}">Login</a></li>
                    @endif
                    <li>
                        <div class="language-switch">
                            <select name="">
                                <option value="">English</option>
                                <option value="">Hindi</option>
                                <option value="">Arabic</option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="heading-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <div class="logo">
                    <a href="{{ route('front_home') }}">
                        <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                @if($global_top_add_data->top_search_ad_status == 'show')
                    <div class="ad-section-1">
                        @if($global_top_add_data->top_search_ad_url=='')
                            <img src="{{ asset('frontend/assets/uploads/'.$global_top_add_data->top_search_ad) }}" alt="">
                        @else
                            <a href="{{ $global_top_add_data->top_search_ad_url }}"><img src="{{ asset('frontend/assets/uploads/'.$global_top_add_data->top_search_ad) }}" alt=""></a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('frontend.menu')

@yield('main_content')

@include('frontend.footer')

<div class="copyright">
    Copyright 2022, ArefinDev. All Rights Reserved.
</div>

<div class="scroll-top">
    <i class="fas fa-angle-up"></i>
</div>

@include('frontend.layout.script_footer')

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title:'',
                position:'topRight',
                message:'{{ $error }}'
            })
        </script>
    @endforeach
@endif

@if(session()->has('error'))
    <script>
        iziToast.error({
            title: 'Error',
            position:'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@if(session()->has('success'))
    <script>
        iziToast.success({
            title: '',
            position:'topRight',
            message:'{{ session()->get('success') }}'
        });
    </script>
@endif

</body>
</html>
