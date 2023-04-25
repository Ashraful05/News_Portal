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
                    <li class="menu"><a href="faq.html">FAQ</a></li>
                    <li class="menu"><a href="{{ route('front_about') }}">About</a></li>
                    <li class="menu"><a href="contact.html">Contact</a></li>
                    <li class="menu"><a href="login.html">Login</a></li>
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
                        <img src="{{ asset('/') }}frontend/assets/uploads/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ad-section-1">
                    <a href=""><img src="{{ asset('/') }}frontend/assets/uploads/ad-1.png" alt=""></a>
                </div>
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

</body>
</html>
