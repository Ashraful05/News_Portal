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
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-84213520-6');
    </script>

</head>
<body>
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li class="today-text">Today: January 20, 2022</li>
                    <li class="email-text">contact@arefindev.com</li>
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
